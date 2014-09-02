<div>
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

