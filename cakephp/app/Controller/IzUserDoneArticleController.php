<?php
App::uses('AppController', 'Controller');
/**
 * IzUserDoneArticle Controller
 *
 * @property IzUserDoneArticle $IzUserDoneArticle
 * @property PaginatorComponent $Paginator
 */
class IzUserDoneArticleController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IzUserDoneArticle->recursive = 0;
		$this->set('izUserDoneArticles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->IzUserDoneArticle->exists($id)) {
			throw new NotFoundException(__('Invalid iz user done article'));
		}
		$options = array('conditions' => array('IzUserDoneArticle.' . $this->IzUserDoneArticle->primaryKey => $id));
		$this->set('izUserDoneArticle', $this->IzUserDoneArticle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	//public function add() {
	//	if ($this->request->is('post')) {
	//		$this->IzUserDoneArticle->create();
	//		if ($this->IzUserDoneArticle->save($this->request->data)) {
	//			return $this->flash(__('The iz user done article has been saved.'), array('action' => 'index'));
	//		}
	//	}
	//}

    public function ajax_add($articleId) {
        $myUserId = $this->UserAuth->getUserId(); 
        //error_log("userId:" . $myUserId); 
        $msg = 'ERROR';
        $status = 'ERROR';
        if($myUserId==null) {
            $msg = 'ERROR, need login';
        } else if($this->IzUserDoneArticle->find('first', 
                                                array('conditions' => array('user_id' => $myUserId, 'article_id' => $articleId))
                                                )) {
                $msg = 'OK, but it is already done before :) ';
                $status = 'OK';
        } else {
            //$now = new DateTime();
            //$created = $now->format('Y-m-d H:i:s');

		    //$this->request->allowMethod('post', 'get');
		    if ($this->request->is(array('post', 'get'))) {
		    	$this->IzUserDoneArticle->create(false);
                $this->IzUserDoneArticle->set('user_id', $myUserId);
                $this->IzUserDoneArticle->set('article_id', $articleId);
		    	if ($this->IzUserDoneArticle->save()) {
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
		if (!$this->IzUserDoneArticle->exists($id)) {
			throw new NotFoundException(__('Invalid iz user done article'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IzUserDoneArticle->save($this->request->data)) {
				return $this->flash(__('The iz user done article has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('IzUserDoneArticle.' . $this->IzUserDoneArticle->primaryKey => $id));
			$this->request->data = $this->IzUserDoneArticle->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	//public function delete($id = null) {
	//	$this->IzUserDoneArticle->id = $id;
	//	if (!$this->IzUserDoneArticle->exists()) {
	//		throw new NotFoundException(__('Invalid iz user done article'));
	//	}
	//	$this->request->allowMethod('post', 'delete');
	//	if ($this->IzUserDoneArticle->delete()) {
	//		return $this->flash(__('The iz user done article has been deleted.'), array('action' => 'index'));
	//	} else {
	//		return $this->flash(__('The iz user done article could not be deleted. Please, try again.'), array('action' => 'index'));
	//	}
	//}
}
