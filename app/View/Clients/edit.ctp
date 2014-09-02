<div>
<?php echo $this->Form->create('Client'); ?>
	<fieldset>
		<legend><?php echo __('Edit Client'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('mobile');
		echo $this->Form->input('vip');
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

