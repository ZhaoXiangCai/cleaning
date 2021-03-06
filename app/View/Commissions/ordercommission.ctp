<div>
    <h2><?php echo __('Commissions'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('cleaning_order_id'); ?></th>
            <th><?php echo $this->Paginator->sort('cleaning_order_address'); ?></th>
            <th><?php echo $this->Paginator->sort('cleaning_order_order_price'); ?></th>
            <th><?php echo $this->Paginator->sort('rate'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($commissions as $commission): ?>
    <tr>
        <td><?php echo h($commission['Commission']['id']); ?>&nbsp;</td>
        <td>
            <?php echo $this->Html->link($commission['User']['name'], array('controller' => 'users', 'action' => 'view', $commission['User']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($commission['CleaningOrder']['id'], array('controller' => 'cleaning_orders', 'action' => 'view', $commission['CleaningOrder']['id'])); ?>
        </td> 
        <td><?php echo h($commission['CleaningOrder']['address']); ?>&nbsp;</td>
        <td><?php echo h($commission['CleaningOrder']['order_price']); ?>&nbsp;</td>
        <td><?php echo h($commission['Commission']['rate']); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__('View'), array('action' => 'view', $commission['Commission']['id'])); ?>
            <?php 
            echo $this->Html->link(__('Edit'), array('action' => 'edit', $commission['Commission']['id'],$commission['User']['id'])); 
            ?>
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $commission['Commission']['id']), array(), __('Are you sure you want to delete # %s?', $commission['Commission']['id'])); ?>
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
    ?>  </p>
    <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
</div>

