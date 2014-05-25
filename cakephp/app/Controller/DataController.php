<?php

class DataController extends AppController {
    public $limit = 5000;

    public function getRequest($name) {
        if (!empty($this->request->query[$name])) {
            return $this->request->query[$name];
        } else {
            return NULL;
        }
    }

/*
    public function deleteModelNameFromData($data) {
        $ret = array();    
        foreach ($data as $d) {
            foreach($d as $k => $v) {
                $ret[] = $v;
            }
        }
        return $ret;
    }
    */

}

