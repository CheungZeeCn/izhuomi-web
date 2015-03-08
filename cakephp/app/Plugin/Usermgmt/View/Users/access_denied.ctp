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
<div class="container" style="margin-top:20px">
	<div class="page-canvas">
		<div class="signup-wrapper">
            <div class="">
            <?php echo $this->Html->image("Usermgmt.accessDenied.jpg", array("style"=>"width:100%; margin-top:20px")); ?>
            <hr/>
            </div>
                <h3 class=''>无权限进入这个页面, 重新<?php echo $this->Html->link(__("登陆",true),"/login") ?>或返回<?php echo $this->Html->link(__("首页",true),"/") ?>?</h3>
                <?php 
                    $msg = $this->Session->flash();     
                    if($msg != NULL) { 
                        echo "<h4 class=''>$msg</h4>";
                    }
                ?>
        </div>
	</div>
</div>

