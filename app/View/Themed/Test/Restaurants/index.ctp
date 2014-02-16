<h1>Restaurant Admin Links</h1>
<?php
  if($authUser) {
      echo 'Hi ', $this->Session->read('Auth.User.username'), '(', $this->Session->read('Auth.User.role'), ')', '! ', $this->Html->link('Log Out', array('controller' => 'users', 'action' => 'logout'));
  } else {
      echo $this->Html->link('Log In', array('controller' => 'users', 'action' => 'login'));
  }
?>
<table>
    <tr>
        <th>Restaurants (<?php echo $restaurantsCount; ?>)</th>
        <td><?php echo ($restaurantsCount > 0) ? $this->Html->link('View', array('action' => 'view')) : '&nbsp;';?></td>
        <td><?php echo $this->Html->link('Add', array('action' => 'add')); ?></td>
    </tr>
    <tr>
        <th>Cuisine (<?php echo $cuisineCount; ?>)</th>
        <td><?php echo ($cuisineCount > 0) ? $this->Html->link('View', array('controller' => 'cuisines', 'action' => 'view')) : '&nbsp;';?></td>
        <td><?php echo $this->Html->link('Add', array('controller' => 'cuisines', 'action' => 'add')); ?></td>
    </tr>
    <tr>
        <th>Supervision (<?php echo $supervisionCount; ?>)</th>
        <td><?php echo ($supervisionCount > 0) ? $this->Html->link('View', array('controller' => 'supervisions', 'action' => 'view')) : '&nbsp;';?></td>
        <td><?php echo $this->Html->link('Add', array('controller' => 'supervisions', 'action' => 'add')); ?></td>
    </tr>
    <tr>
        <th>States (<?php echo $statesCount; ?>)</th>
        <td><?php echo ($statesCount > 0) ? $this->Html->link('View', array('controller' => 'states', 'action' => 'view')) : '&nbsp;';?></td>
        <td><?php echo $this->Html->link('Add', array('controller' => 'states', 'action' => 'add')); ?></td>
    </tr>
    <tr>
        <th>Countries (<?php echo $countriesCount; ?>)</th>
        <td><?php echo ($countriesCount > 0) ? $this->Html->link('View', array('controller' => 'countries', 'action' => 'view')) : '&nbsp;';?></td>
        <td><?php echo $this->Html->link('Add', array('controller' => 'countries', 'action' => 'add')); ?></td>
    </tr>
</table>