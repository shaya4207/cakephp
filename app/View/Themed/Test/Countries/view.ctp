<?php 
if(!isset($country)) {?>
    <h3>Country List</h3>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($countries as $country): ?>
        <tr>
            <td><?php echo $country['Country']['name'];?></td>
            <td>
                <?php
                    echo $this->Html->link('Details', array('action' => 'view', $country['Country']['id'])), ' ';
                    echo $this->Html->link('Edit', array('action' => 'edit', $country['Country']['id'])), ' ';
                    echo $this->Form->postLink('Delete', array('action' => 'delete', $country['Country']['id']), array('confirm' => 'Are you sure?'));
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php
} else {
?>
    <h1><?php echo $country['Country']['name']; ?></h1>
    <strong>Abbreviation:</strong> <?php echo $country['Country']['abbreviation']; ?><br/>
    <?php
        if(!empty($user_id)) {
    ?>
            <strong>Entered By:</strong> <?php echo $user_id['User']['username']; ?><br/>
    <?php
        }
    echo $this->Html->link('Edit', array('action' => 'edit', $country['Country']['id'])), ' | ', $this->Form->postLink('Delete', array('action' => 'delete', $country['Country']['id']), array('confirm' => 'Are you sure?')); ?>
<?php
}