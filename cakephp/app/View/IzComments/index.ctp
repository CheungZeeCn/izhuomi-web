<div class="izComments index">
	<h2><?php echo __('Iz Comments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('foreign_key'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('model'); ?></th>
			<th><?php echo $this->Paginator->sort('approved'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('author_name'); ?></th>
			<th><?php echo $this->Paginator->sort('author_url'); ?></th>
			<th><?php echo $this->Paginator->sort('author_email'); ?></th>
			<th><?php echo $this->Paginator->sort('language'); ?></th>
			<th><?php echo $this->Paginator->sort('is_spam'); ?></th>
			<th><?php echo $this->Paginator->sort('comment_type'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($izComments as $izComment): ?>
	<tr>
		<td><?php echo h($izComment['IzComment']['id']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['parent_id']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['foreign_key']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['lft']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['rght']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['model']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['approved']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['title']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['slug']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['body']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['author_name']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['author_url']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['author_email']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['language']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['is_spam']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['comment_type']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['created']); ?>&nbsp;</td>
		<td><?php echo h($izComment['IzComment']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $izComment['IzComment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $izComment['IzComment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $izComment['IzComment']['id']), array(), __('Are you sure you want to delete # %s?', $izComment['IzComment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Iz Comment'), array('action' => 'add')); ?></li>
	</ul>
</div>
