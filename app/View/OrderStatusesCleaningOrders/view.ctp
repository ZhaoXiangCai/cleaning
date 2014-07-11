<div class="orderStatusesCleaningOrders view">
<h2><?php echo __('Order Statuses Cleaning Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orderStatusesCleaningOrder['OrderStatusesCleaningOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderStatusesCleaningOrder['OrderStatus']['name'], array('controller' => 'order_statuses', 'action' => 'view', $orderStatusesCleaningOrder['OrderStatus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cleaning Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderStatusesCleaningOrder['CleaningOrder']['id'], array('controller' => 'cleaning_orders', 'action' => 'view', $orderStatusesCleaningOrder['CleaningOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Updated'); ?></dt>
		<dd>
			<?php echo h($orderStatusesCleaningOrder['OrderStatusesCleaningOrder']['time_updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order Statuses Cleaning Order'), array('action' => 'edit', $orderStatusesCleaningOrder['OrderStatusesCleaningOrder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order Statuses Cleaning Order'), array('action' => 'delete', $orderStatusesCleaningOrder['OrderStatusesCleaningOrder']['id']), array(), __('Are you sure you want to delete # %s?', $orderStatusesCleaningOrder['OrderStatusesCleaningOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Statuses Cleaning Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Statuses Cleaning Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Statuses'), array('controller' => 'order_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Status'), array('controller' => 'order_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cleaning Orders'), array('controller' => 'cleaning_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cleaning Order'), array('controller' => 'cleaning_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
