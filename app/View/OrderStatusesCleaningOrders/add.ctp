<div class="orderStatusesCleaningOrders form">
<?php echo $this->Form->create('OrderStatusesCleaningOrder'); ?>
	<fieldset>
		<legend><?php echo __('Add Order Statuses Cleaning Order'); ?></legend>
	<?php
		echo $this->Form->input('order_status_id');
		echo $this->Form->input('cleaning_order_id');
		echo $this->Form->input('time_updated');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Order Statuses Cleaning Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Order Statuses'), array('controller' => 'order_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Status'), array('controller' => 'order_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cleaning Orders'), array('controller' => 'cleaning_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cleaning Order'), array('controller' => 'cleaning_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
