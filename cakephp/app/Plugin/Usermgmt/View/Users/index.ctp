<?php
?>
<div class="row">
    <?php 
        echo $this->element('LeftUserMenu');
    ?>
    <div id='rightContentDiv' class="marginTop56 span9" data-role='content'>
	    <?php echo $this->Session->flash(); ?>
	    <div class="um_box_up"></div>
	    <div class="um_box_mid">
	    	<div class="um_box_mid_content">
	    		<div class="um_box_mid_content_top">
	    			<!-- <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home",true),"/") ?></span>-->
	    			<div style="clear:both"></div>
	    		</div>
	    		<div class="umhr"></div>
	    		<div class="um_box_mid_content_mid" id="index">
	    			<table class="table" cellspacing="0" cellpadding="0" width="100%" border="0" >
	    				<thead>
	    					<tr>
	    						<th><?php echo __('id');?></th>
	    						<th><?php echo __('名字');?></th>
	    						<th><?php echo __('用户名');?></th>
	    						<th><?php echo __('邮箱');?></th>
	    						<th><?php echo __('群组');?></th>
	    						<th><?php echo __('已邮件验证');?></th>
	    						<th><?php echo __('账号状态');?></th>
	    						<th><?php echo __('创建时间');?></th>
	    						<th><?php echo __('动作');?></th>
	    					</tr>
	    				</thead>
	    				<tbody>
	    		<?php       if (!empty($users)) {
	    						$sl=0;
	    						foreach ($users as $row) {
	    							$sl++;
	    							echo "<tr>";
	    							echo "<td>".$row['User']['id']."</td>";
	    							echo "<td>".h($row['User']['first_name'])." ".h($row['User']['last_name'])."</td>";
	    							echo "<td>".h($row['User']['username'])."</td>";
	    							echo "<td>".h($row['User']['email'])."</td>";
	    							echo "<td>".h($row['UserGroup']['name'])."</td>";
	    							echo "<td>";
	    							if ($row['User']['email_verified']==1) {
	    								echo "Yes";
	    							} else {
	    								echo "No";
	    							}
	    							echo"</td>";
	    							echo "<td>";
	    							if ($row['User']['active']==1) {
	    								echo "Active";
	    							} else {
	    								echo "Inactive";
	    							}
	    							echo"</td>";
	    							echo "<td>".date('d-M-Y',strtotime($row['User']['created']))."</td>";
	    							echo "<td>";
	    								echo "<span class='icon'><a href='".$this->Html->url('/viewUser/'.$row['User']['id'])."' target='_blank'><img src='".SITE_URL."usermgmt/img/view.png' border='0' alt='View' title='View'></a></span>";
	    								echo "<span class='icon'><a href='".$this->Html->url('/editUser/'.$row['User']['id'])."' target='_blank'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='Edit' title='Edit'></a></span>";
	    								echo "<span class='icon'><a href='".$this->Html->url('/changeUserPassword/'.$row['User']['id'])."' target='_blank'><img src='".SITE_URL."usermgmt/img/password.png' border='0' alt='Change Password' title='Change Password'></a></span>";
	    								if ($row['User']['email_verified']==0) {
	    									echo "<span class='icon'><a href='".$this->Html->url('/usermgmt/users/verifyEmail/'.$row['User']['id'])."'><img src='".SITE_URL."usermgmt/img/email-verify.png' border='0' alt='Verify Email' title='Verify Email'></a></span>";
	    								}
	    								if ($row['User']['active']==0) {
	    									echo "<span class='icon'><a href='".$this->Html->url('/usermgmt/users/makeActiveInactive/'.$row['User']['id'].'/1')."'><img src='".SITE_URL."usermgmt/img/dis-approve.png' border='0' alt='Make Active' title='Make Active'></a></span>";
	    								} else {
	    									echo "<span class='icon'><a href='".$this->Html->url('/usermgmt/users/makeActiveInactive/'.$row['User']['id'].'/0')."'><img src='".SITE_URL."usermgmt/img/approve.png' border='0' alt='Make Inactive' title='Make Inactive'></a></span>";
	    								}
	    								if ($row['User']['id']!=1 && $row['User']['username']!='Admin') {
	    									echo $this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteUser', $row['User']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this user?')));
	    								}
	    							echo "</td>";
	    							echo "</tr>";
	    						}
	    					} else {
	    						echo "<tr><td colspan=10><br/><br/>No Data</td></tr>";
	    					} ?>
	    				</tbody>
	    			</table>
	    		</div>
	    	</div>
	    </div>
	    <div class="um_box_down"></div>
    </div>
</div>
