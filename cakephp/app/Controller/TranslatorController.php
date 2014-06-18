<?php
App::uses('AppController', 'Controller');

/**
 * IzArticles Controller
 *
 */
class TranslatorController extends AppController {

    public $layout = 'translator';

/**
 * Scaffold
 *
 * @var mixed
 */
    //public $scaffold;
    public function __construct ($request = null, $response = null ) {
        $this->loadModel('TranslatorDataModel');
        parent::__construct ($request, $response);
    }

    public function view($word) {
        $ret = $this->TranslatorDataModel->getWord($word);
        if( is_array($ret) ) { 
            $this->set('word', $ret['_word']);
            $this->set('from', $ret['_from']);
            if(isset($ret['_basic']['phonetic'])) {
                $this->set('phonetic', $ret['_basic']['phonetic']);
            } else if(isset($ret['_basic']['us-phonetic'])) {
                $this->set('phonetic', $ret['_basic']['us-phonetic']);
            } else {
                $this->set('phonetic', "");
            }
            
            $this->set('explains', $ret['_basic']['explains']);
        } else {
            $this->set('msg', "嗷~ 暂时没有找到关于[$word]的解释");
            //todo log down
        }

    }

}
