<?php
class Restaurant extends AppModel {
  public $validate = array(
    'name' => array('rule' => 'notEmpty')
  );
}
