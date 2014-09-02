<h3>Summary of last 7 days:</h3>
<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th>Appointment Time</th>
			<th>Total price</th>
			<th>Client Address</th>
			<th>Commission Rate</th>
			<?php if(AuthComponent::user('role_id')==1){ ?>
			    <th>User</th>
			    <th class="actions"><?php echo "Actions"; ?></th>
			<?php } ?>
		</tr>
	</thead>
	<tbody>
		<?php 
foreach ($orders as $order):
		?>
		<tr>
			<td><?php echo h($order['cleaning_orders']['appointment_time_from']); ?></td>
			<td><?php echo h($order['cleaning_orders']['order_price']); ?></td>
			<td><?php echo h($order['clients']['address']); ?></td>
			<td><?php echo h($order['commissions']['rate']); ?></td>
            <?php if(AuthComponent::user('role_id')==1){ ?>
                <td><?php echo h($order['users']['username']); ?></td>
                <td class="actions">
            <?php echo $this -> Html -> link(__('View'), array('controller'=>'commissions','action' => 'view', $order['commissions']['id'])); ?>
            <?php echo $this -> Html -> link(__('Edit'), array('controller'=>'commissions','action' => 'edit', $order['commissions']['id'])); ?>
            <?php echo $this -> Form -> postLink(__('Delete'), array('controller'=>'commissions','action' => 'delete', $order['commissions']['id']), array(), __('Are you sure you want to delete # %s?', $order['commissions']['id'])); ?>
        </td>
            <?php } ?>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>