<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP CountriesController
 * @author skrauss
 */
class CountriesController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny();
    }

    public function index() {

    }
    
    public function view($id = null) {
        $this->loadModel('User');
        $userid = $this->Country->find('first', array('fields' => array('entered_by')));
        if(is_null($id)) {
            $this->set('countries', $this->Country->find('all'));
        } else {
            $this->set('country', $this->Country->find('all'));
            if(!empty($userid['Country']['entered_by'])) {
                $this->set('user_id', $this->User->find('first', array('conditions' => array('id' => $userid['Country']['entered_by']))));
            } else {
                $this->set('user_id', '');
            }
            $country = $this->Country->findById($id);
            if(!$country) {
              throw new NotFoundException(__('Invalid post'));
            }
            $this->set('country', $country);
        }
    }
    
    public function add() {
        if($this->request->is('post')) {
            $this->Country->create();
            $this->request->data['Country']['entered_by'] = $this->Auth->user('id');
            if($this->Country->save($this->request->data)) {
                $this->Session->setFlash(__('Country added successfully.'));
                $this->redirect(array('action' => 'add'));
            }
            $this->Session->setFlash(__('Unable to add the country.'));
        }
    }
    
    public function edit($id = null) {
        if(!$id) {
          throw new NotFoundException(__('Invalid post'));
        }

        $country = $this->Country->findById($id);
        if(!$country) {
          throw new NotFoundException(__('Invalid post'));
        }

        if($this->request->is(array('post','put'))) {
          $this->Country->id = $id;
          if($this->Country->save($this->request->data)) {
            $this->Session->setFlash(__('The country has been updated.'));
            return $this->redirect(array('action' => 'view'));
          }
          $this->Session->setFlash(__('Unable to update the country.'));
        }

        if(!$this->request->data) {
          $this->request->data = $country;
        }
    }
    
    public function delete($id = null) {
        if($this->request->is('get')) {
          throw new MethodNotAllowedException();
        }

        if($this->Country->delete($id)) {
          $this->Session->setFlash(__('The supervision with id: %s has been deleted', h($id)));
          if($this->Country->find('count') == 0) {
              return $this->redirect(array('action' => 'index'));
          } else {
              return $this->redirect(array('action' => 'view'));
          }
        }
    }

}
