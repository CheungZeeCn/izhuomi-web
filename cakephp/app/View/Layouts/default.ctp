<?php

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
#$cakeDescription = __d('cake_dev', 'i.啄米');
#$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); //shold be utf-8 ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="/bs/cakephp/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/bs/cakephp/css/voa_template.css" rel="stylesheet">
    <link href="/bs/cakephp/css/blog.css" rel="stylesheet">

	<?php
		//echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		//echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');
	?>
<!-- Website Design By: www.happyworm.com -->
<title>Demo : jPlayer circle player</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="/bs/cakephp/jQuery.jPlayer.2.6.0.demos/skin/circle.skin/circle.player.css">
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/bs/cakephp/jQuery.jPlayer.2.6.0.demos/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/bs/cakephp/jQuery.jPlayer.2.6.0.demos/js/jquery.transform2d.js"></script>
<script type="text/javascript" src="/bs/cakephp/jQuery.jPlayer.2.6.0.demos/js/jquery.grab.js"></script>
<script type="text/javascript" src="/bs/cakephp/jQuery.jPlayer.2.6.0.demos/js/mod.csstransforms.min.js"></script>
<script type="text/javascript" src="/bs/cakephp/jQuery.jPlayer.2.6.0.demos/js/circle.player.js"></script>

<script type="text/javascript" src="/bs/cakephp/js/common.js"></script>

<script type="text/javascript">
//<![CDATA[

$(document).ready(function(){

	/*
	 * Instance CirclePlayer inside jQuery doc ready
	 *
	 * CirclePlayer(jPlayerSelector, media, options)
	 *   jPlayerSelector: String - The css selector of the jPlayer div.
	 *   media: Object - The media object used in jPlayer("setMedia",media).
	 *   options: Object - The jPlayer options.
	 *
	 * Multiple instances must set the cssSelectorAncestor in the jPlayer options. Defaults to "#cp_container_1" in CirclePlayer.
	 *
	 * The CirclePlayer uses the default supplied:"m4a, oga" if not given, which is different from the jPlayer default of supplied:"mp3"
	 * Note that the {wmode:"window"} option is set to ensure playback in Firefox 3.6 with the Flash solution.
	 * However, the OGA format would be used in this case with the HTML solution.
	 */

	var myCirclePlayer = new CirclePlayer("#jquery_jplayer_1",
	{
		//m4a: "http://www.jplayer.org/audio/m4a/Miaow-07-Bubble.m4a",
		//oga: "http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
		mp3: "/bs/izhuomi-data/201306/aaa/content.mp3",
		//oga: "http://localhost/bs/izhuomi-data/201306/aaa/content.ogg",
		//oga: "http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
	}, {
		cssSelectorAncestor: "#cp_container_1",
		swfPath: "js",
		wmode: "window",
		keyEnabled: true
	});
    window.myCirclePlayer = myCirclePlayer;
});
//]]>
</script>
	<title>
		<?php //echo $cakeDescription ?>
		<?php //echo $title_for_layout; ?>
        i.啄米: 广告语
	</title>


</head>
<body onload="bodyDidLoad()">
	<div id="container">
		<div id="header">
            <div class="blog-masthead">
              <div class="container">
                <nav class="menu-nav">
                  <div class="menu-nav-sitename "> <a  href="#">i.啄米</a>
                  </div>
                  <a class="pull-left" href="#">
                    <img class="media-object" src="/bs/cakephp/img/cake.icon.png" alt="logo">
                  </a>
                  <a class="menu-nav-item active" href="#">阅读</a>
                  <a class="menu-nav-item" href="#">笔记</a>
			      <a class="menu-nav-item " href="#">我的主页</a>
                </nav>
              </div>
            </div>
		</div>

		<div id="content">

			<?php echo $this->Session->flash(); ?>

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
</html>
