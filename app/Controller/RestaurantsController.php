<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP restaurantsController
 * @author Shykee
 */
class RestaurantsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
  
    public function index() {
        $this->set('authUser', $this->Auth->user());
        $this->set('restaurantsCount', $this->Restaurant->find('count'));
    }
    
    public function view($id = null) {
        if(is_null($id)) {
            $this->set('restaurants', $this->Restaurant->find('all'));
            $this->set('restaurantsCount', $this->Restaurant->find('count'));
        } else {
            $restaurant = $this->Restaurant->findById($id);
            if(!$restaurant) {
              throw new NotFoundException(__('Invalid post'));
            }
            $this->set('restaurant', $restaurant);
        }
    }
    
    public function add() {
        if($this->request->is('post')) {
            $this->Restaurant->create();
            $this->request->data['Restaurant']['entered_by'] = $this->Auth->user('id');
            if($this->Restaurant->save($this->request->data)) {
                $this->Session->setFlash(__('Restaurant added successfully.'));
                $this->redirect(array('action' => 'add'));
            }
            $this->Session->setFlash(__('Unable to add the restaurant.'));
        }
    }
    
    public function edit($id = null) {
        if(!$id) {
          throw new NotFoundException(__('Invalid post'));
        }

        $restaurant = $this->Restaurant->findById($id);
        if(!$restaurant) {
          throw new NotFoundException(__('Invalid post'));
        }

        if($this->request->is(array('post','put'))) {
          $this->Restaurant->id = $id;
          if($this->Restaurant->save($this->request->data)) {
            $this->Session->setFlash(__('The restaurant has been updated.'));
            return $this->redirect(array('action' => 'view'));
          }
          $this->Session->setFlash(__('Unable to update the restaurant.'));
        }

        if(!$this->request->data) {
          $this->request->data = $restaurant;
        }
    }
    
    public function delete($id = null) {
        if($this->request->is('get')) {
          throw new MethodNotAllowedException();
        }

        if($this->Restaurant->delete($id)) {
          $this->Session->setFlash(__('The restaurant with id: %s has been deleted', h($id)));
          if($this->Restaurant->find('count') == 0) {
              return $this->redirect(array('action' => 'index'));
          } else {
              return $this->redirect(array('action' => 'view'));
          }
        }
    }

}
