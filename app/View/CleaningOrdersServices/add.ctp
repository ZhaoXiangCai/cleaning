<div class="cleaningOrdersServices form">
<?php echo $this->Form->create('CleaningOrdersService'); ?>
	<fieldset>
		<legend><?php echo __('Add Cleaning Orders Service'); ?></legend>
	<?php
		echo $this->Form->input('cleaning_order_id');
		echo $this->Form->input('service_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cleaning Orders Services'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cleaning Orders'), array('controller' => 'cleaning_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cleaning Order'), array('controller' => 'cleaning_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
	</ul>
</div>
