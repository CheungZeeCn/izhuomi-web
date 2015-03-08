<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

*/
?>


<div class="container" style="margin-top:20px">
	<div class="page-canvas">
	            <?php //echo $this->element('dashboard'); ?>
		<div class="small-wrapper">
					<?php echo $this->Form->create('User', array('action' => 'changePassword')); ?>
            <div class="form-group">
                <?php echo $this->Form->input('oldpassword', 
                    array('type'=>'password', 'placeholder'=>'请输入当前密码', 'label'=>'旧密码', 'class'=>'form-control'));
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('password', 
                    array('type'=>'password', 'placeholder'=>'请输入新密码', 'label'=>'新密码', 'class'=>'form-control'));
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('cpassword', 
                    array('type'=>'password', 'placeholder'=>'请重复输入新密码', 'label'=>'重复输入新密码', 'class'=>'form-control'));
                ?>
            </div>
		    <div class="" style="">
                <button class="btn btn-lg btn-primary btn-shadow" style="width:100px" role="button"> 修改密码</button>
		    	<div style="clear:both"></div>
		    </div>
					<?php echo $this->Form->end(); ?>
                <?php 
                    $msg = $this->Session->flash();     
                    if($msg != NULL) { 
                        echo "<h4 class=''>$msg</h4>";
                    }
                ?>
        </div>
	</div>
</div>

<!--
<div class="umtop">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Change Password'); ?></span>
				<span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home",true),"/") ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="login">
				<div class="um_box_mid_content_mid_left">
					<?php echo $this->Form->create('User', array('action' => 'changePassword')); ?>
					<div>
						<div class="umstyle3"><?php echo __('Old Password');?></div>
						<div class="umstyle4"><?php echo $this->Form->input("oldpassword" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
						<div style="clear:both"></div>
					</div>
					<div>
						<div class="umstyle3"><?php echo __('New Password');?></div>
						<div class="umstyle4"><?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
						<div style="clear:both"></div>
					</div>
					<div>
						<div class="umstyle3"><?php echo __('Confirm Password');?></div>
						<div class="umstyle4"><?php echo $this->Form->input("cpassword" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
						<div style="clear:both"></div>
					</div>
					<div>
						<div class="umstyle3"></div>
						<div class="umstyle4"><?php echo $this->Form->Submit(__('Change'));?></div>
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
-->
<script>
document.getElementById("UserPassword").focus();
</script>
