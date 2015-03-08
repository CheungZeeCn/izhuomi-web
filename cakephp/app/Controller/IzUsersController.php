<?php
# A php file
# by zhangzhi @2014-06-18 14:30:07 
# Copyright 2014 NONE rights reserved.

// @descriptions
// ...
// @more details
// ...

class IzUsersController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('add', 'logout');
    }

    public function checklogData($data) {
        //check logging data
        //todo 
        return 'OK';
    }

    public function login() {
        if ($this->Auth->loggedIn() == true) {
            $this->Session->setFlash(__('Already logged in, please logout first'));
            $this->redirect($this->Auth->login());    
        }

        if ($this->request->is('post')) {// post data comes in
            $checkRet = $this->checklogData($this->request->data['IzUser']);
            if($checkRet=='OK') {
                $ret = $this->Auth->login();// true or false
                if ($ret) {// login successful
                    $this->redirect($this->getLoginRedirectUrl());
                } else {
                    $this->Session->setFlash(__('Invalid username or password, try again'), 
                                                'default', array(), 'auth');
                }
            } else {
                $this->Session->setFlash(__("log in error, [ $checkRet ]"), 'default', array(), 'auth');
            }
        }
    }

    public function getLoginRedirectUrl() {
        $reUrl = $this->request->query['redirect2'];
        if($reUrl) {//has a parameter
            return $reUrl;
        } else if($this->referer() && 
                    basename($this->referer()) != 'login' &&
                    basename($this->referer()) != 'logout') {//has a referer
            return $this->referer();
        } else {
            return $this->Auth->redirect();
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->IzUser->recursive = 0;
        $this->set('izUsers', $this->paginate());
    }

    public function view($id = null) {
        $this->IzUser->id = $id;
        if (!$this->IzUser->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->IzUser->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->IzUser->useDbConfig = 'w';
            $this->IzUser->create();
               
            //var_dump($this->request->data);
            if ($this->IzUser->save($this->request->data, true, array('username', 'password', 'role'))) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }
    public function checkRegData($data) {
        //check syntax
        //check passwd
        //check for anti-attack
        //todo
        //if ok return 'OK' otherwise return errMsg.
        return 'OK';
    }

    public function reg() {
        if ($this->request->is('post')) {
            //todo check it here!
            $checkRet = $this->checkRegData($this->request->is('post'));
            if($checkRet=='OK') {
                $this->IzUser->useDbConfig = 'w';
                $this->IzUser->create();
                $this->request->data['IzUser']['role'] = 'user';
                if ($this->IzUser->save($this->request->data, true, array('username', 'password', 'role'))) {
                    $this->Session->setFlash(__('OK! Welcome to Izhuomi'));
                    $id = $this->IzUser->id; 
                    //manually login
                    $this->request->data['IzUser'] = array_merge(
                        $this->request->data['IzUser'],
                        array('id' => $id)
                    );
                    $this->Auth->login($this->request->data['IzUser']); 
                    $this->IzUser->useDbConfig = 'default';
                    $reUrl = $this->getLoginRedirectUrl();
                    $this->redirect($reUrl);
                }
                $this->Session->setFlash(
                    __('Register failed, please, try again. :('));
            } else {
                $this->Session->setFlash(
                    __("Register failed, [ $checkRet ]")
                );
            }
        }
    }

    public function edit($id = null) {
        $this->IzUser->id = $id;
        if (!$this->IzUser->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->IzUser->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->IzUser->read(null, $id);
            unset($this->request->data['IzUser']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->IzUser->id = $id;
        if (!$this->IzUser->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->IzUser->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}


