                    <ul class="nav pull-right">
                      <li class="dropdown" id="menuLogin">
                        <?php if(isset($_username)){?> 
                            <a class="dropdown-toggle menu-nav-item" href="#" data-toggle="dropdown" id="navLogin"><?php echo "Hi, $_username "?><span class="caret"></span></a>
                            <ul class="dropdown-menu" style="padding:2px;left:auto;right:0;">
                                <li><a href="<?php echo $this->Html->url("/dashboard", true); ?>">设置个人信息</a></li>
                                <li><a href="<?php echo $this->Html->url("/logout", true); ?>">退出</a></li>
                            </ul>

                        <?php } else { ?>
                            <a class="dropdown-toggle menu-nav-item" href="#" data-toggle="dropdown" id="navLogin">Login</a>
                            <div class="dropdown-menu" style="padding:20px;left:auto;right:0;width:250px">
                                <?php echo $this->Form->create('User', 
                                            array('id' => 'topBarLogin', 
                                                'url'=>'/login?redirect2='.urlencode($this->Html->url(null, true)), 
                                                'data-ajax' => 'false')); 
                                ?>
                                    <div class="form-group">
                                    <fieldset>
                                        <?php 
                                            echo $this->Form->input('email', 
                                                array('type'=>'', 'label'=>'Email/Username', 'class'=>'form-control'));
                                            echo $this->Form->input('password', array('type'=>'password', 'label'=>'Password', 'class'=>'form-control'));
                                        ?>
                                    </fieldset>
                                    </div>
	    					<div style="clear:both"></div>
                            <button class="btn btn-sm btn-primary btn-shadow" data-role=none style="width:100px" role="button">Login</button>
                                <span style="float:right;">
                                    <div style="float:left;font-size:20px">
                                    <a href="<?php echo $this->Html->url('/usermgmt/Users/oauth2Login/weibo');?>" data-original-title="facebook" class=""><i class="fa fa-weibo"></i></a>
                                    </div>
                                </span>
                                <?php echo $this->Form->end(); ?>
                                <div class="form-group">
                                <span class="pull-right"><a href="<?php echo Router::url('/')?>register?tag=test&redirect2=<?php echo $this->Html->url(null, true);?>">注册</a></span><span><a href="#" mark="todo">忘记密码？</a></span>
                                </div>
                                <!--
                                <hr class="clear-hr" style="margin:5px 0 5px 0px;"></hr>
                                <div id="wb_connect_btn" style="text-align:center">
                                    <wb:login-button type="2,2" onlogin="login" onlogout="logout">登录按钮</wb:login-button>
                                </div>
                                -->
                            </div>
                        <?php }?>
                      </li>
                    </ul>
