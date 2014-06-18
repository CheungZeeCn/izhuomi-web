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
	    echo $this->Html->css(array('jquery.mobile.structure-1.4.2'));
	    echo $this->Html->css(array('bootstrap.min', 'voa_template', 'blog'));
        //title
        if(!isset($websiteTitle)) {$websiteTitle = 'i.啄米 让指尖读懂英语';}
        echo "<title>$websiteTitle</title>";
		echo $this->Html->script("jquery-1.11.0.min.js");
	?>

</head>
<?php echo $this->fetch('content'); ?>
</html>
