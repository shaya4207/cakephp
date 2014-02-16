<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersController
 *
 * @author skrauss
 */

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }
    
    public function login() {
        if($this->request->is('post')) {
            if($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }


    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }
    
    public function view($id = null) {
        $this->User->id = $id;
        if(!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }
    
    public function add() {
        if($this->request->is('post')) {
            $this->User->create();
            if($this->User->save($this->request->data)) {
                $this->Auth->login();
                $this->Session->setFlash(__('You have registered successfully!'));
                return $this->redirect(array('controller' => 'restaurants', 'action' => 'index'));
            }
        }
    }
    
    public function edit($id = null) {
        $this->User->id = $id;
        if(!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if($this->request->is('post') || $this->request->is('put')) {
            if($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user could not be updated, try again.'));
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }
    
    public function delete($id = null) {
        $this->request->onlyAllow('post');
        
        $this->User->id = $id;
        if(!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
