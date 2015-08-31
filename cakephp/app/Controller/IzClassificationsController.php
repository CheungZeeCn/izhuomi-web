<?php
App::uses('ArticleDataModel', 'Model');
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
    public $uses = array('IzClassification', 'IzArticle', 'ArticleDataModel');


/**
 * index method
 *
 * @return void
 */
	public function show($id = -1) {
		$this->IzClassification->recursive = 0;
        $allCls = $this->IzClassification->find('all');
        if($id == -1) { $id = 2; }
        $thisCls = NULL;
        foreach($allCls as $cls) {
            if($cls['IzClassification']['id'] == $id) {
                $thisCls = $cls;
                break;
            }
        }
        # get all articles ?
        //$options = array(
        //    'conditons' => array(
        //        'classification_id' => $id
        //     ),
        //     'order' => 'time_create DESC',
        //);
        //$articles = $this->IzArticle->find('all', $options);
        // todo page it 
        $articles = $this->ArticleDataModel->getClsNArticles($id, 1000);
        //add pic
        foreach($articles as $k => $v) {
            $url = $v['IzArticle']['url'];
            $contentPic = $v['IzArticle']['contentPic'];
            $articles[$k]['IzArticle']['picUrl'] = $this->ArticleDataModel->getArticlePicByPath($url, $contentPic); 
        }

		$this->set('thisCls', $thisCls);
		$this->set('articles', $articles);
		$this->set('izClassifications', $allCls);
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
