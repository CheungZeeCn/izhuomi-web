<div class="izUserDigests form">
<?php echo $this->Form->create('IzUserDigest'); ?>
	<fieldset>
		<legend><?php echo __('Add Iz User Digest'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('article_id');
		echo $this->Form->input('digest');
		echo $this->Form->input('addtime');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Iz User Digests'), array('action' => 'index')); ?></li>
	</ul>
</div>
