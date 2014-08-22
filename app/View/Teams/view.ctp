<div class="teams view">
<h2><?php echo __('Team'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($team['Team']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($team['Team']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($team['Team']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postcode'); ?></dt>
		<dd>
			<?php echo h($team['Team']['postcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($team['Team']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($team['Team']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Team'), array('action' => 'edit', $team['Team']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Team'), array('action' => 'delete', $team['Team']['id']), array(), __('Are you sure you want to delete # %s?', $team['Team']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cleaning Orders'), array('controller' => 'cleaning_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cleaning Order'), array('controller' => 'cleaning_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cleaning Orders'); ?></h3>
	<?php if (!empty($team['CleaningOrder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Appointment Time From'); ?></th>
		<th><?php echo __('Appointment Time To'); ?></th>
		<th><?php echo __('Ordered Time'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Order Price'); ?></th>
		<th><?php echo __('Discount'); ?></th>
		<th><?php echo __('Postcode Discount'); ?></th>
		<th><?php echo __('Parking Type'); ?></th>
		<th><?php echo __('Added By'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Last Invoice Sent'); ?></th>
		<th><?php echo __('Referrer'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($team['CleaningOrder'] as $cleaningOrder): ?>
		<tr>
			<td><?php echo $cleaningOrder['id']; ?></td>
			<td><?php echo $cleaningOrder['appointment_time_from']; ?></td>
			<td><?php echo $cleaningOrder['appointment_time_to']; ?></td>
			<td><?php echo $cleaningOrder['ordered_time']; ?></td>
			<td><?php echo $cleaningOrder['address']; ?></td>
			<td><?php echo $cleaningOrder['order_price']; ?></td>
			<td><?php echo $cleaningOrder['discount']; ?></td>
			<td><?php echo $cleaningOrder['postcode_discount']; ?></td>
			<td><?php echo $cleaningOrder['parking_type']; ?></td>
			<td><?php echo $cleaningOrder['added_by']; ?></td>
			<td><?php echo $cleaningOrder['team_id']; ?></td>
			<td><?php echo $cleaningOrder['client_id']; ?></td>
			<td><?php echo $cleaningOrder['company_id']; ?></td>
			<td><?php echo $cleaningOrder['last_invoice_sent']; ?></td>
			<td><?php echo $cleaningOrder['referrer']; ?></td>
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
