<div class="izWordbooks form">
<?php echo $this->Form->create('IzWordbook'); ?>
	<fieldset>
		<legend><?php echo __('Add Iz Wordbook'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('word');
		echo $this->Form->input('phonetic');
		echo $this->Form->input('explain');
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Iz Wordbooks'), array('action' => 'index')); ?></li>
	</ul>
</div>
