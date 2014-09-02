
	<h2><?php echo __('Clients'); ?></h2>
	<ul class="list-inline">
        <li><?php echo $this->Html->link(__('New Client'), array('action' => 'add'),array('class'=>'btn btn-primary')); ?></li>
        <li><?php echo $this->Html->link(__('New Client Type'), array('controller' => 'client_types', 'action' => 'add'),array('class'=>'btn btn-primary')); ?> </li>
        <li><?php echo $this -> Html -> link(__('List Client Types'), array('controller' => 'client_types', 'action' => 'index'),array('class'=>'btn btn-primary')); ?> </li>
        <li><?php echo $this->Html->link(__('New Ownership'), array('controller' => 'ownerships', 'action' => 'add'),array('class'=>'btn btn-primary')); ?> </li>
        <li><?php echo $this->Html->link(__('List Ownership'), array('controller' => 'ownerships', 'action' => 'index'),array('class'=>'btn btn-primary')); ?> </li>
    </ul>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('vip'); ?></th>
			<th><?php echo $this->Paginator->sort('postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('voucher_code'); ?></th>
			<th><?php echo $this->Paginator->sort('client_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ownership_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($clients as $client): ?>
	<tr>
		<td><?php echo h($client['Client']['id']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['name']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['address']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['vip']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['postcode']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['email']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['phone']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['voucher_code']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($client['ClientType']['name'], array('controller' => 'client_types', 'action' => 'view', $client['ClientType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($client['Ownership']['name'], array('controller' => 'ownerships', 'action' => 'view', $client['Ownership']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $client['Client']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $client['Client']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $client['Client']['id']), array(), __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>


