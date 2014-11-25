<div class="izUserDigests view">
<h2><?php echo __('Iz User Digest'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($izUserDigest['IzUserDigest']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($izUserDigest['IzUserDigest']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Article Id'); ?></dt>
		<dd>
			<?php echo h($izUserDigest['IzUserDigest']['article_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Digest'); ?></dt>
		<dd>
			<?php echo h($izUserDigest['IzUserDigest']['digest']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Addtime'); ?></dt>
		<dd>
			<?php echo h($izUserDigest['IzUserDigest']['addtime']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Iz User Digest'), array('action' => 'edit', $izUserDigest['IzUserDigest']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Iz User Digest'), array('action' => 'delete', $izUserDigest['IzUserDigest']['id']), array(), __('Are you sure you want to delete # %s?', $izUserDigest['IzUserDigest']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Iz User Digests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Iz User Digest'), array('action' => 'add')); ?> </li>
	</ul>
</div>
