<div class="users form container">
<span class="span10"> </span>
<?php echo $this->Form->create('IzUser', array('data-ajax' => 'false')); ?>
    <fieldset>
        <legend><?php echo __('注册用户'); ?></legend>
        <?php echo $this->Form->input('username');
            echo $this->Form->input('password');
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
