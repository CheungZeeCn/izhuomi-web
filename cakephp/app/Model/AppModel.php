<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
    public function deleteModelNameFromData($data) {
        $ret = array();    
        foreach ($data as $d) {
            foreach($d as $k => $v) {
                $ret[] = $v;
            }
        }
        return $ret;
    }

    public function makeConditions($mapping, $values) {
        $conditions = array();
        foreach($mapping as $k => $v) {
            if($values[$k] != NULL) {
                $conditions[$v] = $values[$k];
            }
        }
        return $conditions;
    }

    public function getFileContent($file, $locate=NULL) {
        //todo should be update by using 
        $fn = $file;
        $base = dirname(dirname(APP));
        $locate = (!$locate) ? $base : $locate ;
        $file  = $locate . '/' . $file . "/content.html" ;
        try {
            $content = file_get_contents($file);
        } catch (Exception $e) {
            $content = "";
        }
        //echo $content;
        return $content;
    }
}
