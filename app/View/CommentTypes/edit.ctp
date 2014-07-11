<div class="commentTypes form">
<?php echo $this->Form->create('CommentType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Comment Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('color');
		echo $this->Form->input('category');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CommentType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('CommentType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Comment Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
