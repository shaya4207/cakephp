<h1>Add State</h1>

<?php
  echo $this->Form->create('State');
  $this->Form->inputDefaults(array('label' => false, 'class' => 'input'));
?>
<table>
  <tr>
    <td align="left"><label class="input" for="name">State Name</label></td>
    <td align="left"><?php echo $this->Form->input('name', array('id' => 'name')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="abbreviation">State Abbreviation</label></td>
    <td align="left"><?php echo $this->Form->input('abbreviation', array('id' => 'abbreviation')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="country">Country</label></td>
    <td align="left"><?php echo $this->Form->input('country', array('id' => 'country', 'empty' => 'Select One')); ?></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $this->Form->end('Save State'); ?></td>
  </tr>
</table>