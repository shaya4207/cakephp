<?php 
if(!isset($restaurant)) {?>
    <h3>Restaurant List</h3>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php foreach ($restaurants as $restaurant): ?>
        <tr>
            <td><?php echo $restaurant['Restaurant']['name'];?></td>
            <td><?php echo $restaurant['Restaurant']['address'], ' ',$restaurant['Restaurant']['city'], ' ', $state['State']['name'], ', ', $restaurant['Restaurant']['zip']; ?></td>
            <td>
                <?php
                    echo $this->Html->link('Details', array('action' => 'view', $restaurant['Restaurant']['id'])), ' ';
                    echo $this->Html->link('Edit', array('action' => 'edit', $restaurant['Restaurant']['id'])), ' ';
                    echo $this->Form->postLink('Delete', array('action' => 'delete', $restaurant['Restaurant']['id']), array('confirm' => 'Are you sure?'));
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php
} else {
?>
    <h1><?php echo $restaurant['Restaurant']['name']; ?></h1>
    <strong>Address:</strong> <?php echo $restaurant['Restaurant']['address'], ' ',$restaurant['Restaurant']['city'], ' ', $state['State']['name'], ', ', $restaurant['Restaurant']['zip']; ?><br/>
    <strong>Phone:</strong> <?php echo $restaurant['Restaurant']['phone']; ?><br/>
    <strong>Fax:</strong> <?php echo $restaurant['Restaurant']['fax']; ?><br/>
    <strong>Website:</strong> <?php echo $restaurant['Restaurant']['website']; ?><br/>
    <strong>Email:</strong> <?php echo $restaurant['Restaurant']['email']; ?><br/>
    <strong>Supervision:</strong> <?php echo $supervision['Supervision']['name']; ?><br/>
    <strong>Hours:</strong> <?php echo $restaurant['Restaurant']['hours']; ?><br/>
    <strong>Notes:</strong> <?php echo $restaurant['Restaurant']['notes']; ?> <br/>
    <strong>Cuisine:</strong> <?php echo $restaurant['Restaurant']['cuisine']; ?><br/>
    <strong>Attire:</strong> <?php echo $restaurant['Restaurant']['attire']; ?><br/>
    <strong>Entered By:</strong> <?php echo $user_id['User']['username']; ?><br/>
    <?php echo $this->Html->link('Edit', array('action' => 'edit', $restaurant['Restaurant']['id'])), ' | ', $this->Form->postLink('Delete', array('action' => 'delete', $restaurant['Restaurant']['id']), array('confirm' => 'Are you sure?')); ?>
<?php
}