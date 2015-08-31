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
}
