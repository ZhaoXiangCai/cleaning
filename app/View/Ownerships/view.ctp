<div class="ownerships view">
<h2><?php echo __('Ownership'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ownership['Ownership']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($ownership['Ownership']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ownership'), array('action' => 'edit', $ownership['Ownership']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ownership'), array('action' => 'delete', $ownership['Ownership']['id']), array(), __('Are you sure you want to delete # %s?', $ownership['Ownership']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ownerships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ownership'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Clients'); ?></h3>
	<?php if (!empty($ownership['Client'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Vip'); ?></th>
		<th><?php echo __('Postcode'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Voucher Code'); ?></th>
		<th><?php echo __('Client Type Id'); ?></th>
		<th><?php echo __('Ownership Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ownership['Client'] as $client): ?>
		<tr>
			<td><?php echo $client['id']; ?></td>
			<td><?php echo $client['name']; ?></td>
			<td><?php echo $client['address']; ?></td>
			<td><?php echo $client['mobile']; ?></td>
			<td><?php echo $client['vip']; ?></td>
			<td><?php echo $client['postcode']; ?></td>
			<td><?php echo $client['email']; ?></td>
			<td><?php echo $client['phone']; ?></td>
			<td><?php echo $client['voucher_code']; ?></td>
			<td><?php echo $client['client_type_id']; ?></td>
			<td><?php echo $client['ownership_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clients', 'action' => 'view', $client['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clients', 'action' => 'edit', $client['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clients', 'action' => 'delete', $client['id']), array(), __('Are you sure you want to delete # %s?', $client['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
