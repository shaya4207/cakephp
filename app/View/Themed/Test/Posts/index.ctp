<h1>Blog posts</h1>
<?php
  if($authUser) {
      echo 'Hi ', $this->Session->read('Auth.User.username'), '(', $this->Session->read('Auth.User.role'), ')', '! ', $this->Html->link('Log Out', array('controller' => 'users', 'action' => 'logout'));
  } else {
      echo $this->Html->link('Log In', array('controller' => 'users', 'action' => 'login'));
  }
  echo '<br/>', $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add'));
?>

<table>
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Action</th>
    <th>Created</th>
  </tr>
  <?php foreach ($posts as $post): ?>
  <tr>
    <td><?php echo $post['Post']['id']; ?></td>
    <td><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?></td>
    <td>
      <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $post['Post']['id']), array('confirm' => 'Are you sure?')); ?>
      <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
    </td>
    <td><?php echo $post['Post']['created']; ?></td>
  </tr>
  <?php endforeach; ?>
  <?php unset($post); ?>
</table>