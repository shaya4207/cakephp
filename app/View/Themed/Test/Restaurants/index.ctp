<h1>Blog posts</h1>
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
        <?php
            if($restaurantsCount > 0) {
                echo '<td>', $this->Html->link('View', array('action' => 'view')), '</td>';
            }
        ?>
        <td><?php echo $this->Html->link('Add', array('action' => 'add')); ?></td>
    </tr>
</table>