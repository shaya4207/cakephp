<?php
class Restaurant extends AppModel {
  public $validate = array(
    'name' => array('rule' => 'notEmpty'),
    'address' => array('rule' => 'notEmpty'),
    'city' => array('rule' => 'notEmpty'),
    'state' => array('rule' => 'notEmpty'),
    'zip' => array('rule' => 'notEmpty'),
    'supervision' => array('rule' => 'notEmpty')
  );
}