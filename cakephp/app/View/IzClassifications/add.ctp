<div class="izClassifications form">
<?php echo $this->Form->create('IzClassification'); ?>
	<fieldset>
		<legend><?php echo __('Add Iz Classification'); ?></legend>
	<?php
		echo $this->Form->input('classification');
		echo $this->Form->input('classification_cn');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Iz Classifications'), array('action' => 'index')); ?></li>
	</ul>
</div>
