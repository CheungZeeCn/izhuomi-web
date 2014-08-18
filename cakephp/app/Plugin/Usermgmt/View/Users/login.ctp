
<!--login modal-->
<div class="users form container">
<span class="span50"> </span>
<span class="span50"> </span>
  <div class="modal-dialog" style="width:300px">
        <?php echo $this->Session->flash();?>
        <?php echo $this->Form->create('User', array('data-ajax' => 'false')); ?>
            <div class="form-group">
                <?php echo $this->Form->input('email', 
                    array('placeholder'=>'Email', 'label'=>'', 'class'=>'form-control input-lg'));
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('password', 
                    array('placeholder'=>'Password', 'label'=>'', 'class'=>'form-control input-lg'));
                ?>
            </div>
		<?php // $this->request->data['User']['remember']=true; ?>
        <?php echo $this->Form->end('login', array('class'=>'btn btn-primary btn-lg btn-block')); ?>
        <div class="form-group">
          <span><?php echo $this->Html->link(__("忘记密码?",true),"/forgotPassword",array("class"=>"style30")) ?> </span> 
         <!-- <span > <?php echo $this->Html->link(__("重发Email验证?",true),"/emailVerification",array("class"=>"style30")) ?></span> -->
          <span class="pull-right"><?php echo $this->Html->link(__("注册",true),"/register") ?></span>
        </div>
    </div>
</div>

