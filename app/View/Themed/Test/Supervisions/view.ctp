<?php 
if(!isset($supervision)) {?>
    <h3>Supervision List</h3>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($supervisions as $supervision): ?>
        <tr>
            <td><?php echo $supervision['Supervision']['name'];?></td>
            <td>
                <?php
                    echo $this->Html->link('Details', array('action' => 'view', $supervision['Supervision']['id'])), ' ';
                    echo $this->Html->link('Edit', array('action' => 'edit', $supervision['Supervision']['id'])), ' ';
                    echo $this->Form->postLink('Delete', array('action' => 'delete', $supervision['Supervision']['id']), array('confirm' => 'Are you sure?'));
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php
} else {
?>
    <h1><?php echo $supervision['Supervision']['name']; ?></h1>
    <strong>Logo:</strong> <?php echo $supervision['Supervision']['logo']; ?><br/>
    <strong>Name Full:</strong> <?php echo $supervision['Supervision']['name_long']; ?><br/>
    <strong>Entered By:</strong> <?php echo $user_id['User']['username']; ?><br/>
    <?php echo $this->Html->link('Edit', array('action' => 'edit', $supervision['Supervision']['id'])), ' | ', $this->Form->postLink('Delete', array('action' => 'delete', $supervision['Supervision']['id']), array('confirm' => 'Are you sure?')); ?>
<?php
}