<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP CuisinesController
 * @author skrauss
 */
class CuisinesController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny();
    }

    public function index(){

    }
    
    public function view($id = null) {
        $this->loadModel('User');
        $userid = $this->Cuisine->find('first', array('fields' => array('entered_by')));
        if(is_null($id)) {
            $this->set('cuisines', $this->Cuisine->find('all'));
        } else {
            $this->set('cuisine', $this->Cuisine->find('all'));
            $this->set('user_id', $this->User->find('first', array('conditions' => array('id' => $userid['Cuisine']['entered_by']))));
            $cuisine = $this->Cuisine->findById($id);
            if(!$cuisine) {
              throw new NotFoundException(__('Invalid post'));
            }
            $this->set('cuisine', $cuisine);
        }
    }
    
    public function add() {
        if($this->request->is('post')) {
            $this->Cuisine->create();
            $this->request->data['Cuisine']['entered_by'] = $this->Auth->user('id');
            if($this->Cuisine->save($this->request->data)) {
                $this->Session->setFlash(__('Cuisine added successfully.'));
                $this->redirect(array('action' => 'add'));
            }
            $this->Session->setFlash(__('Unable to add the cuisine.'));
        }
    }
    
    public function edit($id = null) {
        if(!$id) {
          throw new NotFoundException(__('Invalid post'));
        }

        $cuisine = $this->Cuisine->findById($id);
        if(!$cuisine) {
          throw new NotFoundException(__('Invalid post'));
        }

        if($this->request->is(array('post','put'))) {
          $this->Cuisine->id = $id;
          if($this->Cuisine->save($this->request->data)) {
            $this->Session->setFlash(__('The cuisine has been updated.'));
            return $this->redirect(array('action' => 'view'));
          }
          $this->Session->setFlash(__('Unable to update the restaurant.'));
        }

        if(!$this->request->data) {
          $this->request->data = $cuisine;
        }
    }
    
    public function delete($id = null) {
        if($this->request->is('get')) {
          throw new MethodNotAllowedException();
        }

        if($this->Cuisine->delete($id)) {
          $this->Session->setFlash(__('The cuisine with id: %s has been deleted', h($id)));
          if($this->Cuisine->find('count') == 0) {
              return $this->redirect(array('action' => 'index'));
          } else {
              return $this->redirect(array('action' => 'view'));
          }
        }
    }
}
