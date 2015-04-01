<?php
    //Modified By ZhangZhi
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
				<!--<span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span> -->
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="register">
				<!--<div class="um_box_mid_content_mid_left">-->
				<div class="col-md-4">
					<?php echo $this->Form->create('User', array('action' => 'addUser')); ?>
			<?php   if (count($userGroups) >2 and false) { ?>
						<div  class="form-group">
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
                            array('type'=>'email', 'placeholder'=>'', 'label'=>'Email<font color="red">*</font>', 'class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('password', 
                            array('type'=>'password', 'placeholder'=>'', 'label'=>'密码<font color="red">*</font>', 'class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('cpassword', 
                            array('type'=>'password', 'placeholder'=>'', 'label'=>'重复输入密码<font color="red">*</font>', 'class'=>'form-control'));
                        ?>
                    </div>
		            <div class="" style="">
                        <button class="btn btn-lg btn-primary btn-shadow" style="width:100px" role="button">添加用户</button>
		            	<div style="clear:both"></div>
		            </div>
					<?php echo $this->Form->end(); ?>
				</div>
				<div class="um_box_mid_content_mid_right" align="right"></div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
</div>
<script>
document.getElementById("UserUserGroupId").focus();
</script>

