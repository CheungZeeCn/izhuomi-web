<div class="izUserDoneArticle view">
<h2><?php echo __('Iz User Done Article'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($izUserDoneArticle['IzUserDoneArticle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($izUserDoneArticle['IzUserDoneArticle']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Article Id'); ?></dt>
		<dd>
			<?php echo h($izUserDoneArticle['IzUserDoneArticle']['article_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Donetime'); ?></dt>
		<dd>
			<?php echo h($izUserDoneArticle['IzUserDoneArticle']['donetime']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Iz User Done Article'), array('action' => 'edit', $izUserDoneArticle['IzUserDoneArticle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Iz User Done Article'), array('action' => 'delete', $izUserDoneArticle['IzUserDoneArticle']['id']), array(), __('Are you sure you want to delete # %s?', $izUserDoneArticle['IzUserDoneArticle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Iz User Done Article'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Iz User Done Article'), array('action' => 'add')); ?> </li>
	</ul>
</div>
