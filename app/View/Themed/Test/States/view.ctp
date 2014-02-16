<?php 
if(!isset($state)) {?>
    <h3>State List</h3>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($states as $state): ?>
        <tr>
            <td><?php echo $state['State']['name'];?></td>
            <td>
                <?php
                    echo $this->Html->link('Details', array('action' => 'view', $state['State']['id'])), ' ';
                    echo $this->Html->link('Edit', array('action' => 'edit', $state['State']['id'])), ' ';
                    echo $this->Form->postLink('Delete', array('action' => 'delete', $state['State']['id']), array('confirm' => 'Are you sure?'));
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php
} else {
?>
    <h1><?php echo $state['State']['name']; ?></h1>
    <strong>Abbreviation:</strong> <?php echo $state['State']['abbreviation']; ?><br/>
    <strong>Country:</strong> <?php echo $country['Country']['abbreviation']; ?><br/>
    <strong>Entered By:</strong> <?php echo $user_id['User']['username']; ?><br/>
    <?php echo $this->Html->link('Edit', array('action' => 'edit', $state['State']['id'])), ' | ', $this->Form->postLink('Delete', array('action' => 'delete', $state['State']['id']), array('confirm' => 'Are you sure?')); ?>
<?php
}