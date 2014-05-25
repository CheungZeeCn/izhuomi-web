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
                    <p class="lead blog-description"><?php echo "from: ".$classification." | time: ".$time_create?></p>
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
            <?php echo $abstract ?>
            </div>

            <hr class="clear-hr">

            <div class="content cp-content-div-default unread">
            <?php echo $data ?>
            </div>
          </div><!-- /.blog-post -->

          <ul class="pager">
            <li><a href="#">随便读</a></li>
            <li><a href="#">下一篇</a></li>
          </ul>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            It's a web page for demonstrating the izhuomi's interaction. <br/>
            这个样例页面用以展示i.啄米的功能.

          </div>
          <div class="sidebar-module">
            <h4>以往发布</h4>
            <ol class="list-unstyled">
              <li><a href="#">2014 年 5 月</a></li>
              <li><a href="#">2014 年 4 月</a></li>
            </ol>
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

    </div><!-- /.container -->


