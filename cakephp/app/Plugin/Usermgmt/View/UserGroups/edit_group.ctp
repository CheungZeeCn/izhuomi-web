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
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><h1><?php echo __('编辑群组'); ?></h1></span>
				<!--<span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home",true),"/") ?></span>
                -->
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="col-md-4" id="addgroup">
				<?php echo $this->Form->create('UserGroup'); ?>
				<?php echo $this->Form->hidden('id')?>
                <div class="form-group">
                    <?php echo $this->Form->input('name', 
                        array('type'=>'', 'placeholder'=>'', 'label'=>'群组名称<font color="red">*</font>', 'class'=>'form-control'));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('alias_name', 
                        array('type'=>'', 'placeholder'=>'', 'label'=>'群组别名<font color="red">*</font>', 'class'=>'form-control'));
                    ?>
					<div class="">例如 Business_User (不能添加空格) (建议不要修改)</div>
                </div>
				<div>
					<div class="row"><div class="checkbox" style="float:left; dispaly:inline"><?php echo __('允许普通用户注册这个组？');?></div>
					<div class="" style="float:right; dispaly:inline"><?php echo $this->Form->input("allowRegistration" ,array("type"=>"checkbox",'label' => false))?></div>
                    </div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3"></div>
					<div class="umstyle4"><?php echo $this->Form->Submit(__('Update Group'));?></div>
					<div style="clear:both"></div>
				</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>
<script>
document.getElementById("UserUserGroupId").focus();
</script>
