<?php
App::uses('AppModel', 'Model');
App::uses('IzArticle', 'Model');

/**
 * Companyinfor Model
 *
 */
class TranslatorDataModel extends AppModel {
    public $useTable = FALSE;

    public $addr = NULL;

    public function getWord($w) {
        $this->addr = Configure::read('translator.addr');
        $ret = NULL;
        try {
            if(($client = new SoapClient($this->addr)) == NULL) {
                return NULL;    
            }
            $ret = $client->translate(array('word'=>$w));
        } catch (SoapFault $exception) {
            //echo $exception;
            $ret = NULL;
        }

        if($ret != NULL && isset($ret->translateResult)) {
            $ret = $ret->translateResult;
        }
        if ($ret != NULL && is_string($ret) ) {
            $ret = json_decode($ret, true);
        }

        return $ret;
    }

    public function getWordList($wList) {
        $this->addr = Configure::read('translator.addr');
        $client = new SoapClient($this->addr); 
        $ret = NULL;
        $wList = json_encode($wList);
        try {
            $ret = $client->translateMany(array('wordList'=>$wList));
        } catch (SoapFault $exception) {
            //echo $exception;
            $ret = NULL;
        }

        if($ret != NULL && isset($ret->translateManyResult)) {
            $ret = $ret->translateManyResult;
        }
        if ($ret != NULL && is_string($ret) ) {
            $ret = json_decode($ret, true);
        }

        return $ret;
    }

}
