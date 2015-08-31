<?php
//echo $this->Html->script("d3.v3.min.js");
//echo $this->Html->css("cal-heatmap.css");
//echo $this->Html->script("cal-heatmap.min.js");
echo $this->Html->script("Usermgmt.umupdate");

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
            <div style="display:inline-block;width:75%">
            <span class="vcard-fullname"><?php echo $user['User']['first_name'] ?></span>
            <span class="vcard-username"><?php  echo $user['User']['username'] ?></span>
            </div>
            <div style="display:inline-block; float:right">
            <?php if($isMine){?>
            <span type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                修改
            </span> 
            <?php } ?>
            </div>
        </h1>
        <div class="vcard-stats" style="word-break:break-all;text-align:left">
        <h4> <span class="glyphicon glyphicon-user"></span> 简介 
        </h4>
        <div class='editable_textarea'><?php echo $user['UserProfile']['self_intro']; ?></div>
        </div>
        <ul class="vcard-details">
            <li class="vcard-detail"><span class="octicon glyphicon glyphicon-envelope"></span><a href="mailto:<?php echo $user['User']['email']; ?>" class="email"> <?php echo  $user['User']['email'];?></a></li>
          
          <li class="vcard-detail"><span class="octicon glyphicon glyphicon-time"></span><span>Joined on <?php echo $user['User']['date_created'] ?></span></li>
        </ul>
        <!--
        <div class="vcard-stats">
         <a href="" class="vcard-stat">
           <strong class="vcard-stat-count">123</strong>
            等级
         </a>
           <a href="" class="vcard-stat">
             <strong class="vcard-stat-count">456</strong>
             积分
           </a>
       </div> 
       -->
        <div class="vcard-social">
          <h4 class="vcard-social-h4"> <span class="glyphicon glyphicon-home" ></span> 找到我 </h4>
            <ul >
            <li data-toggle="tooltip" title=<?php echo "'weibo: {$user['UserProfile']['weibo']}'"; ?> class="octicon"><i class='fa fa-weibo fa-2x <?php if(strlen($user['UserProfile']['weibo'])) echo 'sns-on';?> '> </i> </li>
            <li data-toggle="tooltip" title=<?php echo "'wechat: {$user['UserProfile']['wechat']}'"; ?> class="octicon"><i class="fa fa-weixin fa-2x <?php if(strlen($user['UserProfile']['wechat'])) echo 'sns-on';?> "> </i> </li>
            <li cdata-toggle="tooltip" title=<?php echo "'QQ: {$user['UserProfile']['qq']}'"; ?> class="octicon"><i class="fa fa-qq fa-2x <?php if(strlen($user['UserProfile']['qq'])) echo 'sns-on';?> "> </i> </li>
            <!--
            <li class="octicon"><i class="fa fa-twitter fa-2x vcard-social-i"> </i> </li>
            <li class="octicon"><i class="fa fa-facebook fa-2x vcard-social-i"> </i> </li>
            <li class="octicon"><i class="fa fa-github-alt fa-2x vcard-social-i"> </i> </li>
            <li class="octicon"><i class="fa fa-google fa-2x vcard-social-i"> </i> </li>
            -->
            </ul>
        </div>
    </div>
    <div class="column three-fourths">
        <div class="profile-notes" style="word-break:break-all;text-align:left">
            <h4> <span style="font-size:30px" class="glyphicon glyphicon-bookmark"></span> 足迹 </h4>
            <div style="wdith:100%; ">
                <ul class="repolist js-repo-list">
                    <!--
                    <li class="public source">   
                        当前目标(好吧，这个功能也在开发中) <br />
                            7天内，完成难度为x的阅读3篇， 已完成1篇，还剩下2天
                    </li>
                    <li class="public source">   
                        战绩 (也是还没有实现的)<br/>
                            完成目标11个， 平均一周阅读3篇。    
                    </li>
                    -->
                    <li class="public source">   
                        <?php 
                            if($lastReadingProgress != NULL) {
                                $v = $lastReadingProgress['IzUserLastReadingProgress'];
                                $articleName = $v['article_name'];
                                $articleId = $v['article_id'];
                                $sentences = $v['last_reading_sentences'];
                                $wordId = $v['last_step_word_id'];
                                $url = $this->Html->url("/IzArticles/show/{$articleId}?last_step_word_id=$wordId");
                                echo __("上次读到") . " <a href='$url'> $articleName </a> " . __("中的") . 
                                    "<br /> <p style='word-wrap: break-word;'>{$sentences}</p> ";
                             } else {
                                $url = $this->Html->url("/IzArticles/show/");
                                echo __("暂时还没有最近的阅读记录").
                                    "<br /> <p style='word-wrap: break-word;'> 先来一篇读读看？ <a href='$url'> <span class='glyphicon glyphicon-play'></span> </a></p> ";
                                
                             }


                        ?>
                    </li>
                </ul>
            </div>

        <div id="izhuomi-heatmap" class="boxed-group flush"> 
            <h3> <?php echo "{$user['User']['username']}的持久力"?> </h3>
            <div id="contributions-calendar" class="boxed-group-inner">
                <!--
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
                -->
                <div class="contrib-details">
                    <div class="table-column contrib-day">
                      <span class="lbl">累计完成文章</span>
                      <span class="num">共 <?php echo $userDoneArticlesCount; ?> 篇</span>
                      <?php 
                        $rank = $userRanks['IzUserRank']['article_done_rank'];
                        if($rank == NULL or $rank <=0 ) {
                            echo __("暂无排名"); 
                        } else {
                            echo __("排名第")."<span style='color:orange;font-size:14px'> {$rank} </span> ";
                        }
                      ?>
                    </div>
                    <div class="table-column contrib-streak">
                      <span class="lbl">最长持续天数</span>
                        <?php 
                            echo $this->Html->tag('span', 
                                "{$lastingDays['IzUserLastingDay']['max_lasting_days']}", 
                                array('class' =>'num')
                            );
                            $beginDay = $this->Time->format($lastingDays['IzUserLastingDay']['max_begin_day'], '%b. %d');
                            $endDay = $this->Time->format($lastingDays['IzUserLastingDay']['max_end_day'], '%b. %d');
                            
                            echo "{$beginDay} - {$endDay}";
                        ?>
                    </div>
                    <div class="table-column contrib-streak-current">
                      <span class="lbl">当前持续天数</span>
                        <?php 
                            echo $this->Html->tag('span', 
                                "{$lastingDays['IzUserLastingDay']['now_lasting_days']} 连击", 
                                array('class' =>'num')
                            );
                            $beginDay = $this->Time->format($lastingDays['IzUserLastingDay']['now_begin_day'], '%b. %d');
                            $endDay = $this->Time->format($lastingDays['IzUserLastingDay']['now_end_day'], '%b. %d');
                            
                            echo "{$beginDay} - {$endDay}";
                        ?>
                    </div>
                </div> 
        </div>
    </div> <!-- end izhuomi-heatmap -->
            
            <div class="columns popular-repos">
                <div class="single-column">
                        <div class="boxed-group flush">
                            <h3>美句摘录 <span style="float:right"><a href="<?php echo $this->Html->url('/IzUserDigests');?> ">More >> </a></span></h3>
                            <ul class="boxed-group-inner repo-list">
                                <?php 


                                    foreach($userDigests as $v) {
                                        $url = $this->Html->url("/IzArticles/show/{$v['IzUserDigest']['article_id']}");
                                        echo <<<EOS
                                        <li class="public source repo-list-item" style="padding:5px">
                                              <div class="note-sent-content" style="">
                                                {$v['IzUserDigest']['digest']}
                                              </div>
                                              <span class="glyphicon glyphicon-paperclip"></span> 出自 <a style="" href="{$url}">{$v['IzArticle']['name']}</a>
                                        </li>
EOS;
                                    }
                                    if(count($userDigests) == 0) {
                                        $url = $this->Html->url("/IzArticles/show/");
                                        echo <<<EOS
                                        <li class="public source repo-list-item" style="padding:5px">
                                              <div class="note-sent-content" style="">
                                                你暂时还没有摘录过美句啊( ⊙ o ⊙ ), 要不要赶紧在<a href="{$url}">阅读页面</a>试试这个功能?
                                              </div>
                                              <span class="glyphicon glyphicon-paperclip"></span> (๑´灬`๑)  <a style="margin-left:3px" href="{$url}">去消灭零蛋</a>
                                        </li>
EOS;

                                    }
                                ?>
                            </ul>
                        </div>
                </div> 
            </div>
        </div>

</div>

<!-- Button trigger modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">修改个人信息</h4>
      </div>

	<?php echo $this->Form->create('User'); ?>
      <div class="modal-body">
                    <div class="form-group">
                        <?php echo $this->Form->input('first_name', 
                            array('type'=>'', 'maxlength'=>'16', 'value'=>"{$user['User']['first_name']}", 'placeholder'=>'', 'label'=>'姓名<font color="red">(必填，最长16个字)</font>', 'class'=>'form-control'));
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
      </div>
      <div class="modal-footer">
        <div class="alert" role="alert" id='updateMsgReturn' style="display:none" ></div>
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button class="btn btn-lg btn-primary btn-shadow" style="width:100px" role="button">提交修改 </button>
      </div>
	<?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>

<script>

var form =  $("#UserMyprofileForm");
form.submit(function() {
    var url = "<?php echo $this->Html->url("updateMyProfile_ajax.json");?>"; 
    var data = form.serialize();
    console.log(url);
    $.ajax({
        type:'POST',
        url: url,
        data:data,
    }).done(function(data){
        console.log("get the data");
        console.log(data );
        if(data.status == 'OK'){
            $('#updateMsgReturn').attr("class", "alert-success alert");
            $('#updateMsgReturn').text("修改成功 ");
            $('#updateMsgReturn').show();
            //setTimeout 500ms  //refresh()
            setTimeout(function() {
                window.location.reload();
            }
            , 800);
            
        } else if (data.msg != undefined) {
            $('#updateMsgReturn').attr("class", "alert-danger alert");
            $('#updateMsgReturn').text(data.msg);
            $('#updateMsgReturn').show();
        } else {
            $('#updateMsgReturn').attr("class", "alert-danger alert");
            $('#updateMsgReturn').text("失败，服务器错");
            $('#updateMsgReturn').show();
        }
    }).fail(function(data){ 
            $('#updateMsgReturn').attr("class", "alert-danger alert");
            $('#updateMsgReturn').text('失败, 服务器错');
    });
    //$('#myModal').close();
    
    return false;
});

</script>

