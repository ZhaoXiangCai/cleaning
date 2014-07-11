<div class="services view">
<h2><?php echo __('Service'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($service['Service']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($service['Service']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Service'), array('action' => 'edit', $service['Service']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Service'), array('action' => 'delete', $service['Service']['id']), array(), __('Are you sure you want to delete # %s?', $service['Service']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cleaning Orders'), array('controller' => 'cleaning_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cleaning Order'), array('controller' => 'cleaning_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cleaning Orders'); ?></h3>
	<?php if (!empty($service['CleaningOrder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Appointment Time From'); ?></th>
		<th><?php echo __('Appointment Time To'); ?></th>
		<th><?php echo __('Ordered Time'); ?></th>
		<th><?php echo __('Booked Time'); ?></th>
		<th><?php echo __('Order Price'); ?></th>
		<th><?php echo __('Discount'); ?></th>
		<th><?php echo __('Postcode Discount'); ?></th>
		<th><?php echo __('Up Sale'); ?></th>
		<th><?php echo __('Parking Type'); ?></th>
		<th><?php echo __('Added By'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Last Invoice Sent'); ?></th>
		<th><?php echo __('Referrer Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($service['CleaningOrder'] as $cleaningOrder): ?>
		<tr>
			<td><?php echo $cleaningOrder['id']; ?></td>
			<td><?php echo $cleaningOrder['appointment_time_from']; ?></td>
			<td><?php echo $cleaningOrder['appointment_time_to']; ?></td>
			<td><?php echo $cleaningOrder['ordered_time']; ?></td>
			<td><?php echo $cleaningOrder['booked_time']; ?></td>
			<td><?php echo $cleaningOrder['order_price']; ?></td>
			<td><?php echo $cleaningOrder['discount']; ?></td>
			<td><?php echo $cleaningOrder['postcode_discount']; ?></td>
			<td><?php echo $cleaningOrder['up_sale']; ?></td>
			<td><?php echo $cleaningOrder['parking_type']; ?></td>
			<td><?php echo $cleaningOrder['added_by']; ?></td>
			<td><?php echo $cleaningOrder['team_id']; ?></td>
			<td><?php echo $cleaningOrder['client_id']; ?></td>
			<td><?php echo $cleaningOrder['company_id']; ?></td>
			<td><?php echo $cleaningOrder['last_invoice_sent']; ?></td>
			<td><?php echo $cleaningOrder['referrer_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cleaning_orders', 'action' => 'view', $cleaningOrder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cleaning_orders', 'action' => 'edit', $cleaningOrder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cleaning_orders', 'action' => 'delete', $cleaningOrder['id']), array(), __('Are you sure you want to delete # %s?', $cleaningOrder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cleaning Order'), array('controller' => 'cleaning_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
