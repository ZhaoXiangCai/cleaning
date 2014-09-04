	<h2><?php echo __('Cleaning Orders'); ?></h2>
	<?php if(AuthComponent::user('role_id')!=3){ ?>
    <ul class="list-inline">
        <li><?php echo $this -> Html -> link(__('New Cleaning Order'), array('action' => 'preadd'), array('class' => 'btn btn-primary')); ?></li>
        <!-- <li><?php echo $this -> Html -> link(__('List Companies'), array('controller' => 'companies', 'action' => 'index'),array('class'=>'btn btn-primary')); ?> </li>
        <li><?php echo $this -> Html -> link(__('New Company'), array('controller' => 'companies', 'action' => 'add'),array('class'=>'btn btn-primary')); ?> </li> -->
    </ul>
    <?php } ?>
	<table cellpadding="0" cellspacing="0" class="table">
	<thead>
	<tr>
			<th><?php echo $this -> Paginator -> sort('id'); ?></th>
			<th><?php echo $this -> Paginator -> sort('appointment_time_from'); ?></th>
			<th><?php echo $this -> Paginator -> sort('appointment_time_to'); ?></th>
			<th><?php echo $this -> Paginator -> sort('address'); ?></th>
			<th><?php echo $this -> Paginator -> sort('order_price'); ?></th>
			<th><?php echo $this -> Paginator -> sort('team_id'); ?></th>
			<th><?php echo $this -> Paginator -> sort('client_id'); ?></th>
			<!-- // <th><?php echo $this -> Paginator -> sort('company_id'); ?></th> -->			
			<th><?php echo $this -> Paginator -> sort('color_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cleaningOrders as $cleaningOrder): ?>
	<tr>
		<td><?php echo h($cleaningOrder['CleaningOrder']['id']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['appointment_time_from']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['appointment_time_to']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['address']); ?>&nbsp;</td>
		<td><?php echo h($cleaningOrder['CleaningOrder']['order_price']); ?>&nbsp;</td>
		<td>
			<?php echo $this -> Html -> link($cleaningOrder['Team']['name'], array('controller' => 'teams', 'action' => 'view', $cleaningOrder['Team']['id'])); ?>
		</td>
		<td>
			<?php echo $this -> Html -> link($cleaningOrder['Client']['name'], array('controller' => 'clients', 'action' => 'view', $cleaningOrder['Client']['id'])); ?>
		</td>
		<!-- <td>
			<?php echo $this -> Html -> link($cleaningOrder['Company']['id'], array('controller' => 'companies', 'action' => 'view', $cleaningOrder['Company']['id'])); ?>
		</td> -->
		<td><?php echo h($cleaningOrder['Color']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this -> Html -> link(__('View'), array('action' => 'view', $cleaningOrder['CleaningOrder']['id'])); ?>
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit', $cleaningOrder['CleaningOrder']['id'])); ?>
			<?php echo $this -> Html -> link(__('Commission'), array('controller'=>'commissions','action' => 'ordercommission', $cleaningOrder['CleaningOrder']['id'])); ?>
			<?php echo $this -> Form -> postLink(__('Delete'), array('action' => 'delete', $cleaningOrder['CleaningOrder']['id']), array(), __('Are you sure you want to delete # %s?', $cleaningOrder['CleaningOrder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
    echo $this -> Paginator -> counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));
	?>	</p>
	<div class="paging">
	<?php
    echo $this -> Paginator -> prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    echo $this -> Paginator -> numbers(array('separator' => ''));
    echo $this -> Paginator -> next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>


