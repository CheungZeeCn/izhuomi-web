<?php
?>
<?php 
    echo $this->Html->css("Usermgmt.jquery-ui.css");
    echo $this->Html->script("Usermgmt.jquery-ui.js");
?>

<div class="container" style="margin-top:20px">
	<!--<div class="um_box_up"></div>-->
    

	<div class="page-canvas">
		<div class="signup-wrapper">
	        <?php 
                $msg = $this->Session->flash();     
                if($msg != NULL) { ?>
                    <div class="alert alert-info" role="info" style="margin-top:30px">
                        <?php echo "<h1 class='regH1'>{$msg}</h1>"; ?>
                    </div>
                <?php
                   // echo "<h1 class='regH1'><>{$msg}<></h1>";
                } else {
                    echo '<h1 class="regH1">现在就加入i.啄米</h1>';
                }
            ?>
           
			<div class="" id="register">
				<div class="">
					<?php echo $this->Form->create('User', array('action' => 'register')); ?>
			<?php   if (count($userGroups) >2) { ?>
                        <div class="form-group">
                            <label for="inputGroup" class="col-sm-2 control-label"><?php echo __('群组');?></label>
                            <div class="col-sm-10"><?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'label' => false,'div' => false, 'id'=>'inputGroup', 'class'=>"form-control input-md" ))?>
                            </div>
							<div style="clear:both"></div>
						</div>
			<?php   }   ?>

                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label"><?php echo __('用户名');?><font color='red'>*</font></label>
                        <div class="col-sm-10">
					        <?php echo $this->Form->input("username" ,array('label' => false, 'title'=>'后续可用作登陆', 'id'=>'username', 'div' => false,'class'=>"form-control" ))?>
                        </div>
					    <div style="clear:both"></div>
					</div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label"><?php echo __('Email');?><font color='red'>*</font></label>
                        <div class="col-sm-10">
					        <?php echo $this->Form->input("email" ,array('label' => false, 'id'=>'email', 'div' => false,'class'=>"form-control", 'type'=>'email', 'title' => '后续可用作登陆'))?>
                        </div>
					    <div style="clear:both"></div>
					</div>

                    <div class="form-group">
                        <label for="first_name" class="col-sm-2 control-label"><?php echo __('昵称');?><font color='red'>*</font></label>
                        <div class="col-sm-10">
					        <?php echo $this->Form->input("first_name" ,array('label' => false, 'id'=>'first_name', 'div' => false,'class'=>"form-control", 'type'=>'username', 'title' => '起个帅气迷人的名字吧!'))?>
                        </div>
					    <div style="clear:both"></div>
					</div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label"><?php echo __('密码');?><font color='red'>*</font></label>
                        <div class="col-sm-10">
					        <?php echo $this->Form->input("password" ,array('label' => false, 'id'=>'password', 'div' => false,'class'=>"form-control", 'tyep'=>'password' ))?>
                        </div>
					    <div style="clear:both"></div>
					</div>

                    <div class="form-group">
                        <label for="capssword" class="col-sm-2 control-label"><?php echo __('确认密码');?><font color='red'>*</font></label>
                        <div class="col-sm-10">
					        <?php echo $this->Form->input("cpassword" ,array('label' => false, 'id'=>'cpassword', 'div' => false,'class'=>"form-control", 'type'=>'password' ))?>
                        </div>
					    <div style="clear:both"></div>
					</div>


			<?php   if(USE_RECAPTCHA && PRIVATE_KEY_FROM_RECAPTCHA !="" && PUBLIC_KEY_FROM_RECAPTCHA !="") { ?>
					<div>
						<div class="umstyle4" style="margin-left:45px"><?php echo $this->UserAuth->showCaptcha(isset($this->validationErrors['User']['captcha'][0]) ? $this->validationErrors['User']['captcha'][0] : ""); ?></div>
						<div style="clear:both"></div>
					</div>
			<?php   } ?>
					<div class="" style="text-align: center">
                        <button class="btn btn-lg btn-primary btn-shadow" role="button"> 提交注册</button>
						<div style="clear:both"></div>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
				<div class="um_box_mid_content_mid_right" align="right"></div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
	<!--<div class="um_box_down"></div>-->
</div>
<script>
document.getElementById("username").focus();
 $(function() {
    $( document ).tooltip();
});
</script>
