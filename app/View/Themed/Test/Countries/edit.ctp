<h1>Edit Country</h1>

<?php
  echo $this->Form->create('Country');
  echo $this->Form->input('id', array('type' => 'hidden'));
  $this->Form->inputDefaults(array('label' => false, 'class' => 'input'));
?>
<table>
  <tr>
    <td align="left"><label class="input" for="name">Country Name</label></td>
    <td align="left"><?php echo $this->Form->input('name', array('id' => 'name')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="abbreviation">Country Abbreviation</label></td>
    <td align="left"><?php echo $this->Form->input('abbreviation', array('id' => 'abbreviation')); ?></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $this->Form->end('Update Country'); ?></td>
  </tr>
</table>