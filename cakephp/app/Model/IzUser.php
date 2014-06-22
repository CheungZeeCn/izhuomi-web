<?php
# A php file
# by zhangzhi @2014-06-18 14:26:26 
# Copyright 2014 NONE rights reserved.

// @descriptions
// ...
// @more details
// ...

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');


class IzUser extends AppModel {
    public $useDbConfig = 'w';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'user', 'editor')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new SimplePasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;

}

}
