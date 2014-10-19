<?php


App::uses('AppController', 'Controller');
/**
 * IzClassifications Controller
 *
 * @property IzClassification $IzClassification
 * @property PaginatorComponent $Paginator
 */
class IzClassificationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IzClassification->recursive = 0;
		$this->set('izClassifications', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->IzClassification->exists($id)) {
			throw new NotFoundException(__('Invalid iz classification'));
		}
		$options = array('conditions' => array('IzClassification.' . $this->IzClassification->primaryKey => $id));
		$this->set('izClassification', $this->IzClassification->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IzClassification->create();
			if ($this->IzClassification->save($this->request->data)) {
				return $this->flash(__('The iz classification has been saved.'), array('action' => 'index'));
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
		if (!$this->IzClassification->exists($id)) {
			throw new NotFoundException(__('Invalid iz classification'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IzClassification->save($this->request->data)) {
				return $this->flash(__('The iz classification has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('IzClassification.' . $this->IzClassification->primaryKey => $id));
			$this->request->data = $this->IzClassification->find('first', $options);
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
		$this->IzClassification->id = $id;
		if (!$this->IzClassification->exists()) {
			throw new NotFoundException(__('Invalid iz classification'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->IzClassification->delete()) {
			return $this->flash(__('The iz classification has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The iz classification could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
