<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

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

}
