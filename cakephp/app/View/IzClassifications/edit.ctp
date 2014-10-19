<div class="izClassifications form">
<?php echo $this->Form->create('IzClassification'); ?>
	<fieldset>
		<legend><?php echo __('Edit Iz Classification'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('classification');
		echo $this->Form->input('classification_cn');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('IzClassification.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('IzClassification.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Iz Classifications'), array('action' => 'index')); ?></li>
	</ul>
</div>
