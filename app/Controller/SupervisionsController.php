<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP SupervisionController
 * @author skrauss
 */
class SupervisionsController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny();
    }

    public function index(){

    }
    
    public function view($id = null) {
        $this->loadModel('User');
        $userid = $this->Supervision->find('first', array('fields' => array('entered_by')));
        if(is_null($id)) {
            $this->set('supervisions', $this->Supervision->find('all'));
        } else {
            $this->set('supervision', $this->Supervision->find('all'));
            $this->set('user_id', $this->User->find('first', array('conditions' => array('id' => $userid['Supervision']['entered_by']))));
            $supervision = $this->Supervision->findById($id);
            if(!$supervision) {
              throw new NotFoundException(__('Invalid post'));
            }
            $this->set('supervision', $supervision);
        }
    }
    
    public function add() {
        if($this->request->is('post')) {
            $this->Supervision->create();
            $this->request->data['Supervision']['entered_by'] = $this->Auth->user('id');
            if($this->Supervision->save($this->request->data)) {
                $this->Session->setFlash(__('Supervision added successfully.'));
                $this->redirect(array('action' => 'add'));
            }
            $this->Session->setFlash(__('Unable to add the supervision.'));
        }
    }
    
    public function edit($id = null) {
        if(!$id) {
          throw new NotFoundException(__('Invalid post'));
        }

        $supervision = $this->Supervision->findById($id);
        if(!$cuisine) {
          throw new NotFoundException(__('Invalid post'));
        }

        if($this->request->is(array('post','put'))) {
          $this->Supervision->id = $id;
          if($this->Supervision->save($this->request->data)) {
            $this->Session->setFlash(__('The supervision has been updated.'));
            return $this->redirect(array('action' => 'view'));
          }
          $this->Session->setFlash(__('Unable to update the supervision.'));
        }

        if(!$this->request->data) {
          $this->request->data = $supervision;
        }
    }
    
    public function delete($id = null) {
        if($this->request->is('get')) {
          throw new MethodNotAllowedException();
        }

        if($this->Supervision->delete($id)) {
          $this->Session->setFlash(__('The supervision with id: %s has been deleted', h($id)));
          if($this->Supervision->find('count') == 0) {
              return $this->redirect(array('action' => 'index'));
          } else {
              return $this->redirect(array('action' => 'view'));
          }
        }
    }
}
