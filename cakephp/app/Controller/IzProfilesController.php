<?php
# file: IzProfilesController.php
# a controller file of Profile

// @description
// ...
// more details
// ...

class IzProfilesController extends AppController {
    public function index() {
    	//$this->IzProfile->recursive = 0;
	    $this->set('izProfiles', $this->IzProfile->find('all'));
    }

    public function show(){
        $this->loadModel('IzWordlist');
        $this->set('izWordlists', $this->IzWordlist->find('all'));
    }
}
