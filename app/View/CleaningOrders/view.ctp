
    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cleaningOrder['CleaningOrder']['id']),array('class'=>'btn btn-primary')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cleaningOrder['CleaningOrder']['id']), array('class'=>'btn btn-danger'), __('Are you sure you want to delete # %s?', $cleaningOrder['CleaningOrder']['id'])); ?>

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
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['CleaningOrder']['address']); ?>
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
			<?php echo h($cleaningOrder['Added_by']['name']); ?>
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
			<?php echo $this -> Html -> link($cleaningOrder['Company']['brand_url'], array('controller' => 'companies', 'action' => 'view', $cleaningOrder['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Invoice Sent'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['Last_Invoice']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Referrer'); ?></dt>
		<dd>
			<?php echo h($cleaningOrder['Referrer']['name']); ?>
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
    // echo $this -> Form -> input('user_id',array('label'=>'Added by: ', 'type' => 'select', 'options' => $users));
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
	</br>

<div class="related">
<h3><?php echo __('Order Statuses'); ?></h3>
<?php if (!empty($cleaningOrder['OrderStatus'])): ?>
 <table cellpadding = "0" cellspacing = "0">
 <?php foreach ($cleaningOrder['OrderStatus'] as $orderStatus): ?>
 <tr>
 <td><?php echo $orderStatus['name']; ?></td>
 </tr>
 <?php endforeach; ?>
 </table>
<?php endif; ?>


</div>


<div class="related">
 <h3><?php echo __('Related Services'); ?></h3>
 <?php if (!empty($cleaningOrder['Service'])): ?>
 <table cellpadding = "0" cellspacing = "0">

 <?php foreach ($cleaningOrder['Service'] as $service): ?>
 <tr>
 <td><?php echo $service['name']; ?></td>

 </tr>
 <?php endforeach; ?>
 </table>
<?php endif; ?>
