<div class="izUsersLogos index">
	<h2><?php echo __('Iz Users Logos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('small_logo_addr'); ?></th>
			<th><?php echo $this->Paginator->sort('middle_logo_addr'); ?></th>
			<th><?php echo $this->Paginator->sort('large_logo_addr'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($izUsersLogos as $izUsersLogo): ?>
	<tr>
		<td><?php echo h($izUsersLogo['IzUsersLogo']['id']); ?>&nbsp;</td>
		<td><?php echo h($izUsersLogo['IzUsersLogo']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($izUsersLogo['IzUsersLogo']['small_logo_addr']); ?>&nbsp;</td>
		<td><?php echo h($izUsersLogo['IzUsersLogo']['middle_logo_addr']); ?>&nbsp;</td>
		<td><?php echo h($izUsersLogo['IzUsersLogo']['large_logo_addr']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $izUsersLogo['IzUsersLogo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $izUsersLogo['IzUsersLogo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $izUsersLogo['IzUsersLogo']['id']), array(), __('Are you sure you want to delete # %s?', $izUsersLogo['IzUsersLogo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Iz Users Logo'), array('action' => 'add')); ?></li>
	</ul>
</div>
