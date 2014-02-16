<h1>Edit Supervision</h1>

<?php
  echo $this->Form->create('Supervision');
  echo $this->Form->input('id', array('type' => 'hidden'));
  $this->Form->inputDefaults(array('label' => false, 'class' => 'input'));
?>
<table>
  <tr>
    <td align="left"><label class="input" for="name">Supervision Name</label></td>
    <td align="left"><?php echo $this->Form->input('name', array('id' => 'name')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="name_long">Supervision Name Full</label></td>
    <td align="left"><?php echo $this->Form->input('name_long', array('id' => 'name_long')); ?></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $this->Form->end('Update Supervision'); ?></td>
  </tr>
</table>