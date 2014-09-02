
<?php 
if (AuthComponent::user('role_id') != '3' ){
?>
<h3>You have <?php echo $this->Html->link($numofteams,array('controller'=>'teams','action'=>'index')); ?> cleaning team(s)</h3>
<h3>You have <?php echo $this->Html->link($numofclients,array('controller'=>'clients','action'=>'index')); ?> client(s)</h3>
<h3>You have <?php echo $this->Html->link($numofunpaid,array('controller'=>'cleaningorders','action'=>'unpaid')); ?> unpaid order(s)</h3>
<h3>You have <?php echo $this->Html->link($numofupcoming,array('controller'=>'cleaningorders','action'=>'upcoming')); ?> upcoming task(s)</h3>
<?php }
    else {
 ?>
    <h3>You have <?php echo $this->Html->link($numofupcoming,array('controller'=>'cleaningorders','action'=>'upcoming')); ?> upcoming task(s)</h3>
<?php } ?>
