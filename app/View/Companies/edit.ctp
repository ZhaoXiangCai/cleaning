<div>
<?php echo $this->Form->create('Company'); ?>
	<fieldset>
		<legend><?php echo __('Edit Company'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('brand_url');
		echo $this->Form->input('phone');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
