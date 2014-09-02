<div>
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('name');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		echo $this->Form->input('mobile');
		echo $this->Form->input('address');
		echo $this->Form->input('postcode');
		echo $this->Form->input('role_id');
        echo $this->Form->input('team_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

