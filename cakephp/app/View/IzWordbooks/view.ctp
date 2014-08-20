<div class="izWordbooks view">
<h2><?php echo __('Iz Wordbook'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($izWordbook['IzWordbook']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($izWordbook['IzWordbook']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Word'); ?></dt>
		<dd>
			<?php echo h($izWordbook['IzWordbook']['word']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phonetic'); ?></dt>
		<dd>
			<?php echo h($izWordbook['IzWordbook']['phonetic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Explain'); ?></dt>
		<dd>
			<?php echo h($izWordbook['IzWordbook']['explain']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($izWordbook['IzWordbook']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($izWordbook['IzWordbook']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Iz Wordbook'), array('action' => 'edit', $izWordbook['IzWordbook']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Iz Wordbook'), array('action' => 'delete', $izWordbook['IzWordbook']['id']), array(), __('Are you sure you want to delete # %s?', $izWordbook['IzWordbook']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Iz Wordbooks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Iz Wordbook'), array('action' => 'add')); ?> </li>
	</ul>
</div>
