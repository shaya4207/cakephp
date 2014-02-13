<h3>New User Register</h3>

<?php
  echo $this->Form->create('User', array('autocomplete' => 'off'));
  $this->Form->inputDefaults(array('label' => false, 'class' => 'input'));
  echo $this->Form->hidden('role', array('value' => 'admin'));
?>

<table>
  <tr>
    <td align="left"><label class="input" for="name">Username</label></td>
    <td align="left"><?php echo $this->Form->input('username', array('id' => 'username')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="password">Password</label></td>
    <td align="left"><?php echo $this->Form->input('password', array('id' => 'password')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="password2">Retype Password</label></td>
    <td align="left"><?php echo $this->Form->input('password2', array('id' => 'password2', 'type' => 'password')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="email">Email</label></td>
    <td align="left"><?php echo $this->Form->input('email', array('id' => 'email')); ?></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $this->Form->end('Register'); ?></td>
  </tr>
</table>