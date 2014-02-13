<h3>User Login</h3>

<?php echo $this->Html->link('Register', array('action' => 'add')); ?>

<?php
  echo $this->Form->create('User');
  $this->Form->inputDefaults(array('label' => false, 'class' => 'input'));
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
    <td colspan="2"><?php echo $this->Form->end('Login'); ?></td>
  </tr>
</table>