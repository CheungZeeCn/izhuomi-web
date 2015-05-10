    <div id='leftMenuDiv' class="span2 well sidebar-menu marginTop56">
        <ul id='leftMenuList' class="nav  nav-stacked nav-list nav-pills" role="tablist" data-role="navbar" style>
			<?php 
            if ($this->UserAuth->getGroupName()=='Admin') { ?>
                <li class="<?php echo $this->UserNavBar->getIfActiveActionClass('addUser')?>">
                    <?php echo $this->Html->link('添加用户', '/addUser');?>
                </li>
                <li class="<?php echo $this->UserNavBar->getIfActiveClass('users', 'index')?>">
                    <?php echo $this->Html->link('用户列表', '/allUsers');?>
                </li>
                <li class="<?php echo $this->UserNavBar->getIfActiveActionClass('addGroup')?>">
                    <?php echo $this->Html->link('添加群组', '/addGroup');?>
                </li>
                <li class="<?php echo $this->UserNavBar->getIfActiveClass('user_groups', 'index')?>">
                    <?php echo $this->Html->link('群组列表', '/allGroups');?>
                </li>
                <li class="<?php echo $this->UserNavBar->getIfActiveClass('user_group_permissions', 'index')?>">
                    <?php echo $this->Html->link('群组权限控制', '/permissions');?>
                </li>
                <!--
                <li class="<?php echo $this->UserNavBar->getIfActiveActionClass('', '')?>">
                    <?php echo $this->Html->link('修改个人信息', '/editUser/'.$this->UserAuth->getUserId());?>
                </li>
                -->
			<?php   } ?>
                <li class="<?php echo $this->UserNavBar->getIfActiveActionClass('', '')?>">
                    <?php echo $this->Html->link('修改密码', '/changePassword', array('target'=>'_blank'));?>
                </li>
                <li class="<?php echo $this->UserNavBar->getIfActiveActionClass('', '')?>">
                    <?php echo $this->Html->link('我的主页', '/myprofile', array('target'=>'_blank'));?>
                </li>
                <li class="<?php echo $this->UserNavBar->getIfActiveActionClass('', '')?>">
                    <?php echo $this->Html->link('设置头像', "/IzUsersLogos/show", array('target'=>'_blank'));?>
                </li>
            <li>&nbsp;</li>
        </ul> 
    </div>

