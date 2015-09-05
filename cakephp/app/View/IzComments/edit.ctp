<div class="izComments form">
<?php echo $this->Form->create('IzComment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Iz Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('foreign_key');
		echo $this->Form->input('user_id');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
		echo $this->Form->input('model');
		echo $this->Form->input('approved');
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('body');
		echo $this->Form->input('author_name');
		echo $this->Form->input('author_url');
		echo $this->Form->input('author_email');
		echo $this->Form->input('language');
		echo $this->Form->input('is_spam');
		echo $this->Form->input('comment_type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('IzComment.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('IzComment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Iz Comments'), array('action' => 'index')); ?></li>
	</ul>
</div>
