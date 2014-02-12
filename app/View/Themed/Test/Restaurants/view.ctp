<?php 
if(!isset($restaurant)) {?>
    <h1>Restaurant List</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php foreach ($restaurants as $restaurant): ?>
        <tr>
            <td><?php echo $restaurant['Restaurant']['name'];?></td>
            <td><?php echo $restaurant['Restaurant']['address'], ' ',$restaurant['Restaurant']['city'], ' ', $restaurant['Restaurant']['state'], ',', $restaurant['Restaurant']['zip']; ?></td>
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
    <strong>Address:</strong> <?php echo $restaurant['Restaurant']['address'], ' ',$restaurant['Restaurant']['city'], ' ', $restaurant['Restaurant']['state'], ',', $restaurant['Restaurant']['zip']; ?><br/>
    <strong>Phone:</strong> <?php echo $restaurant['Restaurant']['phone']; ?><br/>
    <strong>Fax:</strong> <?php echo $restaurant['Restaurant']['fax']; ?><br/>
    <strong>Website:</strong> <?php echo $restaurant['Restaurant']['website']; ?><br/>
    <strong>Email:</strong> <?php echo $restaurant['Restaurant']['email']; ?><br/>
    <strong>Supervision:</strong> <?php echo $restaurant['Restaurant']['supervision']; ?><br/>
    <strong>Hours:</strong> <?php echo $restaurant['Restaurant']['hours']; ?><br/>
    <strong>Notes:</strong> <?php echo $restaurant['Restaurant']['notes']; ?> <br/>
    <strong>Cuisine:</strong> <?php echo $restaurant['Restaurant']['cuisine']; ?><br/>
    <strong>Attire:</strong> <?php echo $restaurant['Restaurant']['attire']; ?><br/>
    <strong>Entered By:</strong> <?php echo $restaurant['Restaurant']['entered_by']; ?><br/>
    <?php echo $this->Html->link('Edit', array('action' => 'edit', $restaurant['Restaurant']['id'])), ' | ', $this->Form->postLink('Delete', array('action' => 'delete', $restaurant['Restaurant']['id']), array('confirm' => 'Are you sure?')); ?>
<?php
}