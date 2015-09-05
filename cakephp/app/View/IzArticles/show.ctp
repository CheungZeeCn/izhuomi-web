    <script type="text/javascript">
        window.articleId = <?php echo $id; ?>;
        window.articleName = '<?php echo addslashes($name); ?>';
        window.wordId = <?php echo $wordId?$wordId:0 ;?>;
        window.myUserId = <?php echo $myUserId; ?>;
    </script>

    <div class="container">

      <!--<div class="blog-header">
        <h1 class="blog-title">Data id <?php echo $id ?></h1>
        <p class="lead blog-description"><?php echo "from: ".$classification." | time: ".$time_create?></p>
      </div>
      -->
      <div class="blog-header">
      </div>

      <div class="row">
        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <div > 
                <div class="article-title-div">
                    <h2 class="blog-post-title"><?php echo $name ?></h2>
                    <p class="lead blog-description">
                    <?php 
                        echo "分类: "; echo $this->Html->link($classification . "  ", "#"); 
                        echo "来自: ";
                        echo $this->Html->link(__('<span class="glyphicon glyphicon-globe"></span>'), $ori_url, array( 'escape' => false));  
                        echo " | 发布时间: ";
                        echo $this->Html->link($time_create, "#"); 
                    ?>
                    </p>
                </div> <!-- Title 1-->

                <div class="article-player-div">
                    <!-- The jPlayer div must not be hidden. Keep it at the root of the body element to avoid any such problems. -->
                    <div id="jquery_jplayer_1" class="cp-jplayer"></div>

                    <!-- The container for the interface can go where you want to display it. Show and hide it as you need. -->

                    <div id="cp_container_1" class="cp-container-2">
                        <div class="cp-buffer-holder"> <!-- .cp-gt50 only needed when buffer is > than 50% -->
                            <div class="cp-buffer-1"></div>
                            <div class="cp-buffer-2"></div>
                        </div>
                        <div class="cp-progress-holder"> <!-- .cp-gt50 only needed when progress is > than 50% -->
                            <div class="cp-progress-1"></div>
                            <div class="cp-progress-2"></div>
                        </div>
                        <div class="cp-circle-control"></div>
                        <ul class="cp-controls">
                            <li><a class="cp-play" tabindex="1">play</a></li>
                            <li><a class="cp-pause" style="display:none;" tabindex="1">pause</a></li> <!-- Needs the inline style here, or jQuery.show() uses display:inline instead of display:block -->
                        </ul>
                    </div>
                </div>

            </div> <!-- Title -->

            <div class="cp-abstract-div">
            <?php
            if(isset($contentPicUrl)) {
             ?>
                <div class="contentImage floatNone" style="width:100%">
                <div class="watermark">
             <?php
                echo "<img style='width:100%' src=";
                echo $this->Html->url("/".$contentPicUrl);
                echo " alt='";
                echo $contentPicCaption;
                echo "'";
                echo " >";
            ?>
                </div>
                <span class="imageCaption">
                    <?php 
                        echo $contentPicCaption;
                    ?>
                </span>
                </div>

            <?php
            }
            ?>
            </div>

            <hr class="clear-hr">

            <div class="content cp-content-div-default unread">
            <?php echo $data ?>
            </div>
          </div><!-- /.blog-post -->

          <ul class="pager">
            <li><?php   
                    if($preId) {
                        echo $this->Html->link(__('上一篇'), 
                                    array('controller' => 'IzArticles', 
                                    'action' => 'show',
                                    $preId)); 
                    } else {
                        echo $this->Html->link(__('已是最旧'), '#'); 
                    }
            ?></li>
            <li>
                <?php 
                    echo $this->Html->link(__('随便读'), 
                                array('controller' => 'IzArticles', 
                                'action' => 'show',
                                $randomId)); 
                ?>
            </li>
            <li><?php   
                    if($nextId) {
                        echo $this->Html->link(__('下一篇'), 
                                    array('controller' => 'IzArticles', 
                                    'action' => 'show',
                                    $nextId)); 
                    } else {
                        echo $this->Html->link(__('已是最新'), '#'); 
                    }
            ?></li>
          </ul>

        <hr class="margin1010"> </hr>
        <div id="post-comments">
            <h2> 评论 </h2>
            <div id="comment-list">
            <?php foreach($comments as $c) { ?>
                <div class="media" id=<?php echo "IzComment-".$c['IzComment']['id']; ?>>
                    <a class="pull-left" href="<?php echo $this->Html->url("/myprofile/{$c['User']['id']}");?>">
                    <img class="media-object" src="<?php echo $this->Html->url($c['UserLogo']['small_logo_addr']); ?>" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading comment-username"> <a href="<?php echo $this->Html->url("/myprofile/{$c['User']['id']}");?>" ><?php echo $c['User']['first_name']?></a>
                        <span>
                            <?php echo $c['IzComment']['created']; 
                                if($c['IzComment']['isMine']) {
                                    echo "/ <a onclick='deleteComment(\"{$c['IzComment']['id']}\")' href='#'>  删除 </a>";
                                }
                            ?>
                            
                        </span>
                        </h4>
                        <p>
                            <?php echo $c['IzComment']['body']; ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
            </div>

            <?php  if($myUserId) { ?>
            <span class="margin1010"></span>
            
            <div id="post-div" style="">
                <div class="media">
                    <a class="pull-left" href="<?php echo $this->Html->url("/myprofile/{$myUserId}");?>">
                    <img class="media-object" src="<?php echo $this->Html->url($myUserLogo); ?>" alt="">
                    </a>
                    <div class="media-body">
                        <textarea id="comment-input" rows="8" class="col-md-10 form-control"></textarea> 
                        <h4 class="media-heading"><span>
                            <button class="btn btn-primary btn-sm" data-role=none onclick="postComment('IzArticle', '<?php echo $id; ?>')">  留言 </button>
                        </span>
                        </h4>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div id="post-div" style="">
                <div class="media">
                    <div class="media-body">
                        <textarea id="comment-input" rows="8" class="col-md-10 form-control"></textarea> 
                        <h4 class="media-heading"><span>
                            <button class="btn btn-primary btn-sm" data-role=none >  请登陆后再留言 </button>
                        </span>
                        </h4>
                    </div>
                </div>
            </div>
            <?php }  ?>
        </div><!-- / id post-comments -->

        <hr class="margin1010"> </hr>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div style="display:block;padding:0px" class="sidebar-module sidebar-module-inset">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php echo $readNum ; ?> 
                        </div>
                        <div class="desc">
                             阅读量
                        </div>
                    </div>
                </div>            
                
                <div class="dashboard-stat blue" onclick="addArticleLike(<?php echo $id; ?>)">
                    <div class="visual" style="width:90px">
                        <i class="fa fa-thumbs-o-up"></i>
                    </div>
                    <div class="details">
                        <div class="number" id='likeNum'>
                            <?php echo $likeNum; ?>
                        </div>
                        <div class="desc">
                             点我+赞
                        </div>
                    </div>
                </div>            
          </div>

          <div class="blog-sidebar">
            <span>同分类阅读: <?php echo $this->Html->link($classificationCn, array( 'controller' =>'IzClassifications', 'action' =>'show', $cId)); ?></span>
            <span class="span20px"> </span>
            <ul class="list-unstyled">
                <?php  
                    foreach($sameCls as $a) {    
                ?>
                        <li >
                            <?php $a = $a['IzArticle'];
                            if(array_key_exists('zipPicUrl', $a)) { ?>
                                <img class="" style="width:100%" src="<?php echo $a['zipPicUrl']?>", alt="第一篇的缩略图, 如果有">
                                <br />
                            <?php }
                                echo $this->Html->link("<span class='glyphicon glyphicon-volume-up'></span>  {$a['name']}", 
                                            array('controller' => 'IzArticles', 'action' => 'show', $a['id']), 
                                            array("style"=>"color:#black", 'escape'=>False));
                            ?>
                                
                        </li>
                <?php 
                    }
                ?>
            </ul>
          </div>
            <!--
          <div class="sidebar-module">
            <h4>来这里打个招呼吧</h4>
            <ol class="list-unstyled">
              <li><a href="#">微博 Weibo</a></li>
              <li><a href="#">微信 WeChat</a></li>
              <li><a href="#">AppStore</a></li>
              <li><a href="#">Google Play</a></li>
            </ol>
          </div>
            -->
          <div class="sidebar-module ui-field-contain">
            <div class="form-group">
              <label >美句摘录:</label>
                <textarea  id='digest' data-role="none" style="padding:5px; border-radius:5px; width:100%; height:80px" rows="10" placeholder="拷贝你喜欢的句子到这里，然后点击摘录"></textarea>
            </div>
            <button id="digestButton" onclick="storeDigest($('#digest').val())"; return false" type="button" class="btn btn-info" data-role="none" style="width:100%;"> <span style="margin-right:2px" class="glyphicon glyphicon-floppy-saved"></span> 摘录 <span style="margin-left:2px" id='digestMsgReturn'></span></button>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->
        
     <div class="alert alert-success" data-role="popup" id="popupWordDict" style="max-width:350px; background-color:rgba(223,240,216,0.92);">
        <div id='wordMsg' style="font-size:18px">  
        
            </div>
      </div>

    

<!--
    <div data-role="popup" id="popupWordDict" data-overlay-theme="a" data-theme="a" data-corners="false" data-tolerance="15,15">
       <a href="#" data-rel="back" class="ui-btn ui-btn-b ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a> 
            <iframe id="wordIframe" src="#" width="250"  seamless="" style="border: medium;"></iframe>
    </div>
-->

    </div><!-- /.container -->
