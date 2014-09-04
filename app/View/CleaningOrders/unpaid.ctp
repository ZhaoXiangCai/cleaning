    <h2><?php echo __('Unpaid Orders'); ?></h2>

    <table cellpadding="0" cellspacing="0" class="table">
    <thead>
    <tr>
            <th><?php echo $this -> Paginator -> sort('id'); ?></th>
            <th><?php echo $this -> Paginator -> sort('appointment_time_from'); ?></th>
            <th><?php echo $this -> Paginator -> sort('appointment_time_to'); ?></th>
            <th><?php echo $this -> Paginator -> sort('ordered_time'); ?></th>
            <th><?php echo $this -> Paginator -> sort('address'); ?></th>
            <th><?php echo $this -> Paginator -> sort('order_price'); ?></th>
            <th><?php echo $this -> Paginator -> sort('discount'); ?></th>
            <th><?php echo $this -> Paginator -> sort('postcode_discount'); ?></th>
            <th><?php echo $this -> Paginator -> sort('parking_type'); ?></th>
            <th><?php echo $this -> Paginator -> sort('added_by'); ?></th>
            <th><?php echo $this -> Paginator -> sort('team_id'); ?></th>
            <th><?php echo $this -> Paginator -> sort('client_id'); ?></th>
            <!-- // <th><?php echo $this -> Paginator -> sort('company_id'); ?></th> -->            
            <th><?php echo $this -> Paginator -> sort('last_invoice_sent'); ?></th>
            <th><?php echo $this -> Paginator -> sort('referrer'); ?></th>
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
        <td><?php echo h($cleaningOrder['CleaningOrder']['ordered_time']); ?>&nbsp;</td>
        <td><?php echo h($cleaningOrder['CleaningOrder']['address']); ?>&nbsp;</td>
        <td><?php echo h($cleaningOrder['CleaningOrder']['order_price']); ?>&nbsp;</td>
        <td><?php echo h($cleaningOrder['CleaningOrder']['discount']); ?>&nbsp;</td>
        <td><?php echo h($cleaningOrder['CleaningOrder']['postcode_discount']); ?>&nbsp;</td>
        <td><?php echo h($cleaningOrder['CleaningOrder']['parking_type']); ?>&nbsp;</td>
        <td><?php echo $this -> Html -> link(h($cleaningOrder['Added_by']['name']), array('controller' => 'users', 'action' => 'view', $cleaningOrder['CleaningOrder']['added_by'])); ?>&nbsp;</td>
        <td>
            <?php echo $this -> Html -> link($cleaningOrder['Team']['name'], array('controller' => 'teams', 'action' => 'view', $cleaningOrder['Team']['id'])); ?>
        </td>
        <td>
            <?php echo $this -> Html -> link($cleaningOrder['Client']['name'], array('controller' => 'clients', 'action' => 'view', $cleaningOrder['Client']['id'])); ?>
        </td>
        <!-- <td>
            <?php echo $this -> Html -> link($cleaningOrder['Company']['id'], array('controller' => 'companies', 'action' => 'view', $cleaningOrder['Company']['id'])); ?>
        </td> -->
        <td><?php echo $this -> Html -> link(h($cleaningOrder['Last_Invoice']['name']), array('controller' => 'users', 'action' => 'view', $cleaningOrder['CleaningOrder']['last_invoice_sent'])); ?>&nbsp;</td>
        <td><?php echo $this -> Html -> link(h($cleaningOrder['Referrer']['name']), array('controller' => 'users', 'action' => 'view', $cleaningOrder['CleaningOrder']['referrer'])); ?>&nbsp;</td>
        <td><?php echo h($cleaningOrder['Color']['name']); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this -> Html -> link(__('View'), array('action' => 'view', $cleaningOrder['CleaningOrder']['id'])); ?>
            <?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit', $cleaningOrder['CleaningOrder']['id'])); ?>
            <?php echo $this -> Form -> postLink(__('Delete'), array('action' => 'delete', $cleaningOrder['CleaningOrder']['id']), array(), __('Are you sure you want to delete # %s?', $cleaningOrder['CleaningOrder']['id'])); ?>
        </td>
    </tr>
<?php endforeach; ?>
    </tbody>
    </table>
    <p>
    <?php
    echo $this -> Paginator -> counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));
    ?>  </p>
    <div class="paging">
    <?php
    echo $this -> Paginator -> prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    echo $this -> Paginator -> numbers(array('separator' => ''));
    echo $this -> Paginator -> next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>


