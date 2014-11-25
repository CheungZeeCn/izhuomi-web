<div class="izUserDoneArticle index">
	<h2><?php echo __('Iz User Done Article'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('article_id'); ?></th>
			<th><?php echo $this->Paginator->sort('donetime'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($izUserDoneArticle as $izUserDoneArticle): ?>
	<tr>
		<td><?php echo h($izUserDoneArticle['IzUserDoneArticle']['id']); ?>&nbsp;</td>
		<td><?php echo h($izUserDoneArticle['IzUserDoneArticle']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($izUserDoneArticle['IzUserDoneArticle']['article_id']); ?>&nbsp;</td>
		<td><?php echo h($izUserDoneArticle['IzUserDoneArticle']['donetime']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $izUserDoneArticle['IzUserDoneArticle']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $izUserDoneArticle['IzUserDoneArticle']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $izUserDoneArticle['IzUserDoneArticle']['id']), array(), __('Are you sure you want to delete # %s?', $izUserDoneArticle['IzUserDoneArticle']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Iz User Done Article'), array('action' => 'add')); ?></li>
	</ul>
</div>
