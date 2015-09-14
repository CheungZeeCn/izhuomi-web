<?php
App::uses('AppController', 'Controller');
App::uses('DataController', 'Controller');
//App::uses('DebugModel', 'Model');
/**
 * CompanyData Controller
 *
 */
class DebugsController extends DataController {
    public $components = array('RequestHandler');
    public $uses = array('DebugModel');

    //public function __construct ($request = null, $response = null ) {
    //    //$this->loadModel('Debug');
    //    parent::__construct ($request, $response);
    //}

    public function checkRequestUrl(){
        echo $this->request->here();   
        echo "<br/>";
        if(array_key_exists('c', $this->request->query)) {
            //$this->request->query['c'] = 'falsed';
            unset($this->request->query['c']);
        }

        $this->DebugModel->logTest();    

        echo $this->request->here();   
        echo "<br/>";

        exit(0);
	}

    public function checkVarExport(){
        echo var_export(array('a'=>1, 'b'=>2));   
        exit(0);
    }

}
