<h1>Edit Restaurant</h1>

<?php
  echo $this->Form->create('Restaurant');
  echo $this->Form->input('id', array('type' => 'hidden'));
  $this->Form->inputDefaults(array('label' => false, 'class' => 'input'));
?>
<table>
  <tr>
    <td align="left"><label class="input" for="name">Name</label></td>
    <td align="left"><?php echo $this->Form->input('name', array('id' => 'name')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="address">Address</label></td>
    <td align="left"><?php echo $this->Form->input('address', array('id' => 'address')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="city">City</label></td>
    <td align="left"><?php echo $this->Form->input('city', array('id' => 'city')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="state">State</label></td>
    <td align="left"><?php echo $this->Form->input('state', array('id' => 'state')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="zip">Zip</label></td>
    <td align="left"><?php echo $this->Form->input('zip', array('id' => 'zip')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="phone">Phone</label></td>
    <td align="left"><?php echo $this->Form->input('phone', array('id' => 'phone')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="fax">Fax</label></td>
    <td align="left"><?php echo $this->Form->input('fax', array('id' => 'fax')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="website">Website</label></td>
    <td align="left"><?php echo $this->Form->input('website', array('id' => 'website')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="email">Email</label></td>
    <td align="left"><?php echo $this->Form->input('email', array('id' => 'email')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="supervision">Supervision</label></td>
    <td align="left"><?php echo $this->Form->input('supervision', array('id' => 'supervision')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="hours">Hours</label></td>
    <td align="left"><?php echo $this->Form->input('hours', array('id' => 'hours')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="notes">Notes</label></td>
    <td align="left"><?php echo $this->Form->input('notes', array('id' => 'notes', 'type' => 'textarea')); ?></td>
  </tr>
  <tr>
    <td align="left"><label class="input" for="cuisine">Cuisine</label></td>
    <td align="left"><?php echo $this->Form->input('cuisine', array('id' => 'cuisine', 'multiple' => 'checkbox', 'selected' => explode(',',$this->Form->data['Restaurant']['cuisine']))); ?></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $this->Form->end('Update Restaurant'); ?></td>
  </tr>
</table>