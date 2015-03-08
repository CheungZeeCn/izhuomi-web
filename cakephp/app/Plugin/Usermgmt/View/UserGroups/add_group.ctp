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
	    			<!--<span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home",true),"/") ?></span>
                    -->
	    			<div style="clear:both"></div>
	    		</div>
	    		<div class="umhr"></div>
	    		<div class="col-md-4" id="addgroup">
	    			<?php echo $this->Form->create('UserGroup', array('action' => 'addGroup')); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('name', 
                            array('type'=>'', 'placeholder'=>'例如: A车间 管理员', 'label'=>'群组名<font color="red">*</font>', 'class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('alias_name', 
                            array('type'=>'', 'placeholder'=>'例如: A车间_管理员(不能有空格)', 'label'=>'群组别名<font color="red">*</font>', 'class'=>'form-control'));
                        ?>
                    </div>
	    			<div>
	    			<?php   if (!isset($this->request->data['UserGroup']['allowRegistration'])) {
	    						$this->request->data['UserGroup']['allowRegistration']=true;
	    					}   ?>
	    				<div class="row"><div class="checkbox" style="float:left; dispaly:inline"><?php echo __('允许普通用户注册这个组？');?></div>
	    				<div class="" style="float:right; dispaly:inline"><?php echo $this->Form->input("allowRegistration" ,array("type"=>"checkbox",'label' => false))?></div>
                        </div>
	    				<div style="clear:both"></div>
	    			</div>
	    			<div>
	    	            <div class="" style="">
                            <button class="btn btn-lg btn-primary btn-shadow" style="width:100px" role="button">添加群组</button>
	    	            	<div style="clear:both"></div>
	    	            </div>
	    			</div>
	    			<div class="danger">注意: 添加群组后，请记得手动给这个群组设定权限</div>
	    			<?php echo $this->Form->end(); ?>
	    		</div>
	    	</div>
	    </div>
	    <div class="um_box_down"></div>
    </div>
</div>
<script>
document.getElementById("UserUserGroupId").focus();
</script>
