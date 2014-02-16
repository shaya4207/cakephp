<?php 
if(!isset($cuisine)) {?>
    <h3>Cuisine List</h3>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($cuisines as $cuisine): ?>
        <tr>
            <td><?php echo $cuisine['Cuisine']['name'];?></td>
            <td>
                <?php
                    echo $this->Html->link('Details', array('action' => 'view', $cuisine['Cuisine']['id'])), ' ';
                    echo $this->Html->link('Edit', array('action' => 'edit', $cuisine['Cuisine']['id'])), ' ';
                    echo $this->Form->postLink('Delete', array('action' => 'delete', $cuisine['Cuisine']['id']), array('confirm' => 'Are you sure?'));
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php
} else {
?>
    <h1><?php echo $cuisine['Cuisine']['name']; ?></h1>
    <strong>Entered By:</strong> <?php echo $user_id['User']['username']; ?><br/>
    <?php echo $this->Html->link('Edit', array('action' => 'edit', $cuisine['Cuisine']['id'])), ' | ', $this->Form->postLink('Delete', array('action' => 'delete', $cuisine['Cuisine']['id']), array('confirm' => 'Are you sure?')); ?>
<?php
}