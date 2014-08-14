<div class="cleaningOrders view">
<h2><?php echo __('Cleaning Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Appointment Time From'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['appointment_time_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Appointment Time To'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['appointment_time_to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordered Time'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['ordered_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Booked Time'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['booked_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Price'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['order_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['discount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postcode Discount'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['postcode_discount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parking Type'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['parking_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Added By'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['added_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this -> Html -> link($cleaningOrder['Team']['name'], array('controller' => 'teams', 'action' => 'view', $cleaningOrder['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this -> Html -> link($cleaningOrder['Client']['name'], array('controller' => 'clients', 'action' => 'view', $cleaningOrder['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this -> Html -> link($cleaningOrder['Company']['id'], array('controller' => 'companies', 'action' => 'view', $cleaningOrder['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Invoice Sent'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['last_invoice_sent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Referrer'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['referrer']); ?>
			&nbsp;
		</dd>
	</dl>
	</br>
	<div>
	    <h3>Uploaded Pictures:</br></h3>
	    <?php foreach ($pics as $pic) {
            echo $this->Html->image('./orders/'.$id.'/'.$pic);			
		} ?>
	</div>
	<div>
	    <h3>Upload New files:</br></h3>
	    <?php
            echo $this->Form->create('CleaningOrder', array('controller' => 'cleaning_orders', 'action' => 'addimage','enctype' => 'multipart/form-data','url' => array($id)));
            echo $this->Form->File('order_pic',array('label' => array('text' => 'Pictures'), 'type' => 'file'));
            echo $this -> Form -> end(__('Submit'));
	    ?>
	</div> 
	<div>
<?php echo $this -> Form -> create('Comment', array('controller' => 'comments', 'action' => 'add')); ?>
    <h3>New Comment:</br></h3>
    <?php
    echo $this -> Form -> input('content',array('type'=>'text'));
    date_default_timezone_set('Australia/Melbourne');
    echo $this -> Form -> input('user_id',array('label'=>'Added by: ', 'type' => 'select', 'options' => $users));
    echo $this -> Form -> input('comment_type_id');
    echo $this -> Form -> input('cleaning_order_id',array('default'=>$cleaningOrder['CleaningOrder']['id'],'type'=>'hidden'));
    
    // echo $this -> Form -> input('timestamp',array('type' => 'datetime','default'=> date(time()),'disabled' => 'disabled'));
    
    ?>
<?php echo $this -> Form -> end(__('Submit')); ?>
</div>
	<div>
	    <h3>Comments:</br></h3>
	    
	    <?php if (!empty($cleaningOrder['Comment'])): ?>
	    <ul>
	        <?php
        foreach ($comments as $comment){ ?>

            <p style="background-color:<?php echo $comment['CommentType']['color']; ?>">Added by:&nbsp;<?php echo $comment['User']['name'] . " at " . $comment['Comment']['created']; ?></br>
                <?php echo $comment['Comment']['content']; ?> </br>
                <?php echo "Type: " . $comment['CommentType']['name']; ?>
            </p>
            <p></p>

            <?php }; ?>
	        
	    </ul>
	    <?php endif; ?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this -> Html -> link(__('Edit Cleaning Order'), array('action' => 'edit', $cleaningOrder['CleaningOrder']['id'])); ?> </li>
		<li><?php echo $this -> Form -> postLink(__('Delete Cleaning Order'), array('action' => 'delete', $cleaningOrder['CleaningOrder']['id']), array(), __('Are you sure you want to delete # %s?', $cleaningOrder['CleaningOrder']['id'])); ?> </li>
		<li><?php echo $this -> Html -> link(__('List Cleaning Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('New Cleaning Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
		<li><?php echo $this -> Html -> link(__('List Order Statuses'), array('controller' => 'order_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this -> Html -> link(__('New Order Status'), array('controller' => 'order_statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Comments'); ?></h3>
	<?php if (!empty($cleaningOrder['Comment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Cleaning Order Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Comment Type Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cleaningOrder['Comment'] as $comment): ?>
		<tr>
			<td><?php echo $comment['id']; ?></td>
			<td><?php echo $comment['content']; ?></td>
			<td><?php echo $comment['created']; ?></td>
			<td><?php echo $comment['cleaning_order_id']; ?></td>
			<td><?php echo $comment['user_id']; ?></td>
			<td><?php echo $comment['comment_type_id']; ?></td>
			<td class="actions">
				<?php echo $this -> Html -> link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
				<?php echo $this -> Html -> link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
				<?php echo $this -> Form -> postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array(), __('Are you sure you want to delete # %s?', $comment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this -> Html -> link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Services'); ?></h3>
	<?php if (!empty($cleaningOrder['Service'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cleaningOrder['Service'] as $service): ?>
		<tr>
			<td><?php echo $service['id']; ?></td>
			<td><?php echo $service['name']; ?></td>
			<td class="actions">
				<?php echo $this -> Html -> link(__('View'), array('controller' => 'services', 'action' => 'view', $service['id'])); ?>
				<?php echo $this -> Html -> link(__('Edit'), array('controller' => 'services', 'action' => 'edit', $service['id'])); ?>
				<?php echo $this -> Form -> postLink(__('Delete'), array('controller' => 'services', 'action' => 'delete', $service['id']), array(), __('Are you sure you want to delete # %s?', $service['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this -> Html -> link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Order Statuses'); ?></h3>
	<?php if (!empty($cleaningOrder['OrderStatus'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cleaningOrder['OrderStatus'] as $orderStatus): ?>
		<tr>
			<td><?php echo $orderStatus['id']; ?></td>
			<td><?php echo $orderStatus['name']; ?></td>
			<td class="actions">
				<?php echo $this -> Html -> link(__('View'), array('controller' => 'order_statuses', 'action' => 'view', $orderStatus['id'])); ?>
				<?php echo $this -> Html -> link(__('Edit'), array('controller' => 'order_statuses', 'action' => 'edit', $orderStatus['id'])); ?>
				<?php echo $this -> Form -> postLink(__('Delete'), array('controller' => 'order_statuses', 'action' => 'delete', $orderStatus['id']), array(), __('Are you sure you want to delete # %s?', $orderStatus['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this -> Html -> link(__('New Order Status'), array('controller' => 'order_statuses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
