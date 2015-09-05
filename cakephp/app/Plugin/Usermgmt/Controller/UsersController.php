<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/

App::uses('UserMgmtAppController', 'Usermgmt.Controller');
App::uses('IzUserDigest', 'Model');
App::uses('UserDataModel', 'Model');
App::uses('WechatUserModel', 'Model');


class UsersController extends UserMgmtAppController {
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 
                        'Usermgmt.LoginToken', 'IzUserDigest', 
                        'UserDataModel', 'WechatUser');

    public $components = array('Paginator', 'RequestHandler');
    //private $UserData = NULL;
	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->User->userAuth=$this->UserAuth;
	}
	/**
	 * Used to display all users by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function index() {
		$this->User->unbindModel( array('hasMany' => array('LoginToken')));
		$users=$this->User->find('all', array('order'=>'User.id desc'));
		$this->set('users', $users);
	}
	/**
	 * Used to display detail of user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return array
	 */
	public function viewUser($userId=null) {
		if (!empty($userId)) {
			$user = $this->User->read(null, $userId);
			$this->set('user', $user);
		} else {
			$this->redirect('/allUsers');
		}
	}


	/**
	 * Used to display detail of user by user
	 *
	 * @access public
	 * @return array
	 */
	public function myprofile($userId=0) {
        $myUserId = $this->UserAuth->getUserId(); 
        if($userId==0) {
            if(!$myUserId) {
                //redirect
                $this->UserAuth->redirectLogin($this);
            } else {
		        $userId = $myUserId;
            }
        }

        if($myUserId == $userId) {
            $isMine = TRUE;
        } else {
            $isMine = FALSE;
        }

        //todo if it is not my id, jump to the right page to view the profile;

		$user = $this->User->read(null, $userId);
        $user['largeUserLogo'] = $this->User->IzUsersLogo->genLogoUrl($user['IzUsersLogo']['large_logo_addr'], 'large', false);
        $user['smallUserLogo'] = $this->User->IzUsersLogo->genLogoUrl($user['IzUsersLogo']['small_logo_addr'], 'small', false);
        $user['User']['date_created'] = date("M d, Y", strtotime($user['User']['created']));
        //$userIntro = $this->User->UserProfile->findById($userId);
        //var_dump($userIntro);
        //var_dump($user);

        //debug
        //conditions 
        $mapping = array(
                        'user_id' => 'user_id',
                    );
        $values = array(
                        'user_id' => $userId,
                    );
        
        $userDigests = $this->UserDataModel->getUserDigests($userId, 3);
        $userDoneArticlesCount = $this->UserDataModel->countUserDoneArticles($userId);
        //$this->UserDataModel->updateUserLastingDays($userId);
        $lastingDays = $this->UserDataModel->getUserLastingDays($userId);
        $userRanks = $this->UserDataModel->getUserRanks($userId);
        $lastReadingProgress = $this->UserDataModel->getUserLastReadingProgress($userId);

		$this->set('user', $user); 
		$this->set('isMine', $isMine); 
		$this->set('userDigests', $userDigests); 
		$this->set('lastingDays', $lastingDays); 
		$this->set('userRanks', $userRanks); 
        $this->set('lastReadingProgress', $lastReadingProgress);
		$this->set('userDoneArticlesCount', $userDoneArticlesCount); 
	}
	/**
	 * Used to logged in the site
	 *
	 * @access public
	 * @return void
	 */
	public function login() {
		if ($this->request->isPost()) { //login commited
			$this->User->set($this->data);
			if($this->User->LoginValidate()) { //not empty for passwd and email
				$email  = $this->data['User']['email'];
				$password = $this->data['User']['password'];

				$user = $this->User->findByUsername($email);
				if (empty($user)) {
					$user = $this->User->findByEmail($email);
					if (empty($user)) {
						$this->Session->setFlash(__('Incorrect Email/Username or Password'));
						return;
					}
				}
				// check for inactive account
				if ($user['User']['id'] != 1 and $user['User']['active']==0) {
					//$this->Session->setFlash(__('Sorry your account is not active, please contact to Administrator'));
					$this->Session->setFlash(__('抱歉, 你的账户当前被关闭中，请联系管理员。'));
					return;
				}
				if ($user['User']['allow_web_login'] != 1) {
					//$this->Session->setFlash(__('Sorry your account is not active, please contact to Administrator'));
					$this->Session->setFlash(__('抱歉, 你的账户不允许从网站登录哦，试试用微信服务号打开看看？'));
					return;
				}
				// check for verified account
				if ($user['User']['id'] != 1 and $user['User']['email_verified']==0) {
					//$this->Session->setFlash(__('Your registration has not been confirmed please verify your email or contact to Administrator'));
					$this->Session->setFlash(__('您的账户还没通过邮件认证，请检查您的邮箱，或者重新发验证邮件。'));
					$this->redirect("/emailVerification");
                    // go to send verification again.
                    //todo
					return;
				}
				if(empty($user['User']['salt'])) {
					$hashed = md5($password);
				} else {
					$hashed = $this->UserAuth->makePassword($password, $user['User']['salt']);
				}
				if ($user['User']['password'] === $hashed) { //passwd OK !
					if(empty($user['User']['salt'])) { //why?
						$salt=$this->UserAuth->makeSalt();
						$user['User']['salt']=$salt;
						$user['User']['password']=$this->UserAuth->makePassword($password, $salt);
						$this->User->save($user,false);
					}
					$this->UserAuth->login($user);//login user in with user's data
					$remember = (!empty($this->data['User']['remember']));
					if ($remember || true) {
						$this->UserAuth->persist('2 weeks');
					}
					$OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
					$this->Session->delete('Usermgmt.OriginAfterLogin');
                    $redirect = LOGIN_REDIRECT_URL;
                    if(!empty($OriginAfterLogin)) {
                        $redirect = $OriginAfterLogin;    
                    }else{
                        $redirect = $this->getLoginRedirectUrl();
                    }
					$this->redirect($redirect);
				} else {
					//$this->Session->setFlash(__('Incorrect Email/Username or Password'));
					$this->Session->setFlash(__('错误的 Email/Username 或者 Password'));
					return;
				}
			}
		}
	}

    public function getUrlPath($url) {
        $url = parse_url($url);
        if(array_key_exists('path', $url)) {
            return $url['path'];
        }
        return NULL;
    }

	/**
	 * Used to find the redirectUrl
	 *              by zhangzhi
	 * @access public
	 * @return string
     * 
	 */
    public function getLoginRedirectUrl() {
        $reUrl = (array_key_exists('redirect2', $this->request->query))?$this->request->query['redirect2']:NULL;
        $rePath = $this->getUrlPath($reUrl);
        if($rePath && basename($rePath) != 'login' &&
                    basename($rePath) != 'logout') {//has a parameter
            return $reUrl;
        } else if( false && $this->referer() && 
                    basename($this->referer()) != 'login' &&
                    basename($this->referer()) != 'logout') {//has a referer
            return $this->referer();
        } else {
            return LOGIN_REDIRECT_URL;
        }
    }
	/**
	 * Used to logged out from the site
	 *
	 * @access public
	 * @return void
	 */
	public function logout() {
		$this->UserAuth->logout();
		$this->Session->setFlash(__('You are successfully signed out'));
		$this->redirect(LOGOUT_REDIRECT_URL);
	}



	/**
	 * Used to register on the site
	 *
	 * @access public
	 * @return void
	 */
	public function register() {
		$userId = $this->UserAuth->getUserId();
		if ($userId) {
		    $this->Session->setFlash(__('已经登录，跳转到用户主页，请先退出登录后再注册'));
			$this->redirect("/dashboard");
		}
		if (SITE_REGISTRATION) {
			$userGroups=$this->UserGroup->getGroupsForRegistration();
			$this->set('userGroups', $userGroups);
			if ($this->request -> isPost()) {
				if(USE_RECAPTCHA && !$this->RequestHandler->isAjax()) {
					$this->request->data['User']['captcha']= (isset($this->request->data['recaptcha_response_field'])) ? $this->request->data['recaptcha_response_field'] : "";
				}
				$this->User->set($this->data);
				if ($this->User->RegisterValidate()) {
					if (!isset($this->data['User']['user_group_id'])) {
						$this->request->data['User']['user_group_id']=DEFAULT_GROUP_ID;
					} elseif (!$this->UserGroup->isAllowedForRegistration($this->data['User']['user_group_id'])) {
						$this->Session->setFlash(__('请选择群组'));
						return;
					}
					$this->request->data['User']['active']=1;
					if (!EMAIL_VERIFICATION) {
						$this->request->data['User']['email_verified']=1;
					}
					$ip='';
					if(isset($_SERVER['REMOTE_ADDR'])) {
						$ip=$_SERVER['REMOTE_ADDR'];
					}
					$this->request->data['User']['ip_address']=$ip;
					$salt=$this->UserAuth->makeSalt();
					$this->request->data['User']['salt'] = $salt;
					$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
					$this->User->save($this->request->data, false);
					$userId=$this->User->getLastInsertID();
					$user = $this->User->findById($userId);
					if (SEND_REGISTRATION_MAIL && !EMAIL_VERIFICATION) {
						$this->User->sendRegistrationMail($user);
					}
					if (EMAIL_VERIFICATION) {
						$this->User->sendVerificationMail($user);
					}
					if (isset($this->request->data['User']['email_verified']) && $this->request->data['User']['email_verified']) {
						$this->UserAuth->login($user);
						$this->redirect('/');
					} else {
						$this->Session->setFlash(__('验证邮件已发到您的信箱，请前往确认。'));
						$this->redirect('/register');
					}
				}
			}
		} else {
			$this->Session->setFlash(__('Oops，当前网站还没有开放注册。'));
			$this->redirect('/login');
		}
	}
	/**
	 * Used to change the password by user
	 *
	 * @access public
	 * @return void
	 */
	public function changePassword() {
		$userId = $this->UserAuth->getUserId();
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->RegisterValidate()) {
				$user=array();
				$user['User']['id']=$userId;
				$salt=$this->UserAuth->makeSalt();
				$user['User']['salt'] = $salt;
				$user['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
				$this->User->save($user,false);
				$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
				$this->Session->setFlash(__('Password changed successfully'));
				$this->redirect('/dashboard');
			}
		}
	}
	/**
	 * Used to change the user password by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function changeUserPassword($userId=null) {
		if (!empty($userId)) {
            //todo check userId not exists
			if(!$this->User->findById($userId)) {
				$this->Session->setFlash(__('用户Id无效, 客观莫要乱来!~'));
		        $this->redirect('/allUsers');
            }
			$name=$this->User->getNameById($userId);
			$this->set('name', $name);
			if ($this->request -> isPost()) {
				$this->User->set($this->data);
				if($this->User->RegisterValidate()) {
					$user=array();
					$user['User']['id']=$userId;
					$salt=$this->UserAuth->makeSalt();
					$user['User']['salt'] = $salt;
					$user['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
					$this->User->save($user,false);
					$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
					$this->Session->setFlash(__('Password for %s changed successfully', $name));
					$this->redirect('/allUsers');
				}
			}
		} else {
			$this->redirect('/allUsers');
		}
	}
	/**
	 * Used to add user on the site by Admin
	 *
	 * @access public
	 * @return void
	 */
	public function addUser() {
		$userGroups=$this->UserGroup->getGroups();
		$this->set('userGroups', $userGroups);
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->RegisterValidate()) {
				$this->request->data['User']['email_verified']=1;
				$this->request->data['User']['active']=1;
				$salt=$this->UserAuth->makeSalt();
				$this->request->data['User']['salt'] = $salt;
				$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
				$this->User->save($this->request->data,false);
				$this->Session->setFlash(__('The user is successfully added'));
				$this->redirect('/addUser');
			}
		}
	}

	public function updateMyProfile() {
        $status = 'ERROR';
        $msg = 'ERROR';
        //get id    
        $userId = $this->UserAuth->getUserId(); 
        //set data
        // done return
		if (!empty($userId)) { // logged in
				//$this->User->set($this->data);
                $this->request->data['User']['id'] = $userId;
			    $ret = $this->User->saveAssociated($this->request->data);
			    //$ret = $this->User->UserProfile->save($this->request->data);
                if($ret) {
                    $status = 'OK';
                    $msg = 'OK';
				    $this->redirect('/myprofile');
                } else {
                    $msg = '保存失败，有非法输入?';
                    $this->Session->setFlash($msg);
				    $this->redirect($this->referer());
                }
            
        }
	}

	/**
	 * Used to edit user on the site by User
	 */
     
	public function updateMyProfile_ajax() {
        $status = 'ERROR';
        $msg = 'ERROR';
        //get id    
        $userId = $this->UserAuth->getUserId(); 
        //set data
        // done return
		if (!empty($userId)) { // logged in
				//$this->User->set($this->data);
                $this->request->data['User']['id'] = $userId;
			    $ret = $this->User->saveAssociated($this->request->data);
			    //$ret = $this->User->UserProfile->save($this->request->data);
                if($ret) {
                    $status = 'OK';
                    $msg = 'OK';
                } else {
                    $msg = '保存失败，有非法输入?';
                }
            
        }
        $this->set(array('msg'=>$msg, "status"=>$status, "ret" =>$ret, '_serialize' => array("status", "msg", "ret")));
	}
   

	/**
	 * Used to edit user on the site by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function editUser($userId=null) {
		if (!empty($userId)) {
			$userGroups=$this->UserGroup->getGroups();
			$this->set('userGroups', $userGroups);
			if ($this->request -> isPut()) {
				$this->User->set($this->data);
				if ($this->User->RegisterValidate()) {
					$this->User->save($this->request->data,false);
					$this->Session->setFlash(__('The user is successfully updated'));
					$this->redirect('/allUsers');
				}
			} else {
				$user = $this->User->read(null, $userId);
				$this->request->data=null;
				if (!empty($user)) {
					$user['User']['password']='';
					$this->request->data = $user;
				}
			}
		} else {
			$this->redirect('/allUsers');
		}
	}
	/**
	 * Used to delete the user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function deleteUser($userId = null) {
		if (!empty($userId)) {
			if ($this->request -> isPost()) {
				if ($this->User->delete($userId, false)) {
					$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
					$this->Session->setFlash(__('User is successfully deleted'));
				}
			}
			$this->redirect('/allUsers');
		} else {
			$this->redirect('/allUsers');
		}
	}
	/**
	 * Used to show dashboard of the user
	 *
	 * @access public
	 * @return array
	 */
	public function dashboard() {
		$userId=$this->UserAuth->getUserId();
        $userGroups=$this->UserGroup->getGroupsForRegistration();
		$user = $this->User->findById($userId);
		$this->set('user', $user);
        $this->set('userGroups', $userGroups);
	}
	/**
	 * Used to activate or deactivate user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @param integer $active active or inactive
	 * @return void
	 */
	public function makeActiveInactive($userId = null, $active=0) {
		if (!empty($userId)) {
			$user=array();
			$user['User']['id']=$userId;
			$user['User']['active']=($active) ? 1 : 0;
			$this->User->save($user,false);
			if($active) {
				$this->Session->setFlash(__('User is successfully activated'));
			} else {
				$this->Session->setFlash(__('User is successfully deactivated'));
			}
		}
		$this->redirect('/allUsers');
	}
	/**
	 * Used to verify email of user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function verifyEmail($userId = null) {
		if (!empty($userId)) {
			$user=array();
			$user['User']['id']=$userId;
			$user['User']['email_verified']=1;
			$this->User->save($user,false);
			$this->Session->setFlash(__('User email is successfully verified'));
		}
		$this->redirect('/allUsers');
	}
	/**
	 * Used to show access denied page if user want to view the page without permission
	 *
	 * @access public
	 * @return void
	 */
	public function accessDenied() {

	}
	/**
	 * Used to verify user's email address
	 *
	 * @access public
	 * @return void
	 */
	public function userVerification() {
		if (isset($_GET['ident']) && isset($_GET['activate'])) {
			$userId= $_GET['ident'];
			$activateKey= $_GET['activate'];
			$user = $this->User->read(null, $userId);
			if (!empty($user)) {
				if (!$user['User']['email_verified']) {
					$password = $user['User']['password'];
					$theKey = $this->User->getActivationKey($password);
					if ($activateKey==$theKey) {
						$user['User']['email_verified']=1;
						$this->User->save($user,false);
						if (SEND_REGISTRATION_MAIL && EMAIL_VERIFICATION) {
							$this->User->sendRegistrationMail($user);
						}
						$this->Session->setFlash(__('Thank you, your account is activated now'));
					}
				} else {
					$this->Session->setFlash(__('Thank you, your account is already activated'));
				}
			} else {
				$this->Session->setFlash(__('Sorry something went wrong, please click on the link again'));
			}
		} else {
			$this->Session->setFlash(__('Sorry something went wrong, please click on the link again'));
		}
		$this->redirect('/login');
	}
	/**
	 * Used to send forgot password email to user
	 *
	 * @access public
	 * @return void
	 */
	public function forgotPassword() {
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->LoginValidate()) {
				$email  = $this->data['User']['email'];
				$user = $this->User->findByUsername($email);
				if (empty($user)) {
					$user = $this->User->findByEmail($email);
					if (empty($user)) {
						$this->Session->setFlash(__('Incorrect Email/Username'));
						return;
					}
				}
				// check for inactive account
				if ($user['User']['id'] != 1 and $user['User']['email_verified']==0) {
					$this->Session->setFlash(__('Your registration has not been confirmed yet please verify your email before reset password'));
					return;
				}
				$this->User->forgotPassword($user);
				$this->Session->setFlash(__('Please check your mail for reset your password'));
				$this->redirect('/login');
			}
		}
	}
	/**
	 *  Used to reset password when user comes on the by clicking the password reset link from their email.
	 *
	 * @access public
	 * @return void
	 */
	public function activatePassword() {
		if ($this->request -> isPost()) {
			if (!empty($this->data['User']['ident']) && !empty($this->data['User']['activate'])) {
				$this->set('ident',$this->data['User']['ident']);
				$this->set('activate',$this->data['User']['activate']);
				$this->User->set($this->data);
				if ($this->User->RegisterValidate()) {
					$userId= $this->data['User']['ident'];
					$activateKey= $this->data['User']['activate'];
					$user = $this->User->read(null, $userId);
					if (!empty($user)) {
						$password = $user['User']['password'];
						$thekey =$this->User->getActivationKey($password);
						if ($thekey==$activateKey) {
							$user['User']['password']=$this->data['User']['password'];
							$salt=$this->UserAuth->makeSalt();
							$user['User']['salt'] = $salt;
							$user['User']['password'] = $this->UserAuth->makePassword($user['User']['password'], $salt);
							$this->User->save($user,false);
							$this->Session->setFlash(__('Your password has been reset successfully'));
							$this->redirect('/login');
						} else {
							$this->Session->setFlash(__('Something went wrong, please send password reset link again'));
						}
					} else {
						$this->Session->setFlash(__('Something went wrong, please click again on the link in email'));
					}
				}
			} else {
				$this->Session->setFlash(__('Something went wrong, please click again on the link in email'));
			}
		} else {
			if (isset($_GET['ident']) && isset($_GET['activate'])) {
				$this->set('ident',$_GET['ident']);
				$this->set('activate',$_GET['activate']);
			}
		}
	}
	/**
	 * Used to send email verification mail to user
	 *
	 * @access public
	 * @return void
	 */
	public function emailVerification() {
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->LoginValidate()) {
				$email  = $this->data['User']['email'];
				$user = $this->User->findByUsername($email);
				if (empty($user)) {
					$user = $this->User->findByEmail($email);
					if (empty($user)) {
						$this->Session->setFlash(__('Incorrect Email/Username'));
						return;
					}
				}
				if($user['User']['email_verified']==0) {
					$this->User->sendVerificationMail($user);
					$this->Session->setFlash(__('Please check your mail to verify your email'));
				} else {
					$this->Session->setFlash(__('Your email is already verified'));
				}
				$this->redirect('/login');
			}
		}
	}
}
