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
<?php echo $this->Session->flash(); ?>
<div class="container" style="box-sizing: border-box; margin-top:20px">
    <div class="column one-fourth vcard">
        <a class="vcard-avatar" href="#">
		<?php echo $this->Html->image($user['largeUserLogo'], 
                                    array('class'=> 'avatar', 
                                            'width'=>'230px', 
                                            'height'=>'230px', 
                                            'fullBase'=>true))?>
        </a>
        <h1 class="vcard-names">
            <span class="vcard-fullname"><?php echo $user['User']['first_name'] ?></span>
            <span class="vcard-username"><?php  echo $user['User']['username'] ?></span>
        </h1>
        <div class="vcard-stats" style="word-break:break-all;text-align:left">
        <h4> <span class="glyphicon glyphicon-user"></span> 简介 </h4>
        这是我的一个测试账号, 我是这里管理员， 有投诉或者建议请发往cheungzeecn@gmail.com. 非常感谢。
        </div>
        <ul class="vcard-details">
            <li class="vcard-detail"><span class="octicon glyphicon glyphicon-envelope"></span><a href="mailto:Cheungzeecn@gmail.com" class="email">Cheungzeecn@gmail.com</a></li>
          
          <li class="vcard-detail"><span class="octicon glyphicon glyphicon-time"></span><span>Joined on <?php echo $user['User']['date_created'] ?></span></li>
        </ul>
        <div class="vcard-stats">
         <a href="/CheungZeeCn/followers" class="vcard-stat">
           <strong class="vcard-stat-count">123</strong>
            等级
         </a>
           <a href="/stars/CheungZeeCn" class="vcard-stat">
             <strong class="vcard-stat-count">456</strong>
             积分
           </a>
       </div> 
        <div class="vcard-social">
          <h4 class="vcard-social-h4"> <span class="glyphicon glyphicon-home" ></span> 找到我 </h4>
            <ul >
            <li class="octicon"><i class="fa fa-weibo fa-2x vcard-social-i"> </i> </li>
            <li class="octicon"><i class="fa fa-weixin fa-2x vcard-social-i"> </i> </li>
            <li class="octicon"><i class="fa fa-qq fa-2x vcard-social-i"> </i> </li>
            <li class="octicon"><i class="fa fa-twitter fa-2x vcard-social-i"> </i> </li>
            <li class="octicon"><i class="fa fa-facebook fa-2x vcard-social-i"> </i> </li>
            <li class="octicon"><i class="fa fa-github-alt fa-2x vcard-social-i"> </i> </li>
            <li class="octicon"><i class="fa fa-google fa-2x vcard-social-i"> </i> </li>
            </ul>
        </div>
    </div>
    <div class="column three-fourths">
    jdlksjafkdsflk
    </div>
</div>




<!--

<div class="umtop">
	<?php if($isMine) {echo $this->element('dashboard'); }?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('My Profile'); ?></span>
				<span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home",true),"/") ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="index">
				<table cellspacing="0" cellpadding="0" width="100%" border="0" >
					<tbody>
			<?php       if (!empty($user)) { ?>
							<tr>
								<td><strong><?php echo __('User Id');?></strong></td>
								<td><?php echo $user['User']['id']?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('User Group');?></strong></td>
								<td><?php echo h($user['UserGroup']['name'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Username');?></strong></td>
								<td><?php echo h($user['User']['username'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('First Name');?></strong></td>
								<td><?php echo h($user['User']['first_name'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Last Name');?></strong></td>
								<td><?php echo h($user['User']['last_name'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Email');?></strong></td>
								<td><?php echo h($user['User']['email'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Email Verified');?></strong></td>
								<td><?php
										if ($user['User']['email_verified']) {
											echo 'Yes';
										} else {
											echo 'No';
										}
									?>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo __('Status');?></strong></td>
								<td><?php
										if ($user['User']['active']) {
											echo 'Active';
										} else {
											echo 'Inactive';
										}
									?>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo __('Created');?></strong></td>
								<td><?php echo date('d-M-Y',strtotime($user['User']['created']))?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Small Logo');?></strong></td>
								<td><?php echo $this->Html->image($user['smallUserLogo'], array('alt'=>'urSmallLogo', 'fullBase'=>true))?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Large Logo');?></strong></td>
								<td><?php echo $this->Html->image($user['largeUserLogo'], array('alt'=>'urLargeLogo', 'fullBase'=>true))?></td>
							</tr>
				<?php   } else {
							echo "<tr><td colspan=2><br/><br/>No Data</td></tr>";
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>
-->
