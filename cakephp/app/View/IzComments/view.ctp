<div class="izComments view">
<h2><?php echo __('Iz Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Id'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Key'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['foreign_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['approved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author Name'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['author_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author Url'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['author_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author Email'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['author_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['language']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Spam'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['is_spam']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment Type'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['comment_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($izComment['IzComment']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Iz Comment'), array('action' => 'edit', $izComment['IzComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Iz Comment'), array('action' => 'delete', $izComment['IzComment']['id']), array(), __('Are you sure you want to delete # %s?', $izComment['IzComment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Iz Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Iz Comment'), array('action' => 'add')); ?> </li>
	</ul>
</div>
