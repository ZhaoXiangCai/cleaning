<div class="clients form">
<?php echo $this->Form->create('Client'); ?>
	<fieldset>
		<legend><?php echo __('Add Client'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('mobile');
		echo $this->Form->input('vip',array('label'=>'VIP(Yes/No)','default'=>'No'));
		echo $this->Form->input('postcode');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('voucher_code');
		echo $this->Form->input('client_type_id');
		echo $this->Form->input('ownership_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Client Types'), array('controller' => 'client_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Type'), array('controller' => 'client_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ownerships'), array('controller' => 'ownerships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ownership'), array('controller' => 'ownerships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cleaning Orders'), array('controller' => 'cleaning_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cleaning Order'), array('controller' => 'cleaning_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
