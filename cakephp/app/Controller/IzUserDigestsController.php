<?php
App::uses('AppController', 'Controller');
/**
 * IzUserDigests Controller
 *
 * @property IzUserDigest $IzUserDigest
 * @property PaginatorComponent $Paginator
 */
class IzUserDigestsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

    public $paginate = array(
        'limit' => 25,
        'maxLimit' => 25,
        'order' => array(
            'addtime' => 'desc'
        ),
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $myUserId = $this->UserAuth->getUserId();
		$this->IzUserDigest->recursive = 0;
        $this->paginate['conditions'] = array('user_id =' => $myUserId);
        $this->Paginator->settings = $this->paginate;
        //var_dump($this->paginate);
		$this->set('izUserDigests', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
        return false;
		if (!$this->IzUserDigest->exists($id)) {
			throw new NotFoundException(__('Invalid iz user digest'));
		}
		$options = array('conditions' => array('IzUserDigest.' . $this->IzUserDigest->primaryKey => $id));
		$this->set('izUserDigest', $this->IzUserDigest->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        return false;
		if ($this->request->is('post')) {
			$this->IzUserDigest->create();
			if ($this->IzUserDigest->save($this->request->data)) {
				$this->Session->setFlash(__('The iz user digest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The iz user digest could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->IzUserDigest->exists($id)) {
			throw new NotFoundException(__('Invalid iz user digest'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IzUserDigest->save($this->request->data)) {
				$this->Session->setFlash(__('The iz user digest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The iz user digest could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('IzUserDigest.' . $this->IzUserDigest->primaryKey => $id));
			$this->request->data = $this->IzUserDigest->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
        return false;
		$this->IzUserDigest->id = $id;
		if (!$this->IzUserDigest->exists()) {
			throw new NotFoundException(__('Invalid iz user digest'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->IzUserDigest->delete()) {
			$this->Session->setFlash(__('The iz user digest has been deleted.'));
		} else {
			$this->Session->setFlash(__('The iz user digest could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function ajax_delete($id) {
        $msg = 'ERROR';
        $status = 'ERROR';
        
        $myUserId = $this->UserAuth->getUserId(); 
		$this->IzUserDigest->id = $id;
		if (!$this->IzUserDigest->exists()) {
            $msg = "Not exist";
		} else {
            $rec = $this->IzUserDigest->findById($id);
            if($rec['IzUserDigest']['user_id'] != $myUserId) {
                $msg = "No Privilege";
            } else {
		        $this->request->allowMethod('post', 'delete', 'get');
		        if ($this->IzUserDigest->delete()) {
                    $msg = "OK";
                    $status = "OK";
		        } else {
                    $msg = "TRY AGAIN";
		        }
            }
        }
        $this->set(array('msg'=>$msg, "status"=>$status, '_serialize' => array("status", "msg")));
	}

    public function ajax_add($articleId) {
        $myUserId = $this->UserAuth->getUserId(); 
        //error_log("userId:" . $myUserId); 
        $msg = 'ERROR';
        $status = 'ERROR';
        if($myUserId==null) {
            $msg = 'failed: not login';
        } else {
		    if ($this->request->is(array('post', 'get'))) {
                $data = $this->request->data;
		    	$this->IzUserDigest->create(false);
                $this->IzUserDigest->set('user_id', $myUserId);
                $this->IzUserDigest->set('article_id', $articleId);
                $this->IzUserDigest->set('digest', $data);
		    	if ($this->IzUserDigest->save()) {
                    $msg = "OK";    
                    $status = "OK"; 
		    	} else {
                    $msg = "DB Save ERROR";
                }
		    }
            
        }
		    
        $this->set(array('msg'=>$msg, "status"=>$status, '_serialize' => array("status", "msg")));
    }

	public function ajax_edit() {
        $status = 'ERROR';
        $msg = 'ERROR';
        $requestData = $this->request->data; 
        $id = $requestData['digestId'];
        $debug = array();
        $wordData = $this->IzUserDigest->findById($id);

		if (!$this->IzUserDigest->exists($id)) {
            $msg = __('出错啦，digestId 不存在'); 
		} else {// exists
		    if ($this->request->is(array('post', 'put'))) {
                //validation here
                //check user_id
                $myUserId = $this->UserAuth->getUserId();
                if($wordData != NULL) {
                    $dataUserId = $wordData['IzUserDigest']['user_id'];
                    if($dataUserId != $myUserId || 
                        !in_array($requestData['wordField'], array('digest'))) {
                        $msg = __('出错啦，提交的数据有误');      
                    } else {
                        $wordData['IzUserDigest'][$requestData['wordField']] = $requestData['value'];
                        if($this->IzUserDigest->save($wordData)) {
                            $status = 'OK';   
                        } else {
                            $msg = __('Save ERROR... :-(');
                        }
                    }
                }
                $debug = $wordData;
		    } 
        }
        $data = $wordData['IzUserDigest'][$requestData['wordField']];

        $this->set(array('msg' => $msg, "status"=>$status, "requestData"=>$requestData, "debug" => $debug,
                    "return" => $data, '_serialize' => array("return", "msg", "status", "requestData", "debug")));
	}
}
