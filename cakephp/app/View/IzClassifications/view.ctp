<div class="izClassifications view">
<h2><?php echo __('Iz Classification'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($izClassification['IzClassification']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classification'); ?></dt>
		<dd>
			<?php echo h($izClassification['IzClassification']['classification']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classification Cn'); ?></dt>
		<dd>
			<?php echo h($izClassification['IzClassification']['classification_cn']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Iz Classification'), array('action' => 'edit', $izClassification['IzClassification']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Iz Classification'), array('action' => 'delete', $izClassification['IzClassification']['id']), array(), __('Are you sure you want to delete # %s?', $izClassification['IzClassification']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Iz Classifications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Iz Classification'), array('action' => 'add')); ?> </li>
	</ul>
</div>
