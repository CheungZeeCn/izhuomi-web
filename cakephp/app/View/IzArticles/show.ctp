    <script type="text/javascript">
        window.articleId = <?php echo $id ?>;
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

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            It's a web page for demonstrating the izhuomi's interaction. <br/>
            这个样例页面用以展示i.啄米的功能.
            [后续这个地方放‘赞’相关统计, 以及分享按钮]

          </div>
          <div class="blog-sidebar">
            <h4>更多来自: <?php echo $this->Html->link($classificationCn, "#"); ?></h4>
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
          <div class="sidebar-module">
            <h4>来这里打个招呼吧</h4>
            <ol class="list-unstyled">
              <li><a href="#">微博 Weibo</a></li>
              <li><a href="#">微信 WeChat</a></li>
              <li><a href="#">AppStore</a></li>
              <li><a href="#">Google Play</a></li>
            </ol>
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
