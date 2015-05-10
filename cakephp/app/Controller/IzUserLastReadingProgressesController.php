<?php
App::uses('AppController', 'Controller');
App::uses('IzUserReadWordCount', 'Model');
/**
 * IzUserLastReadingProgresses Controller
 *
 * @property IzUserLastReadingProgress $IzUserLastReadingProgress
 * @property PaginatorComponent $Paginator
 */
class IzUserLastReadingProgressesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Request');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public $uses = array('IzUserReadWordCount', 'IzUserLastReadingProgress');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IzUserLastReadingProgress->recursive = 0;
		$this->set('izUserLastReadingProgresses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 /*
	public function view($id = null) {
		if (!$this->IzUserLastReadingProgress->exists($id)) {
			throw new NotFoundException(__('Invalid iz user last reading progress'));
		}
		$options = array('conditions' => array('IzUserLastReadingProgress.' . $this->IzUserLastReadingProgress->primaryKey => $id));
		$this->set('izUserLastReadingProgress', $this->IzUserLastReadingProgress->find('first', $options));
	}
    */

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IzUserLastReadingProgress->create();
			if ($this->IzUserLastReadingProgress->save($this->request->data)) {
				return $this->flash(__('The iz user last reading progress has been saved.'), array('action' => 'index'));
			}
		}
	}

/*
*/
    private function countWordRead($wordId) {
        //records there? 
        $myUserId = $this->UserAuth->getUserId();
        $today = date("Y-m-d");
        $record = $this->IzUserReadWordCount->find('first',
                array('conditions' => array('user_id' => $myUserId, 'date'=>$today))
                );
        $add = 0;
        if($record) { // 
            $id = $record['IzUserReadWordCount']['id'];
            $lastWordId = $record['IzUserReadWordCount']['last_word_id'];
            if($lastWordId > $wordId ) {
                $add = $wordId + 10; //magic
            } else {
                $add = $wordId - $lastWordId;
            }
            $count = $record['IzUserReadWordCount']['count'] + $add;
            $record['IzUserReadWordCount']['count'] += $add;
            $record['IzUserReadWordCount']['last_word_id'] = $wordId;
            $this->IzUserReadWordCount->save($record, true, array("last_word_id", "count"));
        } else {// new
            $add = $wordId;
            $count = $add;

	        $this->IzUserReadWordCount->create(false);
	        $this->IzUserReadWordCount->set('user_id', $myUserId);
	        $this->IzUserReadWordCount->set('count', $count);
	        $this->IzUserReadWordCount->set('date', $today);
	        $this->IzUserReadWordCount->set('last_word_id', $wordId);

            $this->IzUserReadWordCount->save();
        }
        
    }

	public function addOrEditAjax($articleId) {
        //$ret = $this->IzUserReadWordCount->find('all');
        // get user id
        $myUserId = $this->UserAuth->getUserId();
        $articleId = $this->request->data('articleId');
        $articleName = $this->request->data('articleName');
        $word = $this->request->data('word');
        $wordId = $this->request->data('wordId');
        $sentence = $this->request->data('sentence');
        $record = $this->IzUserLastReadingProgress->find('first',
                array('conditions' => array('user_id' => $myUserId))
                );
		if ($record) { //already added, edit
            //todo
	        $record['IzUserLastReadingProgress']['article_id'] =  $articleId;
	        $record['IzUserLastReadingProgress']['article_name'] =  $articleName;
	        $record['IzUserLastReadingProgress']['last_step_word_id'] =  $wordId;
	        $record['IzUserLastReadingProgress']['last_reading_word'] =  $word;
	        $record['IzUserLastReadingProgress']['last_reading_sentences'] =  $sentence;
            if ($this->IzUserLastReadingProgress->save($record)) {
                 $msg = "OK";
                 $status = "OK";
            } else {
                $msg = "DB Save ERROR";
            }
		}
        else {// new
	        //$this->IzUserLastReadingProgress->save();
	        $this->IzUserLastReadingProgress->create(false);
	        $this->IzUserLastReadingProgress->set('user_id', $myUserId);
	        $this->IzUserLastReadingProgress->set('article_id', $articleId);
	        $this->IzUserLastReadingProgress->set('article_name', $articleName);
	        $this->IzUserLastReadingProgress->set('last_step_word_id', $wordId);
	        $this->IzUserLastReadingProgress->set('last_reading_word', $word);
	        $this->IzUserLastReadingProgress->set('last_reading_sentences', $sentence);
            if ($this->IzUserLastReadingProgress->save()) {
                 $msg = "OK";
                 $status = "OK";
            } else {
                $msg = "DB Save ERROR";
            }
        }
        $this->countWordRead($wordId);
        $this->set(array('msg'=>$msg, "status"=>$status, '_serialize' => array("status", "msg"))); 
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 /*
	public function edit($id = null) {
		if (!$this->IzUserLastReadingProgress->exists($id)) {
			throw new NotFoundException(__('Invalid iz user last reading progress'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IzUserLastReadingProgress->save($this->request->data)) {
				return $this->flash(__('The iz user last reading progress has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('IzUserLastReadingProgress.' . $this->IzUserLastReadingProgress->primaryKey => $id));
			$this->request->data = $this->IzUserLastReadingProgress->find('first', $options);
		}
	}

*/
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 /*
	public function delete($id = null) {
		$this->IzUserLastReadingProgress->id = $id;
		if (!$this->IzUserLastReadingProgress->exists()) {
			throw new NotFoundException(__('Invalid iz user last reading progress'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->IzUserLastReadingProgress->delete()) {
			return $this->flash(__('The iz user last reading progress has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The iz user last reading progress could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
*/
}
