<?php
App::uses('AppModel', 'Model');
//App::uses('IzArticle', 'Model');

/**
 * Companyinfor Model
 *
 */
class DebugModel extends AppModel {
    public $useTable = false;


    public function logTest() {
        CakeLog::write('error', 'Try ~~ERROR');
        
    }

}
