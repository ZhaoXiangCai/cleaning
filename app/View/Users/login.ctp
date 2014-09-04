<div>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
<p class="text-left">
<?php echo $this->Html->link('New Account', array('action'=>'add'),array('class'=>'btn btn-primary')); ?></p>
</div>

