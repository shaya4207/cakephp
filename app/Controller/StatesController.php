<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * CakePHP statesController
 * @author skrauss
 */
class StatesController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny();
    }

    public function index() {

    }
    
    public function view($id = null) {
        $this->loadModel('User');
        $this->loadModel('Country');
        $userid = $this->State->find('first', array('fields' => array('entered_by')));
        $country = $this->State->find('first', array('fields' => array('country')));
        if(is_null($id)) {
            $this->set('states', $this->State->find('all'));
        } else {
            $this->set('state', $this->State->find('all'));
            $this->set('user_id', $this->User->find('first', array('conditions' => array('id' => $userid['State']['entered_by']))));
            $this->set('country', $this->Country->find('first', array('conditions' => array('id' => $country['State']['country']))));
            $state = $this->State->findById($id);
            if(!$state) {
              throw new NotFoundException(__('Invalid post'));
            }
            $this->set('state', $state);
        }
    }
    
    public function add() {
        $this->loadModel('Country');
        $this->set('countries', $this->Country->find('list'));
        if($this->request->is('post')) {
            $this->State->create();
            $this->request->data['State']['entered_by'] = $this->Auth->user('id');
            if($this->State->save($this->request->data)) {
                $this->Session->setFlash(__('State added successfully.'));
                $this->redirect(array('action' => 'add'));
            }
            $this->Session->setFlash(__('Unable to add the state.'));
        }
    }
    
    public function edit($id = null) {
        $this->loadModel('Country');
        $this->set('countries', $this->Country->find('list'));
        if(!$id) {
          throw new NotFoundException(__('Invalid post'));
        }

        $state = $this->State->findById($id);
        if(!$state) {
          throw new NotFoundException(__('Invalid post'));
        }

        if($this->request->is(array('post','put'))) {
          $this->State->id = $id;
          if($this->State->save($this->request->data)) {
            $this->Session->setFlash(__('The state has been updated.'));
            return $this->redirect(array('action' => 'view'));
          }
          $this->Session->setFlash(__('Unable to update the state.'));
        }

        if(!$this->request->data) {
          $this->request->data = $state;
        }
    }
    
    public function delete($id = null) {
        if($this->request->is('get')) {
          throw new MethodNotAllowedException();
        }

        if($this->State->delete($id)) {
          $this->Session->setFlash(__('The state with id: %s has been deleted', h($id)));
          if($this->State->find('count') == 0) {
              return $this->redirect(array('action' => 'index'));
          } else {
              return $this->redirect(array('action' => 'view'));
          }
        }
    }

}
