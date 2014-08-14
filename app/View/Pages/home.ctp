
<?php 
if (AuthComponent::user('role_id') != '3' ){
?>
<h3>You have <?php echo $numofteams; ?> cleaning team(s)</h3>
<h3>You have <?php echo $numofclients; ?> client(s)</h3>
<h3>You have <?php echo $numofunpaid; ?> unpaid order(s)</h3> make this a link
<h3>You have <?php echo $numofupcoming; ?> upcoming task(s)</h3> make this a link
<?php }
    else {
 ?>
    <h3>Summary of last 7 days:</h3>
    <table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
            <th>Appointment Time</th>
            <th>Total price</th>
            <th>Client Address</th>
            <th>Commision Rate</th>
    </tr>
    </thead>
    <tbody>
        <?php 
    foreach ($orders as $order): ?>
    <tr>
        <td><?php echo h($order['cleaning_orders']['appointment_time_from']); ?>&nbsp;</td>
        <td><?php echo h($order['cleaning_orders']['order_price']); ?>&nbsp;</td>
        <td><?php echo h($order['clients']['address']); ?>&nbsp;</td>
        <td><?php echo h($order['commisions']['rate']); ?>&nbsp;</td>
        
    </tr>
<?php endforeach; ?>
    </tbody>
    </table>
<?php } ?>
Total order price or price*commision rate?</br>
<?php echo $this -> Html -> link('Log out', array('controller' => 'users', 'action' => 'logout')); ?>
