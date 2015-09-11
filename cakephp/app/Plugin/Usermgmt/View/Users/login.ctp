<?php echo $this->Html->css("Usermgmt.basic");?>
<!--login modal-->
<div class="users form container">
<span class="span50"> </span>
<span class="span50"> </span>
  <div class="modal-dialog" style="width:300px">
        <?php echo $this->Session->flash();?>
        <?php echo $this->Form->create('User', array('data-ajax' => 'false')); ?>
            <div class="form-group">
                <?php echo $this->Form->input('email', 
                    array('type'=>'username', 'placeholder'=>'用户名或者邮箱', 'label'=>'', 'class'=>'form-control input-lg'));
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('password', 
                    array('placeholder'=>'密码', 'label'=>'', 'class'=>'form-control input-lg'));
                ?>
            </div>
		<?php // $this->request->data['User']['remember']=true; ?>
		<div class="" style="">
            <button class="btn btn-lg btn-primary btn-shadow" style="width:100px" role="button"> 登陆</button>
            <span style="float:right;">
                <div style="float:left;font-size:30px"> 
                <a href="<?php echo $this->Html->url('/usermgmt/Users/oauth2Login/weibo');?>" data-original-title="facebook" class=""><i class="fa fa-weibo"></i></a>
                </div>
            </span>
			<div style="clear:both"></div>
		</div>
		<?php echo $this->Form->end(); ?>
        <?php //echo $this->Form->end('login', array('class'=>'btn btn-primary btn-lg btn-block')); ?>
        
        <div class="form-group" style="padding:10px">
          <span><?php echo $this->Html->link(__("忘记密码?",true),"/forgotPassword",array("class"=>"style30")) ?> </span> 
         <!-- <span > <?php echo $this->Html->link(__("重发Email验证?",true),"/emailVerification",array("class"=>"style30")) ?></span> -->
          <span class="pull-right"><?php echo $this->Html->link(__("注册",true),"/register") ?></span>
        </div>

    </div>
</div>

