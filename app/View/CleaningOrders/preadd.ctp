
<?php
echo $this -> Html -> script('/js/datatables/jquery.dataTables.min.js');
echo $this -> Html -> css('jquery.dataTables');
 ?>
 
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#js-datatable').dataTable({
			"aaSorting" : [],
			"aoColumns" : [{
				"sTyle" : 'string-case'
			}, null, null, null, null, null]
			//"sPaginationType": "full_numbers",
			//"bJQueryUI": true,
			//"bProcessing": true,
			//"bServerSide": true,
			//"sAjaxSource": src=""
		});
	}); 
</script>
<div class="form">
<h2><?php echo __('Clients'); ?></h2>
    <table id="js-datatable" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
            <th><?php echo __('Name'); ?></th>
            <!-- <th><?php echo __('First Name'); ?></th>
            <th><?php echo __('Last Name'); ?></th> -->
            <th><?php echo __('Address'); ?></th>
            <th><?php echo __('Mobile'); ?></th>
            <th><?php echo __('Postcode'); ?></th>
            <th><?php echo __('Email'); ?></th>
            <th class="actions"><?php echo __('Add New Order'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($clients as $client){ ?>
    <tr>
        <td><?php echo h(ucwords($client['Client']['name'])); ?>&nbsp;</td>
        <!-- <td><?php echo h(ucwords($user['User']['firstname'])); ?>&nbsp;</td>
        <td><?php echo h(ucwords($user['User']['lastname'])); ?>&nbsp;</td>-->
        <td>
            <?php echo h($client['Client']['address']); ?>&nbsp;
        </td>
        <td><?php echo h($client['Client']['mobile']); ?>&nbsp;</td>
        <td>
            <?php echo h($client['Client']['postcode']); ?>&nbsp;
        </td>
        <td>
            <?php echo h($client['Client']['email']); ?>&nbsp;
        </td>
        <td class="actions">
            <?php echo $this -> Html -> link("Add New Order", array('controller' => 'cleaning_orders', 'action' => 'add', $client['Client']['id'])); ?>        
        </td>
    </tr>
<?php } ?>
</tbody>
    </table></br></div>
    <div class="actions"><?php echo $this -> Html -> link("Add New Client", array('controller' => 'clients', 'action' => 'add'), array('class' => 'actions')); ?> </div>
    