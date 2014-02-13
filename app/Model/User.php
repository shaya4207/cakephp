<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author skrauss
 */
class User extends AppModel {
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
        'password2' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'rule' => array('equalTo', 'password'),
                'message' => 'Passwords don\'t match'
            )
        ),
        'email' => array(
            'email',
            'required' => array(
                'rule' => array('notEmpty')
            )
        )
//        'role' => array(
//            'valid' => array(
//                'rule' => array('inList', array('admin', 'author')),
//                'message' => 'Please enter a valid role',
//                'allowEmpty' => false
//            )
//        )
    );
    
    public function beforeSave($options = array()) {
        if(isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }
    
    function equalTo($check, $field) {
        $fname = '';
        foreach($check as $key => $value) {
          $fname = $key;
          break;
        }
        return $this->data[$this->name][$field] === $this->data[$this->name][$fname];
    }
}
