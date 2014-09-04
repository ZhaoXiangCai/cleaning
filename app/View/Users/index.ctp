	<h2><?php echo __('Users'); ?></h2>
	   <ul class="list-inline">
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add'),array('class'=>'btn btn-primary')); ?></li>
        <li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index'),array('class'=>'btn btn-primary')); ?> </li>
        <li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add'),array('class'=>'btn btn-primary')); ?> </li>
    </ul>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('role_id'); ?></th>
			<th><?php echo $this->Paginator->sort('team_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['address']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['postcode']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Role']['name'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
		</td>
		<td>
            <?php echo $this->Html->link($user['Team']['name'], array('controller' => 'teams', 'action' => 'view', $user['Team']['id'])); ?>
        </td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Commission'), array('controller'=>'commissions','action' => 'usercommission', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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

