<div class="cleaningOrders index">
	<h2><?php echo __('Cleaning Orders'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('appointment_time_from'); ?></th>
			<th><?php echo $this->Paginator->sort('appointment_time_to'); ?></th>
			<th><?php echo $this->Paginator->sort('ordered_time'); ?></th>
			<th><?php echo $this->Paginator->sort('booked_time'); ?></th>
			<th><?php echo $this->Paginator->sort('order_price'); ?></th>
			<th><?php echo $this->Paginator->sort('discount'); ?></th>
			<th><?php echo $this->Paginator->sort('postcode_discount'); ?></th>
			<th><?php echo $this->Paginator->sort('parking_type'); ?></th>
			<th><?php echo $this->Paginator->sort('added_by'); ?></th>
			<th><?php echo $this->Paginator->sort('team_id'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th>
			<th><?php echo $this->Paginator->sort('last_invoice_sent'); ?></th>
			<th><?php echo $this->Paginator->sort('referrer'); ?></th>
			<th><?php echo $this->Paginator->sort('color_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cleaningOrders as $cleaningOrder): ?>
	<tr>
		<td><?php echo h($cleaningOrder['CleaningOrder']['id']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['appointment_time_from']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['appointment_time_to']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['ordered_time']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['booked_time']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['order_price']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['discount']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['postcode_discount']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['parking_type']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['added_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cleaningOrder['Team']['name'], array('controller' => 'teams', 'action' => 'view', $cleaningOrder['Team']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cleaningOrder['Client']['name'], array('controller' => 'clients', 'action' => 'view', $cleaningOrder['Client']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cleaningOrder['Company']['id'], array('controller' => 'companies', 'action' => 'view', $cleaningOrder['Company']['id'])); ?>
		</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['last_invoice_sent']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['referrer']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['color_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cleaningOrder['CleaningOrder']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cleaningOrder['CleaningOrder']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cleaningOrder['CleaningOrder']['id']), array(), __('Are you sure you want to delete # %s?', $cleaningOrder['CleaningOrder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Cleaning Order'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Colors'), array('controller' => 'colors', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Color'), array('controller' => 'colors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Statuses'), array('controller' => 'order_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Status'), array('controller' => 'order_statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
