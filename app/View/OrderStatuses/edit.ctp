<div class="orderStatuses form">
<?php echo $this->Form->create('OrderStatus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Order Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('color');
		echo $this->Form->input('CleaningOrder');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrderStatus.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('OrderStatus.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Order Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cleaning Orders'), array('controller' => 'cleaning_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cleaning Order'), array('controller' => 'cleaning_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
