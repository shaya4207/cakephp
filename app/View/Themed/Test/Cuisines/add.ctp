<h1>Add Cuisine</h1>

<?php
  echo $this->Form->create('Cuisine');
  $this->Form->inputDefaults(array('label' => false, 'class' => 'input'));
?>
<table>
  <tr>
    <td align="left"><label class="input" for="name">Name</label></td>
    <td align="left"><?php echo $this->Form->input('name', array('id' => 'name')); ?></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $this->Form->end('Save Cuisine'); ?></td>
  </tr>
</table>