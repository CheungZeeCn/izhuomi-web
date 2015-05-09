<?php

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
#$cakeDescription = __d('cake_dev', 'i.啄米');
#$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<?php echo $this->Html->docType() . "\n";  ?> 
<html xmlns:wb="http://open.weibo.com/wb">
<head>
	<?php echo $this->Html->charset(); //shold be utf-8 ?>
    <meta http-equiv="X-UA-Compatible" content="">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="description" content="izhuomi.com, JiaYouO">
    <meta name="author" content="cheungzeecn@gmail.com">


	<?php
        //todo, add it like cakephp do later
        echo $this->Html->meta('icon');
        //bootstrap
	    //echo $this->Html->css(array('jquery.mobile-1.4.2'));
        //icon
	    echo $this->Html->css('font-awesome');

	    //echo $this->Html->css(array('themes/my-custom-theme'));
	    //echo $this->Html->css(array('themes/jquery.mobile.icons.min'));
	    //echo $this->Html->css(array('jquery.mobile.structure-1.4.2'));
	    echo $this->Html->css(array('bootstrap', 
                    //'blog',
                    ));
	    //echo $this->Html->css(array('bootstrap', 'voa_template', 'blog'));
        //echo $this->Html->css('/usermgmt/css/umstyle2'); 
	    echo $this->Html->css('basic');
	    echo $this->Html->css(array('../dist/css/bootstrap.css'));
	    //echo $this->Html->css(array('../dist/css/bootstrap-theme.css'));
        //title
        if(!isset($websiteTitle)) {$websiteTitle = 'i.啄米 让指尖读懂英语';}
        echo "<title>$websiteTitle</title>";

		//echo $this->Html->css('cake.generic');

		//echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');
		echo $this->Html->script("jquery-1.11.0.min"); 
		echo $this->Html->script("jquery.jeditable"); 
		echo $this->Html->script("basic"); 
        ?>
        <script type="text/javascript">
            $(document).bind("mobileinit", function () {
                $.mobile.ajaxEnabled = false;
            });
        </script>
        <?php
            echo $this->Html->script("../dist/js/bootstrap.min.js");
        ?>
</head>
<body class="">
	<div id="container">
		<div id="header">
		</div>

		<div id="content">

			<?php //echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>

		</div>
		<div id="footer">
			<p>
			</p>
		</div>
	</div>
</body>
</html>
