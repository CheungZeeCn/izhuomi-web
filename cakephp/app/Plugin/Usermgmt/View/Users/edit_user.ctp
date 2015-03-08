<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<div class="container">
	<?php echo $this->Session->flash(); ?>
	<?php //echo $this->element('dashboard'); ?>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="register">
			<div class="">
				<span class=""><h1><?php echo __('修改用户'); ?></h1></span>
				<!--<span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span> -->
				<div style="clear:both"></div>
			</div>
				<div class="col-md-4">
					<?php echo $this->Form->create('User'); ?>
					<?php echo $this->Form->input("id" ,array('type' => 'hidden', 'label' => false,'div' => false))?>
			<?php   if (count($userGroups) >2) { ?>
						<div>
							<div class="umstyle3"><?php echo __('群组');?><font color='red'>*</font></div>
							<div class="umstyle4" ><?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
							<div style="clear:both"></div>
						</div>
			<?php   }   ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('username', 
                            array('type'=>'', 'placeholder'=>'', 'label'=>'用户名<font color="red">*</font>', 'class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('first_name', 
                            array('type'=>'', 'placeholder'=>'', 'label'=>'姓名<font color="red">*</font>', 'class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('email', 
                            array('type'=>'', 'placeholder'=>'', 'label'=>'邮箱<font color="red">*</font>', 'class'=>'form-control'));
                        ?>
                    </div>
					<div>
						<div class="umstyle3"></div>
						<div class="umstyle4"><?php echo $this->Form->Submit(__('Update User'));?></div>
						<div style="clear:both"></div>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
				<div class="um_box_mid_content_mid_right" align="right"></div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>
<script>
document.getElementById("UserUserGroupId").focus();
</script>
