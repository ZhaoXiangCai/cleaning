<div>
<?php echo $this->Form->create('Team'); ?>
	<fieldset>
		<legend><?php echo __('Edit Team'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('location');
		echo $this->Form->input('postcode');
		echo $this->Form->input('mobile');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
