<div class="users form container">
<span class="span10"> </span>
<?php echo $this->Form->create('IzUser'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'editor' => 'Editor', 'user' => 'User')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
