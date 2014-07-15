<div class="cleaningOrdersServices view">
<h2><?php echo __('Cleaning Orders Service'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cleaningOrdersService['CleaningOrdersService']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cleaning Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cleaningOrdersService['CleaningOrder']['id'], array('controller' => 'cleaning_orders', 'action' => 'view', $cleaningOrdersService['CleaningOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cleaningOrdersService['Service']['name'], array('controller' => 'services', 'action' => 'view', $cleaningOrdersService['Service']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cleaning Orders Service'), array('action' => 'edit', $cleaningOrdersService['CleaningOrdersService']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cleaning Orders Service'), array('action' => 'delete', $cleaningOrdersService['CleaningOrdersService']['id']), array(), __('Are you sure you want to delete # %s?', $cleaningOrdersService['CleaningOrdersService']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cleaning Orders Services'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cleaning Orders Service'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cleaning Orders'), array('controller' => 'cleaning_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cleaning Order'), array('controller' => 'cleaning_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
	</ul>
</div>
