<div>
<?php echo $this->Form->create('CleaningOrder'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cleaning Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('appointment_time_from');
		echo $this->Form->input('appointment_time_to');
		echo $this->Form->input('ordered_time');
		echo $this->Form->input('address');
		echo $this->Form->input('order_price');
		echo $this->Form->input('discount');
		echo $this->Form->input('postcode_discount');
		echo $this->Form->input('parking_type');
        echo $this->Form->input('added_by',array('label'=>'Added by: ', 'type' => 'select', 'options' => $users));
        echo $this->Form->input('referrer',array('label'=>'Referrer: ', 'type' => 'select', 'options' => $users));
		echo $this->Form->input('team_id');
		echo $this->Form->input('client_id');
        // echo $this->Form->input('company_id',array('label'=>'Company: ', 'type' => 'select', 'options' => $companies,'empty'=>''));
		echo $this->Form->input('last_invoice_sent',array('label'=>'Referrer: ', 'type' => 'select', 'options' => $users));
        echo $this->Form->input('color_id');
		echo $this->Form->input('Service');
		echo $this->Form->input('OrderStatus');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
