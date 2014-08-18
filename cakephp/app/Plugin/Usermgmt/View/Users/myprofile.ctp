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
echo $this->Html->script("d3.v3.min.js");
echo $this->Html->css("cal-heatmap.css");
echo $this->Html->script("cal-heatmap.min.js");

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
        <div class="profile-notes" style="word-break:break-all;text-align:left">
            <h4> <span style="font-size:30px" class="glyphicon glyphicon-bookmark"></span> 足迹 </h4>
            <div style="wdith:100%; ">
                <ul class="repolist js-repo-list">
                    <li class="public source">   
                        当前承诺 <br />
                            7天内，完成难度为x的阅读3篇， 已完成1篇，还剩下2天
                    </li>
                    <li class="public source">   
                        已完成承诺 <br/>
                            完成11个， 平均一周阅读3篇。    
                    </li>
                    <li class="public source">   
                        上次读到 xxxx 中的 <br />
                            She walks in beauty.
                    </li>
                </ul>
            </div>
            
            <div class="columns popular-repos">
                <div class="single-column">
                        <div class="boxed-group flush">
                            <h3>美句摘录</h3>
                            <ul class="boxed-group-inner repo-list">
                                <li class="public source repo-list-item" style="padding:5px">
                                      <div class="note-sent-content" style="">
                                        At the University of Michigan in Ann Arbor he spoke about creating smarter and better government. He also spoke at Hampton University, a historically black university in Virginia. And he spoke at the United States Military Academy at West Point, New York.
                                      </div>
                                      <span class="glyphicon glyphicon-paperclip"></span> 出自 <a style="" href="<?php echo $this->Html->url('/IzArticles/show/2');?>">BBB</a>
                                </li>
                                <li class="public source repo-list-item" style="padding:5px">
                                      <div class="note-sent-content" style="">
                                        At the University of Michigan in Ann Arbor he spoke about creating smarter and better government. He also spoke at Hampton University, a historically black university in Virginia. And he spoke at the United States Military Academy at West Point, New York.
                                      </div>
                                      <span class="glyphicon glyphicon-paperclip"></span> 出自 <a style="" href="<?php echo $this->Html->url('/IzArticles/show/2');?>">BBB</a>
                                </li>
                                <li class="public source repo-list-item" style="padding:5px">
                                      <div class="note-sent-content" style="">
                                        At the University of Michigan in Ann Arbor he spoke about creating smarter and better government. He also spoke at Hampton University, a historically black university in Virginia. And he spoke at the United States Military Academy at West Point, New York.
                                      </div>
                                      <span class="glyphicon glyphicon-paperclip"></span> 出自 <a style="" href="<?php echo $this->Html->url('/IzArticles/show/2');?>">BBB</a>
                                </li>
                            </ul>
                        </div>
                </div> 
            </div>
        </div>

        <div id="izhuomi-heatmap" class="boxed-group flush">
            <h3> <?php echo "{$user['User']['username']}的持久力"?> </h3>
            <div id="contributions-calendar" class="boxed-group-inner">
                <div class="js-graph js-calendar-graph graph-canvas calendar-graph" data-url="">

                    <div style="position:auto; margin-left:5px; margin-bottom:5px;" id="cal-heatmap"></div>
                    <script type="text/javascript">
                        var cal = new CalHeatMap();
                        cal.init({ cellSize: 9,
                                    domain: 'month',
                                    domainGutter: 0,
                                    label: {
                                        position: "top"
                                    },
                                    domainLabelFormat: "%b"
                                    });
                    </script>
                </div>
                <div class="contrib-details">
                    <div class="table-column contrib-day">
                      <span class="lbl">累计完成文章</span>
                      <span class="num">共 67 篇</span>
                      排名第11
                    </div>
                    <div class="table-column contrib-streak">
                      <span class="lbl">最长持续天数</span>
                        <span class="num">10 连击</span>
                        October 04 -
                        October 14
                    </div>
                    <div class="table-column contrib-streak-current">
                      <span class="lbl">当前持续天数</span>
                        <span class="num">2 连击</span>
                        August 15 -
                        August 16
                    </div>
                </div> 
        </div>
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
