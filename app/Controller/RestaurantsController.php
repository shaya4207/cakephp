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
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny();
    }
  
    public function index() {
        $this->loadModel('State');
        $this->loadModel('Cuisine');
        $this->loadModel('Supervision');
        $this->loadModel('Country');
        $this->set('authUser', $this->Auth->user());
        $this->set('restaurantsCount', $this->Restaurant->find('count'));
        $this->set('cuisineCount', $this->Cuisine->find('count'));
        $this->set('supervisionCount', $this->Supervision->find('count'));
        $this->set('statesCount', $this->State->find('count'));
        $this->set('countriesCount', $this->Country->find('count'));
    }
    
    public function view($id = null) {
        $this->loadModel('State');
        $this->loadModel('Cuisine');
        $this->loadModel('Supervision');
        $this->loadModel('User');
        $statid = $this->Restaurant->find('first', array('fields' => array('state')));
        $supervisionid = $this->Restaurant->find('first', array('fields' => array('supervision')));
        $userid = $this->Restaurant->find('first', array('fields' => array('entered_by')));
        $this->set('state', $this->State->find('first', array('conditions' => array('id' => $statid['Restaurant']['state']))));
        if(is_null($id)) {
            $this->set('restaurants', $this->Restaurant->find('all'));
            $this->set('restaurantsCount', $this->Restaurant->find('count'));
        } else {
            $this->set('cuisine', $this->Cuisine->find('all'));
            $this->set('supervision', $this->Supervision->find('first', array('conditions' => array('id' => $supervisionid['Restaurant']['supervision']))));
            $this->set('user_id', $this->User->find('first', array('conditions' => array('id' => $userid['Restaurant']['entered_by']))));
            $restaurant = $this->Restaurant->findById($id);
            if(!$restaurant) {
              throw new NotFoundException(__('Invalid post'));
            }
            $this->set('restaurant', $restaurant);
        }
    }
    
    public function add() {
        $this->loadModel('State');
        $this->loadModel('Cuisine');
        $this->loadModel('Supervision');
        $this->set('states', $this->State->find('list'));
        $this->set('cuisines', $this->Cuisine->find('list'));
        $this->set('supervisions', $this->Supervision->find('list'));
        if($this->request->is('post')) {
            if(is_array($this->request->data['Restaurant']['cuisine'])) {
                $this->request->data['Restaurant']['cuisine'] = implode(',', $this->request->data['Restaurant']['cuisine']);
            }
            $this->Restaurant->create();
            $this->request->data['Restaurant']['entered_by'] = $this->Auth->user('id');
            if($this->Restaurant->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('Restaurant added successfully.'));
                $this->redirect(array('action' => 'add'));
            }
            $this->Session->setFlash(__('Unable to add the restaurant.'));
        }
    }
    
    public function edit($id = null) {
        $this->loadModel('State');
        $this->loadModel('Cuisine');
        $this->loadModel('Supervision');
        $this->set('states', $this->State->find('list'));
        $this->set('cuisines', $this->Cuisine->find('list'));
        $this->set('supervisions', $this->Supervision->find('list'));
        if(!$id) {
          throw new NotFoundException(__('Invalid post'));
        }

        $restaurant = $this->Restaurant->findById($id);
        if(!$restaurant) {
          throw new NotFoundException(__('Invalid post'));
        }

        if($this->request->is(array('post','put'))) {
          if(is_array($this->request->data['Restaurant']['cuisine'])) {
              $this->request->data['Restaurant']['cuisine'] = implode(',', $this->request->data['Restaurant']['cuisine']);
          }
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
