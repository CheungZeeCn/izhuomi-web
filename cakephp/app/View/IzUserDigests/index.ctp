<div class="izUserDigests index">
	<h2><?php echo __('Iz User Digests'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('article_id'); ?></th>
			<th><?php echo $this->Paginator->sort('digest'); ?></th>
			<th><?php echo $this->Paginator->sort('addtime'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($izUserDigests as $izUserDigest): ?>
	<tr>
		<td><?php echo h($izUserDigest['IzUserDigest']['id']); ?>&nbsp;</td>
		<td><?php echo h($izUserDigest['IzUserDigest']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($izUserDigest['IzUserDigest']['article_id']); ?>&nbsp;</td>
		<td><?php echo h($izUserDigest['IzUserDigest']['digest']); ?>&nbsp;</td>
		<td><?php echo h($izUserDigest['IzUserDigest']['addtime']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $izUserDigest['IzUserDigest']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $izUserDigest['IzUserDigest']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $izUserDigest['IzUserDigest']['id']), array(), __('Are you sure you want to delete # %s?', $izUserDigest['IzUserDigest']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Iz User Digest'), array('action' => 'add')); ?></li>
	</ul>
</div>
