<?php
?>
<div class="container" style="margin-top:20px">
	<!--<div class="um_box_up"></div>-->
    

	<div class="page-canvas">
                <span><?php echo $this->Session->flash(); ?></span>
		<div class="signup-wrapper">
	        <?php 
                echo '<h1 class="regH1">密码重置</h1>';
            ?>
           
			<div class="" id="activatePassword">
				<div class="">
					<?php echo $this->Form->create('User', array('action' => 'activatePassword')); ?>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label"><?php echo __('密码');?></label>
                        <div class="col-sm-10">
						    <?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control" ))?>
                        </div>
					    <div style="clear:both"></div>
					</div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label"><?php echo __('确认密码');?></label>
                        <div class="col-sm-10">
						    <?php echo $this->Form->input("cpassword" ,array("type"=>"cpassword",'label' => false,'div' => false,'class'=>"form-control" ))?>
                        </div>
					    <div style="clear:both"></div>
					</div>
				<?php   if (!isset($ident)) {
							$ident='';
						}
						if (!isset($activate)) {
							$activate='';
						}   ?>
						<?php echo $this->Form->hidden('ident',array('value'=>$ident))?>
						<?php echo $this->Form->hidden('activate',array('value'=>$activate))?>

					<div class="" style="text-align: center">
                        <button class="btn btn-lg btn-primary btn-shadow" role="button"> 提交重置</button>
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
//document.getElementById("UserPassword").focus();
</script>

