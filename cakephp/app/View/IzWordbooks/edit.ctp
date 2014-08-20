<div class="izWordbooks form">
<?php echo $this->Form->create('IzWordbook'); ?>
	<fieldset>
		<legend><?php echo __('Edit Iz Wordbook'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('IzWordbook.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('IzWordbook.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Iz Wordbooks'), array('action' => 'index')); ?></li>
	</ul>
</div>
