<?php
App::uses('AppController', 'Controller');
App::uses('DataController', 'Controller');
/**
 * CompanyData Controller
 *
 */
class ArticleDataController extends DataController {
    public $components = array('RequestHandler');

    public function __construct ($request = null, $response = null ) {
        $this->loadModel('ArticleDataModel');
        parent::__construct ($request, $response);
    }

    public function viewArticle($id){
	    $ret = $this->ArticleDataModel->getArticle($id);
		$this->set( array(
		    'return' => $ret,
			'status' => 'OK',
			'_serialize' => array('return', 'status')
			)
		);
	}

}
