<?php
?>
<div class="container" style="margin-top:20px">
	<div class="page-canvas">
	            <?php //echo $this->element('dashboard'); ?>
		<div class="small-wrapper">
				<h1 class=""><?php echo __('为用户['); echo h($name);  echo(']改变密码');?></h1>
		    <?php echo $this->Form->create('User'); ?>
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

<script>
document.getElementById("UserPassword").focus();
</script>


