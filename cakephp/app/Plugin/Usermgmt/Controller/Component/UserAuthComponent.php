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
class UserAuthComponent extends Component {
	/**
	 * This component uses following components
	 *
	 * @var array
	 */
	var $components = array('Session', 'Cookie', 'RequestHandler', 'Usermgmt.ControllerList');
	/**
	 * configur key
	 *
	 * @var string
	 */
	var $configureKey='User';

    //public $WeChatDataModel=NULL;
    //public $ArticleDataModel=NULL;

    public $wechatUser = NULL;

    //public $uses = array('Usermgmt.User',  'WeChatDataModel');

	function initialize(Controller $controller) {

	}

	function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);
	}

	function startup(Controller $controller = null) {

	}


    function redirectLogin(&$c) {
        $cUrl = '/'.$c->params->url;
        if(!empty($_SERVER['QUERY_STRING'])) {
        	$rUrl = $_SERVER['REQUEST_URI'];
        	$pos =strpos($rUrl, $cUrl);
        	$cUrl=substr($rUrl, $pos, strlen($rUrl));
        }
        $c->Session->write('Usermgmt.OriginAfterLogin', $cUrl);
        $c->redirect('/login');
    }
	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @param object $c current controller object
	 * @return void
	 */
	function beforeFilter(&$c) {
        $this->c = $c;
		UsermgmtInIt($this);
        //todo make it more clear 
        // set user info here
        if($c->userAgent == 'wechat') { // update location ?
            $wechatUserInfo = $this->Session->read('wechatUserInfo');
            //$wechatUserInfo = NULL;

            $acToken = '';
            $rToken = '';
            $acExpr = 0;
            $openId = NULL;

		    App::import("Model", "WeChatDataModel");
            $this->WeChatDataModel = new WeChatDataModel;
		    App::import("Model", "Usermgmt.User");
		    $this->User = new User;
		    App::import("Model", "WeChatUser");
		    $this->WechatUser = new WechatUser;

            if($wechatUserInfo) {
                $openId = $wechatUserInfo->openid;
            } else {
                //use refresh token first
                //shall we refresh first ? 

                $code = '';
                if(array_key_exists('code', $_GET)) {
                    if($_GET['code']=='code') {
                        //redirect for the code        
                        $this->redirectForCode();
                    } else {
                        $code = $_GET['code'];
                    }
                } else {
                    $this->redirectForCode();
                }

                $ret = $this->WeChatDataModel->getWebAcToken($code);
                if($ret==NULL) {
                    //again?
                    $this->log("redirect again ");
                    $this->redirectForCode();
                }

                $user = $this->WeChatDataModel->getUserByWebAcToken($ret->openid, $ret->access_token);
                $acToken = $ret->access_token;
                $rToken = $ret->refresh_token;
                $acExpr = $ret->expires_in;

                $this->Session->write('wechatUserInfo', $user);
                $wechatUserInfo = $user;
                $openId=$ret->openid;
            }
            /*user account about wechat's system is done*/

            //bind our system id;
            //wechat user data stored in db
            // wechatUser: in our DB ; wechatUserInfo: in cookie and wechat's system
            // they are different
            $username = $wechatUserInfo->nickname;
            $wechatUser = $this->WeChatDataModel->getWechatUserByOpenId($openId);
            if(!$wechatUser) {///yes
                //create sys user
                if($username == '' ) {
                    $wechatUserInfo = $this->Session->read('wechatUserInfo');
                    $username = $wechatUserInfo->nickname;
                }
                //create and bind it
                
                $count = 0;
                while($this->User->findByFirstName($username)){
                    if($count == 0) {
                        $username = '来自微信的_'.$username;
                    }
                    else {
                        $username = $userInfo['name'] . "{$count}";
                        $count += 1;
                    }
                }

                $sysUser = $this->newEmptyUserByWechat($openId, $username);
                //$this->UserAuth->debug($openId, $username);
                //var_dump($sysUser);
                //bind
                $userId = $sysUser['User']['id'];
                $data = array();
                $data['WechatUser']['iz_user_id'] = $userId;
                $data['WechatUser']['wechat_name'] = $username; // when we update these? todo
                $data['WechatUser']['open_id'] = $openId;
                $data['WechatUser']['access_token'] = $acToken;
                $expTime = $acExpr + time();
                $exptimeStamp = date("Y-m-d H:i:s", $expTime);
                $data['WechatUser']['access_token_expire'] = $exptimeStamp;
                $data['WechatUser']['refresh_token'] = $rToken;
                $this->WechatUser->save($data);
                $wechatUser = $this->WeChatDataModel->getWechatUserByOpenId($openId);
            }

            $c->wechatUser = $wechatUser; 
            // got the info of our system' user account
            $userId = $wechatUser['WechatUser']['iz_user_id'];    
            // login our sys
            $sysUser = $this->User->findById($userId);
            $this->login($sysUser);
            $this->setUser($c);
        }

		$user = $this->__getActiveUser();
		$pageRedirect = $c->Session->read('permission_error_redirect');
		$c->Session->delete('permission_error_redirect');
		$controller = $c->params['controller'];
		$action = $c->params['action'];
		$actionUrl = $controller.'/'.$action;
		$requested = (isset($c->params['requested']) && $c->params['requested']==1) ? true : false;
		$permissionFree = array('users/login', 'users/logout', 'users/register', 'users/userVerification', 'users/forgotPassword', 'users/activatePassword', 'pages/display', 'users/accessDenied', 'users/emailVerification');
		$access =str_replace(' ','',ucwords(str_replace('_',' ',$controller))).'/'.$action;
		$allControllers=$this->ControllerList->getControllerWithMethods();
		$errorPage=false;
		if (!in_array($access, $allControllers)) {
			$errorPage=true;
		}
		if ((empty($pageRedirect) || $actionUrl!='users/login') && !$requested && !in_array($actionUrl, $permissionFree) && !$errorPage) {
			App::import("Model", "Usermgmt.UserGroup");
			$userGroupModel = new UserGroup;
			if (!$this->isLogged()) { //redirect to login
			    if (!$userGroupModel->isGuestAccess($controller, $action)) {
					$c->log('permission: actionUrl-'.$actionUrl, LOG_DEBUG);
					$c->Session->write('permission_error_redirect','/users/login');
					$c->Session->setFlash(__('您需要登陆才能看这个页面哦...'));
					$cUrl = '/'.$c->params->url;
					if(!empty($_SERVER['QUERY_STRING'])) {
						$rUrl = $_SERVER['REQUEST_URI'];
						$pos =strpos($rUrl, $cUrl);
						$cUrl=substr($rUrl, $pos, strlen($rUrl));
					}
					$c->Session->write('Usermgmt.OriginAfterLogin', $cUrl);
					$c->redirect('/login');
				}
			} else {//logged
                $this->setUser($c);
				if (!$userGroupModel->isUserGroupAccess($controller, $action, $this->getGroupId())) {
					$c->log('permission: actionUrl-'.$actionUrl, LOG_DEBUG);
					$c->Session->write('permission_error_redirect','/users/login');
					$c->redirect('/accessDenied');
				}
			}
		}
	}

    private function redirectForCode() {
        if(array_key_exists('code', $this->c->request->query)) {
            unset($this->c->request->query['code']);
        }
        
        $cUrl = rawurlencode(rtrim(Router::url('/', true), '/'). $this->c->request->here());
        $fwdUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->WeChatDataModel->appid}&redirect_uri={$cUrl}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        $this->log("DBUG:::".$cUrl);
        $this->c->redirect($fwdUrl);
    }

    //filter when you are login from wechat
    public function wechatFilter() {// deprecated
        return TRUE;

    }
    


	/**
	 * Used to set user in context of cakephp views
	 *
	 * @access public
	 * @return boolean
	 */
	public function setUser(&$c) {
		$user = $this->Session->read('UserAuth');
        $c->set('_username', $user['User']['username']);
	}
	/**
	 * Used to check whether user is logged in or not
	 *
	 * @access public
	 * @return boolean
	 */
	public function isLogged() {
		return ($this->getUserId() !== null);
	}
	/**
	 * Used to get user from session
	 *
	 * @access public
	 * @return array
	 */
	public function getUser() {
		return $this->Session->read('UserAuth');
	}

	/**
	 * Used to get user id from session
	 *
	 * @access public
	 * @return integer
	 */
	public function getUserId() {
		return $this->Session->read('UserAuth.User.id');
	}
	/**
	 * Used to get group id from session
	 *
	 * @access public
	 * @return integer
	 */
	public function getGroupId() {
		return $this->Session->read('UserAuth.User.user_group_id');
	}
	/**
	 * Used to get group name from session
	 *
	 * @access public
	 * @return string
	 */
	public function getGroupName() {
		return $this->Session->read('UserAuth.UserGroup.name');
	}
	/**
	 * Used to check is admin logged in
	 *
	 * @access public
	 * @return string
	 */
	public function isAdmin() {
		$groupId = $this->Session->read('UserAuth.User.user_group_id');
		if($groupId==ADMIN_GROUP_ID) {
			return true;
		}
		return false;
	}
	/**
	 * Used to check is guest logged in
	 *
	 * @access public
	 * @return string
	 */
	public function isGuest() {
		$groupId = $this->Session->read('UserAuth.User.user_group_id');
		if(empty($groupId)) {
			return true;
		}
		return false;
	}
	/**
	 * Used to make password in hash format
	 *
	 * @access public
	 * @param string $pass password of user
	 * @return hash
	 */
	public function makePassword($pass, $salt=null) {
		return md5(md5($pass).md5($salt));
	}
	/**
	 * Used to make salt in hash format
	 *
	 * @access public
	 * @return hash
	 */
	public function makeSalt() {
		$rand = mt_rand(0, 32);
		$salt = md5($rand . time());
		return $salt;
	}
	/**
	 * Used to maintain login session of user
	 *
	 * @access public
	 * @param mixed $type possible values 'guest', 'cookie', user array
	 * @param string $credentials credentials of cookie, default null
	 * @return array
	 */
	public function login($type = 'guest', $credentials = null) {
		$user=array();
		if (is_string($type) && ($type=='guest' || $type=='cookie')) {
			App::import("Model", "Usermgmt.User");
			$userModel = new User;
			$user = $userModel->authsomeLogin($type, $credentials);
		} elseif (is_array($type)) {
			$user = $type;
            //update last login
			App::import("Model", "Usermgmt.User");
            $user['User']['last_login'] = date("Y-m-d H:i:s");
			$userModel = new User;
            $userModel->save($user);

		}
		Configure::write($this->configureKey, $user);
		$this->Session->write('UserAuth', $user);
		return $user;
	}
	/**
	 * Used to delete user session and cookie
	 *
	 * @access public
	 * @return void
	 */
	public function logout() {
		$this->Session->delete('UserAuth');
		Configure::write($this->configureKey, array());
		$this->Cookie->delete(LOGIN_COOKIE_NAME);
	}
	/**
	 * Used to persist cookie for remember me functionality
	 *
	 * @access public
	 * @param string $duration duration of cookie life time on user's machine
	 * @return boolean
	 */
	public function persist($duration = '2 weeks') {
		App::import("Model", "Usermgmt.User");
		$userModel = new User;
		$token = $userModel->authsomePersist($this->getUserId(), $duration);
		$token = $token.':'.$duration;
		return $this->Cookie->write(
			LOGIN_COOKIE_NAME,
			$token,
			true, // encrypt = true
			$duration
		);
	}
	/**
	 * Used to check user's session if user's session is not available 
     * then it tries to get login from cookie if it exist
	 *
	 * @access private
	 * @return array
	 */
	private function __getActiveUser() {
		$user = Configure::read($this->configureKey);
		if (!empty($user)) {
			return $user;
		}

		$this->__useSession() || $this->__useCookieToken() || $this->__useGuestAccount();

		$user = Configure::read($this->configureKey);
		if (is_null($user)) {
			throw new Exception(
				'Unable to initilize user'
			);
		}
		return $user;
	}
	/**
	 * Used to get user from session
	 *
	 * @access private
	 * @return boolean
	 */
	private function __useSession() {
		$user = $this->getUser();
		if (!$user) {
			return false;
		}
		Configure::write($this->configureKey, $user);
		return true;
	}
	/**
	 * Used to get login from cookie
	 *
	 * @access private
	 * @return boolean
	 */
	private function __useCookieToken() {
		$token = $this->Cookie->read(LOGIN_COOKIE_NAME);
		if (!$token) {
			return false;
		}
		$user=false;
		// Extract the duration appendix from the token
		if(strpos($token, ":") !==false) {
			$tokenParts = split(':', $token);
			$duration = array_pop($tokenParts);
			$token = join(':', $tokenParts);
			$user = $this->login('cookie', compact('token', 'duration'));
			// Delete the cookie once its been used
		}
		$this->Cookie->delete(LOGIN_COOKIE_NAME);
		if (!$user) {
			return;
		}
		$this->persist($duration);
		return (bool)$user;
	}
	/**
	 * Used to get login as guest
	 *
	 * @access private
	 * @return array
	 */
	private function __useGuestAccount() {
		return $this->login('guest');
	}

    public function getEmptyUserTemplateByOauth2($openId, $username, $fromSystem='weibo', $smallPic='', $largePic='', $userInfo=array()) {
        $user = array();
        $user['User']['user_group_id']=DEFAULT_GROUP_ID;       
        $user['User']['active']=1;
	    $ip='';
	    if(isset($_SERVER['REMOTE_ADDR'])) {
	    	$ip=$_SERVER['REMOTE_ADDR'];
	    }
	    $user['User']['ip_address']=$ip;
	    $user['User']['allow_web_login'] = FALSE; //disallow web login, sns login only since we may have no passwd

	    $salt=$this->makeSalt();//random int
        //username, email, nick 
        $tmpStr = substr($salt, 0, 6);
        $loginUsername = "{$fromSystem}_{$username}_{$tmpStr}";
        $email = "{$loginUsername}.nologin@oauth2.izhuomi.com";
        $nick = "$username";
            
	    $user['User']['salt'] = $salt;
	    $user['User']['password'] = $this->makePassword("izhuomi.com", $salt);
	    $user['User']['username'] = $loginUsername;
	    $user['User']['email'] = $email; 
	    $user['User']['first_name'] = $nick; 
	    $user['User']['from_sys'] = $fromSystem; 
	    $user['User']['open_id'] = $openId; 
	    $user['User']['others'] = json_encode($userInfo); 

        return $user;
    }

    public function getEmptyUserTemplateByWechat($openId, $username) {
        $user = array();
        $user['User']['user_group_id']=DEFAULT_GROUP_ID;       
        $user['User']['active']=1;
	    $ip='';
	    if(isset($_SERVER['REMOTE_ADDR'])) {
	    	$ip=$_SERVER['REMOTE_ADDR'];
	    }
	    $user['User']['ip_address']=$ip;
	    $user['User']['allow_web_login'] = FALSE; //disallow web login, sns login only since we may have no passwd

	    $salt=$this->makeSalt();//random int
        //username, email, nick 
        $tmpStr = substr($salt, 0, 6);
        $loginUsername = "wechat_{$username}_{$tmpStr}";
        $email = "{$loginUsername}.nologin@.izhuomi.com";
        $nick = "$username";
            
	    $user['User']['salt'] = $salt;
	    $user['User']['password'] = $this->makePassword("izhuomi.com", $salt);
	    $user['User']['username'] = $loginUsername;
	    $user['User']['email'] = $email; 
	    $user['User']['first_name'] = $nick; 
	    $user['User']['from_sys'] = 'wechat'; 
	    $user['User']['open_id'] = $openId; 

        return $user;
    }

    public function debug($openId, $username) {//for sns
        echo "<br/>debug in 1 newEmptyUserByWechat<br/>";
		App::import("Model", "Usermgmt.User");
		$this->User = new User;
	    var_dump($this->User);
        echo "<br/>debug in 2 newEmptyUserByWechat<br/>";
    }

    public function newEmptyUserByWechat($openId, $username) {//for sns
		App::import("Model", "Usermgmt.User");
		$this->User = new User;
        $user = $this->getEmptyUserTemplateByWechat($openId, $username);
	    $this->User->save($user);
	    $userId=$this->User->getLastInsertID(); //here
	    $user = $this->User->findById($userId);
        if($user != NULL) {
    	    $this->login($user);//cookie' them
        } else {
            return false;
        }
        return $user;
    }
}
