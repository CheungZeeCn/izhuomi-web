<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class NavBarHelper extends Helper {
    public $helpers = array('Html');
    public function getNavStringHtml($k, $v, $controllerName) {
        $ret = '';
        if(strtolower($k) == strtolower($controllerName)) {
            if(strtolower($k) == 'pages') {
                $ret =  "<li class='active'>". 
                    $this->Html->link(__("{$v['text']}"), '/') . 
                    "</li>";   
            } else {
                $ret =  "<li class='active'>". 
                    $this->Html->link(__("{$v['text']}"), array('controller'=>$k)) . 
                    "</li>";   
            }
        } else {
            if(strtolower($k) == 'pages') {
                $ret =  "<li class=''>". 
                    $this->Html->link(__("{$v['text']}"), '/') . 
                    "</li>";   
            } else {
                $ret =  "<li class=''>". 
                    $this->Html->link(__("{$v['text']}"), array('controller'=>$k)) . 
                    "</li>";   
            }
            //$ret =  "<li >". 
            //    $this->Html->link(__("{$v['text']}"), array('controller'=>$k)) . 
            //    "</li>";   
        }
        return $ret;
    }

    public function getIfActiveActionClass() {
        $thisAction = strtolower($this->Html->action);
        $actions = func_get_args(); 
        foreach($actions as $a) {
            $a = strtolower($a);
            if($a == $thisAction) {
                return 'active';
            }
        }
        return '';
    }

}
