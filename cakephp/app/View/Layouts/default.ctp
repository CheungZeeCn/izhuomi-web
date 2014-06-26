<?php

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
#$cakeDescription = __d('cake_dev', 'i.啄米');
#$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<?php echo $this->Html->docType() . "\n";  ?> 
<html>
<head>
	<?php echo $this->Html->charset(); //shold be utf-8 ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="izhuomi.com, JiaYouO">
    <meta name="author" content="cheungzeecn@gmail.com">

	<?php
        //todo, add it like cakephp do later
        echo $this->Html->meta('icon');
        //bootstrap
	    //echo $this->Html->css(array('jquery.mobile-1.4.2'));

	    echo $this->Html->css(array('themes/my-custom-theme.css'));
	    echo $this->Html->css(array('themes/jquery.mobile.icons.min.css'));
	    echo $this->Html->css(array('jquery.mobile.structure-1.4.2'));
	    echo $this->Html->css(array('bootstrap.min', 'voa_template', 'blog'));
	    //echo $this->Html->css(array('../dist/css/bootstrap.css'));
	    //echo $this->Html->css(array('../dist/css/bootstrap-theme.css'));
        //title
        if(!isset($websiteTitle)) {$websiteTitle = 'i.啄米 让指尖读懂英语';}
        echo "<title>$websiteTitle</title>";

		//echo $this->Html->css('cake.generic');

		//echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');
		echo $this->Html->script("jquery-1.11.0.min.js"); ?>
        <script type="text/javascript">
            $(document).bind("mobileinit", function () {
                $.mobile.ajaxEnabled = false;
            });
        </script>
        <?php
		echo $this->Html->script(array("hammer", "common"));
        echo $this->Html->script("../dist/js/bootstrap.min.js");
		echo $this->Html->script("jquery.mobile-1.4.2.js");
        if(!(isset($turnOffThePlayer) && $turnOffThePlayer==true)) {
            echo $this->Html->script("player/js/jquery.jplayer.min.js");           
            echo $this->Html->script("player/js/jquery.transform2d.js");
            echo $this->Html->script("player/js/jquery.grab.js");
            echo $this->Html->script("player/js/mod.csstransforms.min.js");
            echo $this->Html->script("player/js/circle.player.js");
            echo $this->Html->css("player/skin/circle.skin/circle.player");           
            $mp3File = "../../izhuomi-data/201306/aaa/content.mp3";
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
});
CODE;
            $this->Html->scriptBlock($code, array('inline'=>false, 'block'=>'player'));
            echo $this->fetch('player');
        }
	?>

</head>
<body class="" onload="bodyDidLoad()">
	<div id="container">
		<div id="header">
            <div class="blog-masthead">
              <div class="container">
                <nav class="menu-nav">
                  <div class="menu-nav-sitename "> <a href="#"> i.啄米 </a>
                  </div>
                  <a class="pull-left" href="http://izhuomi.com">
                    <?php echo $this->Html->image('cake.icon.png', array('alt' => 'iZhuomi', 'class' => 'media-object')); ?>
                  </a>
                  <a class="menu-nav-item" href="#">阅读</a>
                  <a class="menu-nav-item" sytle="text-shadow: 0 0 0 #FFFFFF" href="#">笔记</a>
			      <a class="menu-nav-item " href="#">我的主页</a>

                  
                    <ul class="nav pull-right">
                      <li class="dropdown" id="menuLogin">
                        <?php if(isset($_username)){?> 
                            <a class="dropdown-toggle menu-nav-item" href="#" data-toggle="dropdown" id="navLogin"><?php echo "Hi, $_username "?><span class="caret"></span></a>
                            <ul class="dropdown-menu" style="padding:2px;left:auto;right:0;">
                                <li><a href="<?php echo $this->Html->url("/IzPersonInfo/setting", true); ?>">设置个人信息(todo)</a></li>
                                <li><a href="<?php echo $this->Html->url("/IzUsers/logout", true); ?>">退出</a></li>
                            </ul>

                        <?php } else { ?>
                            <a class="dropdown-toggle menu-nav-item" href="#" data-toggle="dropdown" id="navLogin">Login</a>
                            <div class="dropdown-menu" style="padding:20px;left:auto;right:0;width:250px">
                                <?php echo $this->Form->create('IzUser', array('url'=>'/IzUsers/login?redirect2='.urlencode($this->Html->url(null, true)), 'data-ajax' => 'false')); ?>
                                    <fieldset>
                                        <?php 
                                        echo $this->Form->input('username');
                                        echo $this->Form->input('password');
                                        ?>
                                    </fieldset>
                                <?php echo $this->Form->end(__('login')); ?>
                                <div class="form-group">
                                <span class="pull-right"><a href="<?php echo Router::url('/')?>IzUsers/reg?tag=test&redirect2=<?php echo $this->Html->url(null, true);?>">Register</a></span><span><a href="#" mark="todo">help?</a></span>
                                </div>
                            </div>
                        <?php }?>
                      </li>
                    </ul>
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
</html>
