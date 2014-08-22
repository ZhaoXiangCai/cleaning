<div class="commissions view">
<h2><?php echo __('Commission'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($commission['Commission']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($commission['User']['name'], array('controller' => 'users', 'action' => 'view', $commission['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cleaning Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($commission['CleaningOrder']['id'], array('controller' => 'cleaning_orders', 'action' => 'view', $commission['CleaningOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($commission['Commission']['rate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Commission'), array('action' => 'edit', $commission['Commission']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Commission'), array('action' => 'delete', $commission['Commission']['id']), array(), __('Are you sure you want to delete # %s?', $commission['Commission']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Commissions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Commission'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cleaning Orders'), array('controller' => 'cleaning_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cleaning Order'), array('controller' => 'cleaning_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
