<?php
App::uses('AppController', 'Controller');
/**
 * IzComments Controller
 *
 * @property IzComment $IzComment
 * @property PaginatorComponent $Paginator
 */
class IzCommentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
    public $uses = array('IzComment', 'IzUsersLogo');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IzComment->recursive = 0;
		$this->set('izComments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->IzComment->exists($id)) {
			throw new NotFoundException(__('Invalid iz comment'));
		}
		$options = array('conditions' => array('IzComment.' . $this->IzComment->primaryKey => $id));
		$this->set('izComment', $this->IzComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        return false;
		if ($this->request->is('post')) {
			$this->IzComment->create();
			if ($this->IzComment->save($this->request->data)) {
				$this->Session->setFlash(__('The iz comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The iz comment could not be saved. Please, try again.'));
			}
		}
	}

	public function ajax_list($modelName, $id) {
        $msg = 'ERROR';
        $status = 'ERROR';
        
        //check if the word in the database;
        if($modelName == NULL || $id == NULL) {
            $msg = 'modelName or id empty';
        } else {     
            $this->IzComment->recursive = 1;
            $options = array(
                'conditions' => array(
                    'model' => $modelName,
                    'foreign_key' => $id,
                ),
                'order' => 'IzComment.created',
            );
            $msg = 'OK';
            $status = 'OK';
            $ret = $this->IzComment->find('all', $options);
            foreach($ret as $k => $v) {
                $ret[$k]['UserLogo']['small_logo_addr'] = $this->IzUsersLogo->genLogoUrl($v['UserLogo']['small_logo_addr'], 'small', false);   
                $ret[$k]['UserLogo']['large_logo_addr'] = $this->IzUsersLogo->genLogoUrl($v['UserLogo']['large_logo_addr'], 'large', false);   
            }
        }

        $this->set(array('msg'=>$msg, "status"=>$status, "data" => $ret, '_serialize' => array("status", "msg", "data")));

	}

	public function ajax_add($modelName, $id) {
        $myUserId = $this->UserAuth->getUserId(); 
        $msg = 'ERROR';
        $status = 'ERROR';
        
        //check if the word in the database;
        if($myUserId == null ) {
            $msg = 'log in first';
        } else if($modelName == NULL || $id == NULL) {
            $msg = 'modelName or id empty';
        } else if($this->request->is(array('post', 'get'))) {
            $data = $this->request->data; 
            $body = isset($data['Comment']['body'])?$this->cleanHtml($data['Comment']['body']):"加油";      
            if(trim($body) == '' ) {
                $msg = 'blank string!';
            } else {
                $this->IzComment->create(false); 
                $this->IzComment->set('user_id', $myUserId);
                $this->IzComment->set('body', $body);
                $this->IzComment->set('foreign_key', $id);
                $this->IzComment->set('model', $modelName);
                if(!$this->IzComment->save()) {
                    $msg = "Save error";    
                } else {
                    $msg = "Save OK";
                    $status = "OK";
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
        return false;
		if (!$this->IzComment->exists($id)) {
			throw new NotFoundException(__('Invalid iz comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IzComment->save($this->request->data)) {
				$this->Session->setFlash(__('The iz comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The iz comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('IzComment.' . $this->IzComment->primaryKey => $id));
			$this->request->data = $this->IzComment->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function ajax_delete($id = null) {
        $status = "ERROR";
        $msg = "ERROR";

        $myUserId = $this->UserAuth->getUserId();

        $this->IzComment->recursive = 0;

        $options = array(
            'conditions'=>array('IzComment.user_id' => $myUserId, 'IzComment.id' => $id),
        );

		if (! $myUserId) {
            $msg = "login first";
		} else if( $this->IzComment->find('first', $options) == NULL ) {
            $msg = "id not exists";
		} else {
		    $this->request->allowMethod('get', 'post', 'delete');
            $this->IzComment->id = $id;
		    if ($this->IzComment->delete()) {
                $status = "OK";
                $msg = "OK";   
		    } else {
                $msg = "TRY AGAIN";   
		    }
        }

        $this->set(array('msg'=>$msg, "status"=>$status, '_serialize' => array("status", "msg")));
	}

	public function delete($id = null) {
        return false;
		$this->IzComment->id = $id;
		if (!$this->IzComment->exists()) {
			throw new NotFoundException(__('Invalid iz comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->IzComment->delete()) {
			$this->Session->setFlash(__('The iz comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The iz comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function cleanHtml($text, $settings = 'full') {
		App::import('Helper', 'Cleaner');
		$cleaner = & new CleanerHelper(new View($this->Controller));
		return $cleaner->clean($text, $settings);
	}
}
