<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    //public $components = array('DebugKit.Toolbar');
    // ...

    public $components = array(
        'Session',
        'Auth' => array(
            //todo: may lose the referer, check it 
            //      we always want to go back to the url which we come from.
            //'loginRedirect' => array(
            //    'controller' => 'IzArticles',
            //    'action' => 'show',
            //    
            //),
            'logoutRedirect' => array(
                'controller' => 'IzArticles',
                'action' => 'show',
                '1'
            )
        )
    );

    public function beforeFilter() {
        $this->Auth->authenticate = array(
            AuthComponent::ALL => array('userModel' => 'IzUser'),
            'Basic',
            'Form',
        );
        //todo allow all now
        $this->Auth->allow();
        //$this->Auth->authorize = false;
        //set _username in the context
        $this->setUser();
        //$this->Auth->allow('*');
    } 

    //only a test function
    public function isAdmin($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // Default deny
        return false;
    }

    //get username
    public function setUser() {
        $user = $this->Auth->user();
        if($user != NULL) {
            $this->set('_username', $user['username']);
        }
        //$this->set('_userid', $user['id']);
    }

    public function getUsername() {
        $user = $this->Auth->user();
        if($user != NULL) {
            return $user['username'];
        } else {
            return NULL;
        }
    }

}
