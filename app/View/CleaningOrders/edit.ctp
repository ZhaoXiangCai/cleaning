<div class="cleaningOrders form">
<?php echo $this->Form->create('CleaningOrder'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cleaning Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('appointment_time_from');
		echo $this->Form->input('appointment_time_to');
		echo $this->Form->input('ordered_time');
		echo $this->Form->input('booked_time');
		echo $this->Form->input('order_price');
		echo $this->Form->input('discount');
		echo $this->Form->input('postcode_discount');
		echo $this->Form->input('up_sale');
		echo $this->Form->input('parking_type');
		echo $this->Form->input('added_by');
		echo $this->Form->input('team_id');
		echo $this->Form->input('client_id');
		echo $this->Form->input('company_id');
		echo $this->Form->input('last_invoice_sent');
		echo $this->Form->input('referrer');
		echo $this->Form->input('Service');
		echo $this->Form->input('OrderStatus');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CleaningOrder.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('CleaningOrder.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cleaning Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
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
