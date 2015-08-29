<?php

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
#$cakeDescription = __d('cake_dev', 'i.啄米');
#$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<?php echo $this->Html->docType() . "\n";  ?> 
<html xmlns:wb="http://open.weibo.com/wb">
<head>
	<?php echo $this->Html->charset(); //shold be utf-8 ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="izhuomi.com, JiaYouO">
    <meta name="author" content="cheungzeecn@gmail.com">
    <!--  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />-->


	<?php
        //todo, add it like cakephp do later
        echo $this->Html->meta('icon');
        //bootstrap
	    //echo $this->Html->css(array('jquery.mobile-1.4.2'));

	    echo $this->Html->css(array('themes/my-custom-theme.css'));
        echo $this->Html->css('font-awesome.min');
	    echo $this->Html->css(array('themes/jquery.mobile.icons.min.css'));
	    echo $this->Html->css(array('jquery.mobile.structure-1.4.2'));
	    echo $this->Html->css(array('bootstrap', 'voa_template', 'blog'));
        echo $this->Html->css('/usermgmt/css/umstyle'); 
	    echo $this->Html->css('basic');
	    //echo $this->Html->css(array('../dist/css/bootstrap.css'));
	    //echo $this->Html->css(array('../dist/css/bootstrap-theme.css'));
        //title
        if(!isset($websiteTitle)) {$websiteTitle = 'i.啄米 让指尖读懂英语';}
        echo "<title>$websiteTitle</title>";

		//echo $this->Html->css('cake.generic');

		//echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');
		echo $this->Html->script("jquery-1.11.0.min"); 
		echo $this->Html->script("basic"); ?>
        <script type="text/javascript">
            $(document).bind("mobileinit", function () {
                $.mobile.ajaxEnabled = false;
            });
        </script>
        <?php
		echo $this->Html->script("jquery.mobile-1.4.2.js");
		echo $this->Html->script(array("hammer", "common"));
        echo $this->Html->script("../dist/js/bootstrap.min.js");
        if(!(isset($turnOffThePlayer) && $turnOffThePlayer==true)) {
            echo $this->Html->script("player/js/jquery.jplayer.min.js");           
            echo $this->Html->script("player/js/jquery.transform2d.js");
            echo $this->Html->script("player/js/jquery.grab.js");
            echo $this->Html->script("player/js/mod.csstransforms.min.js");
            echo $this->Html->script("player/js/circle.player.js");
            echo $this->Html->css("player/skin/circle.skin/circle.player");           
            $mp3File = $this->Html->url("/".$mp3Url);
            $code = <<<CODE
            $.mobile.loadingMessageTextVisible = false;
$(document).ready(function(){
	var myCirclePlayer = new CirclePlayer("#jquery_jplayer_1",
	{
		mp3:'$mp3File',
	}, {
		cssSelectorAncestor: "#cp_container_1",
		swfPath: "js",
		wmode: "window",
		keyEnabled: true
	});
    window.myCirclePlayer = myCirclePlayer;
    console.log("hello ");
});
CODE;
            $this->Html->scriptBlock($code, array('inline'=>false, 'block'=>'player'));
            echo $this->fetch('player');
        }
	?>
    <!--<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=3441774284" type="text/javascript" charset="utf-8"></script>
    -->
</head>
<body class="" onload="bodyDidLoad()">
	<div id="container">
		<div id="header">
            <div class="blog-masthead">
              <div class="container">
                <nav class="menu-nav">
                  <div class="menu-nav-sitename "> <a href="<?php echo $this->Html->url("/")?>"> i.啄米 </a>
                  </div>
                  <a class="pull-left" href="<?php echo $this->Html->url("/")?>">
                    <?php echo $this->Html->image('cake.icon.png', array('alt' => 'iZhuomi', 'class' => 'media-object')); ?>
                  </a>
                  <a class="menu-nav-item" href="<?php echo $this->Html->url("/IzArticles/show/")?>">阅读</a>
                  <a class="menu-nav-item" sytle="text-shadow: 0 0 0 #FFFFFF" href="<?php echo $this->Html->url("/IzWordbooks/")?>">笔记</a>
			      <a class="menu-nav-item " href="<?php echo $this->Html->url("/myprofile")?>">我的主页</a>

                    <?php echo $this->element('RightTopLogin', array(
                                '_username' => isset($_username)?$_username:NULL,
                            ));
                    ?>
                </nav>
              </div>
            </div>
		</div>

		<div id="content">

			<?php //echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>

		</div>
		<div id="footer">
			<!--<?php echo $this->Html->link(
					$this->Html->image('logo.png', array('alt' => $cakeDescription, 'border' => '0')),
					'http://izhuomi.com/',
					array('target' => '_blank', 'escape' => false, 'id' => 'logo')
				);
			?>-->
			<p>
				<?php //echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>

<script>

<?php if(isset($_username)) {?>
    g_cache['username'] = <?php echo "\"$_username\""; ?>
<?php }?>

(function($) {
  //var IS_IOS = /iphone|ipad|android|micromessenger/i.test(navigator.userAgent);
  var SHOULD_DISABLE = /android/i.test(navigator.userAgent.toLowerCase());
  $.fn.nodoubletapzoom = function() {
    if (SHOULD_DISABLE)
      $(this).bind('touchstart', function preventZoom(e) {
        var t2 = e.timeStamp
          , t1 = $(this).data('lastTouch') || t2
          , dt = t2 - t1
          , fingers = e.originalEvent.touches.length;
        $(this).data('lastTouch', t2);
        if (!dt || dt > 500 || fingers > 1) return; // not double-tap

        e.preventDefault(); // double tap - prevent the zoom
        // also synthesize click events we just swallowed up
        $(this).trigger('click').trigger('click');
      });
  };
})(jQuery);

</script>
</html>
