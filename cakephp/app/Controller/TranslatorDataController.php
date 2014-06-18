<?php
App::uses('DataController', 'Controller');
/**
 * CompanyData Controller
 *
 */
class TranslatorDataController extends DataController {
    public $components = array('RequestHandler');

    public function __construct ($request = null, $response = null ) {
        $this->loadModel('TranslatorDataModel');
        parent::__construct ($request, $response);
    }

    public function getWord($word) {
	    $ret = $this->TranslatorDataModel->getWord($word);
		$this->set( array(
		    'return' => $ret,
			'status' => 'OK',
			'_serialize' => array('return', 'status')
			)
		);
	}

    public function getWordList($wordList) {
        // to do how to get wordList here from post?
        //$wordList = json_decode($wordList);
	    $ret = $this->TranslatorDataModel->getWordList($wordList);
		$this->set( array(
		    'return' => $ret,
			'status' => 'OK',
			'_serialize' => array('return', 'status')
			)
		);
	}

}
