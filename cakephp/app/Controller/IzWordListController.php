<?php
# A php file
# by zhangzhi @2014-06-28 18:20:26 
# Copyright 2014 NONE rights reserved.

// @descriptions
// ...
// @more details
// ...
App::uses('AppController', 'Controller');
App::uses('IzWordList', 'Model');

class IzWordListController extends AppController{
    public function __construct ($request = null, $response = null){
        $this->loadModel('IzWordList');
        parent::__construct($request, $response);
    }

    public function addWord($name){
        $this->IzWordList->set(array(
            'name' => $name,
            'user_id' => 1
        ));
        $this->IzWordList->save();
    }
}

?>
