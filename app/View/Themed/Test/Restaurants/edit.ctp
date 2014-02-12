<h1>Add Restaurant</h1>

<?php
  echo $this->Form->create('Restaurant');
  echo $this->Form->input('name');
  echo $this->Form->input('address');
  echo $this->Form->input('city');
  echo $this->Form->input('state', array('option' => $states, 'empty' => 'Select One'));
  echo $this->Form->input('zip');
  echo $this->Form->input('phone');
  echo $this->Form->input('fax', array('type' => 'tel'));
  echo $this->Form->input('website');
  echo $this->Form->input('email');
  echo $this->Form->input('supervision');
  echo $this->Form->input('hours');
  echo $this->Form->input('notes', array('rows' => 3));
  echo $this->Form->input('cuisine');
  echo $this->Form->input('attire');
  echo $this->Form->input('id', array('type' => 'hidden'));
  echo $this->Form->end('Save Restaurant');
?>