<h1>Edit Cuisine</h1>

<?php
  echo $this->Form->create('Cuisine');
  echo $this->Form->input('id', array('type' => 'hidden'));
  $this->Form->inputDefaults(array('label' => false, 'class' => 'input'));
?>
<table>
  <tr>
    <td align="left"><label class="input" for="name">Cuisine Name</label></td>
    <td align="left"><?php echo $this->Form->input('name', array('id' => 'name')); ?></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $this->Form->end('Update Cuisine'); ?></td>
  </tr>
</table>