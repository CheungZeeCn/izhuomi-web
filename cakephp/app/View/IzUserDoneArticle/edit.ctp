<div class="izUserDoneArticle form">
<?php echo $this->Form->create('IzUserDoneArticle'); ?>
	<fieldset>
		<legend><?php echo __('Edit Iz User Done Article'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('article_id');
		echo $this->Form->input('donetime');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('IzUserDoneArticle.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('IzUserDoneArticle.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Iz User Done Article'), array('action' => 'index')); ?></li>
	</ul>
</div>
