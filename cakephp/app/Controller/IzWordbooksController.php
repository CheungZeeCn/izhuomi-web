<?php
App::uses('AppController', 'Controller');
/**
 * IzWordbooks Controller
 *
 * @property IzWordbook $IzWordbook
 * @property PaginatorComponent $Paginator
 */
class IzWordbooksController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Js');

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
            'IzWordbook.created' => 'desc'
        ),
    );
    
    

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $myUserId = $this->UserAuth->getUserId();
		$this->IzWordbook->recursive = 0;
        $this->paginate['conditions'] = array('user_id =' => $myUserId);
        $this->Paginator->settings = $this->paginate;
        //var_dump($this->paginate);
		$this->set('izWordbooks', $this->Paginator->paginate());
		//$this->set('izWordbooks', $this->Paginator->paginate() );
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	//public function view($id = null) {
	//	if (!$this->IzWordbook->exists($id)) {
	//		throw new NotFoundException(__('Invalid iz wordbook'));
	//	}
	//	$options = array('conditions' => array('IzWordbook.' . $this->IzWordbook->primaryKey => $id));
	//	$this->set('izWordbook', $this->IzWordbook->find('first', $options));
	//}


/**
 * add method
 *
 * @return void
 */
	//public function add() {
	//	if ($this->request->is('post')) {
	//		$this->IzWordbook->create();
    //        //should get the time here;
	//		if ($this->IzWordbook->save($this->request->data)) {
	//			return $this->flash(__('The iz wordbook has been saved.'), array('action' => 'index'));
	//		}
	//	}
	//}

	public function ajax_add($word) {
        $myUserId = $this->UserAuth->getUserId(); 
        $this->loadModel('TranslatorDataModel');
        $wordData = $this->TranslatorDataModel->getWord($word);
        $msg = 'ERROR';
        $status = 'ERROR';
        
        //check if the word in the database;
        if($this->IzWordbook->find('first', array('conditions' => array('user_id' => $myUserId, 'word' => $word)))) {
            $msg = "单词{$word}已经在你的单词本里面啦~";
        } else {// ok to save it 
            $now = new DateTime();
            $created = $now->format('Y-m-d H:i:s');

		    //$this->request->allowMethod('post', 'get');
		    if ($this->request->is(array('post', 'get'))) {
		    	$this->IzWordbook->create();
                $this->IzWordbook->set('word', $wordData['_word']);
                $this->IzWordbook->set('user_id', $myUserId);
                $this->IzWordbook->set('phonetic', $wordData['_basic']['phonetic']);
                $this->IzWordbook->set('explain', implode("  ", $wordData['_basic']['explains']));
                if(!empty($wordData['_from'])) {
                    $this->IzWordbook->set('comment', "from {$wordData['_from']}");
                }
                $this->IzWordbook->set('created', $created);
		    	if ($this->IzWordbook->save()) {
                    $msg = "OK";    
                    $status = "OK"; 
		    	} else {
                    $msg = "DB Save ERROR";
                }
		    }
        }
        $this->set(array('msg'=>$msg, "status"=>$status, '_serialize' => array("status", "msg")));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->IzWordbook->exists($id)) {
			throw new NotFoundException(__('Invalid iz wordbook'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IzWordbook->save($this->request->data)) {
				return $this->flash(__('The iz wordbook has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('IzWordbook.' . $this->IzWordbook->primaryKey => $id));
			$this->request->data = $this->IzWordbook->find('first', $options);
		}
	}

	public function ajax_edit() {
        $status = 'ERROR';
        $msg = 'ERROR';
        $requestData = $this->request->data; 
        $id = $requestData['wordId'];
        $debug = array();
        $wordData = $this->IzWordbook->findById($id);

		if (!$this->IzWordbook->exists($id)) {
			//throw new NotFoundException(__('Invalid iz wordbook'));
            $msg = __('出错啦，wordId不存在'); 
		} else {// exists
		    if ($this->request->is(array('post', 'put'))) {
                //validation here
                //check user_id
                $myUserId = $this->UserAuth->getUserId();
                if($wordData != NULL) {
                    $dataUserId = $wordData['IzWordbook']['user_id'];
                    if($dataUserId != $myUserId || 
                        !in_array($requestData['wordField'], array('phonetic', 'explain', 'comment'))) {
                        $msg = __('出错啦，提交的数据有误');          
                    } else {
                        $wordData['IzWordbook'][$requestData['wordField']] = $requestData['value'];
                        if($this->IzWordbook->save($wordData)) {
                            $status = 'OK';   
                        } else {
                            $msg = __('Save ERROR... :-(');
                        }
                    }
                }
                $debug = $wordData;
		    	//if ($this->IzWordbook->save($this->request->data)) {
		    	//	//return $this->flash(__('The iz wordbook has been saved.'), array('action' => 'index'));
                //    $ret['status'] = 'OK';
                //    $ret['msg'] = 'OK';
                //    // set data here ?
                //}
		    } 
        }
        $data = $wordData['IzWordbook'][$requestData['wordField']];

        $this->set(array('msg' => $msg, "status"=>$status, "requestData"=>$requestData, "debug" => $debug,
                    "return" => $data, '_serialize' => array("return", "msg", "status", "requestData", "debug")));
        /*
        else {
			$options = array('conditions' => array('IzWordbook.' . $this->IzWordbook->primaryKey => $id));
			$this->request->data = $this->IzWordbook->find('first', $options);
		} */
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->IzWordbook->id = $id;
		if (!$this->IzWordbook->exists()) {
			throw new NotFoundException(__('Invalid iz wordbook'));
		}
        $myUserId = $this->UserAuth->getUserId();
        $wordData = $this->IzWordbook->findById($id);
        if($myUserId != $wordData['IzWordbook']['user_id']) {
			throw new NotFoundException(__('Invalid user, no priviledge'));
        }

		$this->request->allowMethod('post', 'delete');
        if ($this->request->is('ajax')) {
		    if ($this->IzWordbook->delete()) {
		    	$status = 'OK';
                $msg = '成功删除';
                $this->set(array('msg'=>$msg, "status"=>$status, '_serialize' => array("status", "msg")));
		    } else {
		    	$status = 'ERROR';
                $msg = 'delete failed';
                $this->set(array('msg'=>$msg, "status"=>$status, '_serialize' => array("status", "msg")));
		    }
        } else {
		    if ($this->IzWordbook->delete()) {
		    	return $this->flash(__('The iz wordbook has been deleted.'), array('action' => 'index'));
		    } else {
		    	return $this->flash(__('The iz wordbook could not be deleted. Please, try again.'), array('action' => 'index'));
		    }
        }

	}
}
