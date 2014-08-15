<div class="izUsersLogos form">
<?php echo $this->Form->create('IzUsersLogo'); ?>
	<fieldset>
		<legend><?php echo __('Add Iz Users Logo'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('small_logo_addr');
		echo $this->Form->input('middle_logo_addr');
		echo $this->Form->input('large_logo_addr');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Iz Users Logos'), array('action' => 'index')); ?></li>
	</ul>
</div>
