<div class="izUsersLogos view">
<h2><?php echo __('Iz Users Logo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($izUsersLogo['IzUsersLogo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($izUsersLogo['IzUsersLogo']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Small Logo Addr'); ?></dt>
		<dd>
			<?php echo h($izUsersLogo['IzUsersLogo']['small_logo_addr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Middle Logo Addr'); ?></dt>
		<dd>
			<?php echo h($izUsersLogo['IzUsersLogo']['middle_logo_addr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Large Logo Addr'); ?></dt>
		<dd>
			<?php echo h($izUsersLogo['IzUsersLogo']['large_logo_addr']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Iz Users Logo'), array('action' => 'edit', $izUsersLogo['IzUsersLogo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Iz Users Logo'), array('action' => 'delete', $izUsersLogo['IzUsersLogo']['id']), array(), __('Are you sure you want to delete # %s?', $izUsersLogo['IzUsersLogo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Iz Users Logos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Iz Users Logo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
