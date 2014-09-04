<div>
<?php echo $this->Form->create('CleaningOrder'); ?>
	<fieldset>
		<legend><?php echo __('Add Cleaning Order'); ?></legend>
	<?php
		echo $this->Form->input('appointment_time_from');
		echo $this->Form->input('appointment_time_to');
		echo $this->Form->input('ordered_time');
        if(!isset($addressesClient[0]['clients']['address'])){
            echo $this->Form->input('address');
        }else{
            echo $this->Form->input('address',array('default' => $addressesClient[0]['clients']['address']));       
        }
		echo $this->Form->input('order_price',array('default' => '0.00'));
		echo $this->Form->input('discount',array('default' => '0.00'));
		//echo $this->Form->input('postcode_discount');
		echo $this->Form->input('parking_type',array('default' => 'Free Parking'));
		echo $this->Form->input('added_by',array('label'=>'Added by: ', 'type' => 'select', 'options' => $users));
        echo $this->Form->input('referrer',array('label'=>'Referrer: ', 'type' => 'select', 'options' => $users));
		echo $this->Form->input('team_id');
		echo $this->Form->input('client_id',array('label'=>'Client: ', 'type' => 'select', 'options' => $clients));
		// echo $this->Form->input('company_id',array('label'=>'Company: ', 'type' => 'select', 'options' => $companies,'empty'=>''));
		#echo $this->Form->input('last_invoice_sent',array('label'=>'Added_by: ', 'type' => 'select', 'options' => $users));
		echo $this->Form->input('color_id');
		echo $this->Form->input('Service');
		echo $this->Form->input('OrderStatus');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div><!-- 
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

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
</div> -->