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


<div class="row">
    <?php 
        echo $this->element('LeftUserMenu');
    ?>
    <div id='rightContentDiv' class="marginTop56 span9" data-role='content'>
	    <div class="um_box_mid">
	    	<div class="um_box_mid_content">
	    		<div class="umhr"></div>
	    		<div class="um_box_mid_content_mid" id="register">
	    		<div class="">
	    			<span class=""><h1><?php echo __('设置个人信息'); ?></h1></span>
                    <?php 
                        $error = $this->Session->flash();
                        if($error!='') { ?>
                        <div class="alert alert-danger" role="alert" id='updateMsgReturn' ><?php echo $error; ?></div>
                        <?php 
                        }
                    ?>
                    <div class="alert" role="alert" id='updateMsgReturn' style="display:none" ></div>
	    			<div style="clear:both"></div>
	    		</div>
	    			<div class="col-md-4">
	    				<?php echo $this->Form->create('User', array('action'=>'updateMyProfile')); ?>
	    		<?php   if (count($userGroups) >2) { ?>
	    					<div>
	    						<div class="umstyle3"><?php echo __('群组');?><font color='red'>*</font></div>
	    						<div class="umstyle4" ><?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
	    						<div style="clear:both"></div>
	    					</div>
	    		<?php   }   ?>

                        <div class="form-group">
                        <?php 
                            echo $this->Form->input('first_name', 
                            array('type'=>'', 'value'=>"{$user['User']['first_name']}", 'placeholder'=>'', 'label'=>'昵称<font color="red">(必填，最长16个字)</font>', 'class'=>'form-control'));
                        ?>
                        <?php echo $this->Form->input('UserProfile.weibo', 
                            array('type'=>'', 'value'=>"{$user['UserProfile']['weibo']}", 'placeholder'=>'', 'label'=>'新浪微博账号', 'class'=>'form-control'));
                        ?>
                        <?php echo $this->Form->input('UserProfile.wechat', 
                            array('type'=>'', 'value'=>"{$user['UserProfile']['wechat']}", 'placeholder'=>'', 'label'=>'微信账号', 'class'=>'form-control'));
                        ?>
                        <?php echo $this->Form->input('UserProfile.qq', 
                            array('type'=>'', 'value'=>"{$user['UserProfile']['qq']}", 'placeholder'=>'', 'label'=>'QQ账号', 'class'=>'form-control'));
                        ?>
                        <?php echo $this->Form->input('UserProfile.self_intro', 
                            array('type'=>'textarea', 'maxlength'=>'256', 'value'=>"{$user['UserProfile']['self_intro']}",  'placeholder'=>'', 'label'=>'简介<font color="red">(最长256个字)</font>', 'class'=>'form-control'));
                        ?>
                        </div>

	    				<div>
	    					<div style="clear:both"></div>
                            <button class="btn btn-lg btn-primary btn-shadow" style="width:100px" role="button">提交修改 </button>
	    				</div>
	    				<?php echo $this->Form->end(); ?>
	    			</div>
	    			<div class="um_box_mid_content_mid_right" align="right"></div>
	    			<div style="clear:both"></div>
	    		</div>
	    	</div>
	    </div>
    </div>
</div>
