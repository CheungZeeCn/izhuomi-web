<div class="izUserDoneArticle form">
<?php echo $this->Form->create('IzUserDoneArticle'); ?>
	<fieldset>
		<legend><?php echo __('Add Iz User Done Article'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Iz User Done Article'), array('action' => 'index')); ?></li>
	</ul>
</div>
