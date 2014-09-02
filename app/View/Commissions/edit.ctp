<div>
<?php echo $this->Form->create('Commission'); ?>
	<fieldset>
		<legend><?php echo __('Edit Commission'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id',array('disabled' => 'disabled'));
		echo $this->Form->input('cleaning_order_id',array('disabled' => 'disabled'));
		echo $this->Form->input('rate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
