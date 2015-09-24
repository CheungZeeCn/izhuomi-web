<?php 
    //echo $this->Html->css('jcarousel.connected-carousels');
    //echo $this->Html->script('jcarousel.connected-carousels');
    //echo $this->Html->css('jquery.mCustomScrollbar');
    //echo $this->Html->script('jquery.mCustomScrollbar.concat.min');
?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
<!--
                <div class="jcarousel">
                    <ul class="">
                        <li><img src="<?php echo $this->Html->url("/img/san-francisco.jpg"); ?>" alt="San Francisco, USA" data-description="Golden Gate Bridge"></li>
                        <li><img src="<?php echo $this->Html->url("/img/rio.jpg"); ?>" alt="Rio de Janeiro, Brazil"></li>
                        <li><img src="<?php echo $this->Html->url("/img/london_mini.jpg"); ?>" alt="" data-large-src="<?php echo $this->Html->url("/img/london.jpg"); ?>"></li>
                        <li><img src="<?php echo $this->Html->url("/img/new-york.jpg"); ?>" alt=""></li>
                    </ul>
                </div>
-->
            <div class="portlet light"> 
                <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                    <div class='carousel-outer'>
                        <!-- Wrapper for slides -->
                        <div class='carousel-inner'>
                            <div class='item active'>
                                <img src='<?php echo $this->Html->url("/img/san-francisco.jpg"); ?>' alt='' />
                            </div>
                            <div class='item'>
                                <img src='<?php echo $this->Html->url("/img/rio.jpg"); ?>' alt='' />
                            </div>
                            <div class='item'>
                                <img src='<?php echo $this->Html->url("/img/london.jpg"); ?>' alt='' />
                            </div>
                            <div class='item'>
                                <img src='<?php echo $this->Html->url("/img/new-york.jpg"); ?>' alt='' />
                            </div>
                            <div class='item'>
                                <img src='<?php echo $this->Html->url("/img/san-francisco.jpg"); ?>' alt='' />
                            </div>
                            <div class='item'>
                                <img src='<?php echo $this->Html->url("/img/rio.jpg"); ?>' alt='' />
                            </div>
                            <div class='item'>
                                <img src='<?php echo $this->Html->url("/img/london.jpg"); ?>' alt='' />
                            </div>
                            <div class='item'>
                                <img src='<?php echo $this->Html->url("/img/new-york.jpg"); ?>' alt='' />
                            </div>
                            <div class='item'>
                                <img src='<?php echo $this->Html->url("/img/san-francisco.jpg"); ?>' alt='' />
                            </div>
                            <div class='item'>
                                <img src='<?php echo $this->Html->url("/img/rio.jpg"); ?>' alt='' />
                            </div>
                            <div class='item'>
                                <img src='<?php echo $this->Html->url("/img/london.jpg"); ?>' alt='' />
                            </div>
                            <div class='item'>
                                <img src='<?php echo $this->Html->url("/img/new-york.jpg"); ?>' alt='' />
                            </div>
                        </div>
                            
                        <!-- Controls -->
                        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                            <span class='glyphicon glyphicon-chevron-left'></span>
                        </a>
                        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                            <span class='glyphicon glyphicon-chevron-right'></span>
                        </a>
                    </div>
                    
                    <!-- Indicators -->
                <div class="">
                    <div class="resource-owner">  
                            <div class="profile-userpic">
                                <img alt="" class="img-responsive" src="http://local.izhuomi.com/cakephp/v4.1.0/theme/assets/admin/pages/media/profile/profile_user.jpg">
                            </div>

                            <div class="floatLeft left-margin-20">
                                        <h3 class="profile-desc-title">作品名字</h3>
                                        <h4 class="profile-desc-title">作者</h4>
                                        <button class="btn btn-primary" type="button">联系</button>
                            </div>
                    </div>

                    <ol class='carousel-indicators mCustomScrollbar'>
                        <li data-target='#carousel-custom' data-slide-to='0' class='active'><img src='<?php echo $this->Html->url("/img/san-francisco.jpg"); ?>' alt='' /></li>
                        <li data-target='#carousel-custom' data-slide-to='1'><img src='<?php echo $this->Html->url("/img/rio.jpg"); ?>' alt='' /></li>
                        <li data-target='#carousel-custom' data-slide-to='2'><img src='<?php echo $this->Html->url("/img/london.jpg"); ?>' alt='' /></li>
                        <li data-target='#carousel-custom' data-slide-to='3'><img src='<?php echo $this->Html->url("/img/new-york.jpg"); ?>' alt='' /></li>
                        <li data-target='#carousel-custom' data-slide-to='4'><img src='<?php echo $this->Html->url("/img/san-francisco.jpg"); ?>' alt='' /></li>
                        <li data-target='#carousel-custom' data-slide-to='5'><img src='<?php echo $this->Html->url("/img/rio.jpg"); ?>' alt='' /></li>
                        <li data-target='#carousel-custom' data-slide-to='6'><img src='<?php echo $this->Html->url("/img/london.jpg"); ?>' alt='' /></li>
                        <li data-target='#carousel-custom' data-slide-to='7'><img src='<?php echo $this->Html->url("/img/new-york.jpg"); ?>' alt='' /></li>
                        <li data-target='#carousel-custom' data-slide-to='8'><img src='<?php echo $this->Html->url("/img/san-francisco.jpg"); ?>' alt='' /></li>
                        <li data-target='#carousel-custom' data-slide-to='9'><img src='<?php echo $this->Html->url("/img/rio.jpg"); ?>' alt='' /></li>
                        <li data-target='#carousel-custom' data-slide-to='10'><img src='<?php echo $this->Html->url("/img/london.jpg"); ?>' alt='' /></li>
                        <li data-target='#carousel-custom' data-slide-to='11'><img src='<?php echo $this->Html->url("/img/new-york.jpg"); ?>' alt='' /></li>
                    </ol>
                </div>
                <div class="clearfix"></div>

                </div>

            </div>
            <!-- END PORTLET 1-->

            <div class="portlet"> 
            <div class="col-md-8 padding-left-0">
            <!-- BEGIN PORTLET 2-->
                <div class="portlet light">
                    公司对这个case的简介      
                </div>
                <!-- END PORTLET 2-->
                <!-- BEGIN PORTLET 3-->
                <div class="portlet light">
                    相关报价   
                </div>
                <!-- END PORTLET 3-->
            </div>

            <!-- BEGIN PORTLET 4-->
            <div class="portlet light col-md-4">
                <h3 class="ng-binding">相似案例</h3> 
                <div class="row recommend-list clearfix"><!-- ngRepeat: item in resourceData.related_recommende -->
                    <a ng-repeat="item in resourceData.related_recommende" ng-click="getResource(item.id)" class="item ng-scope col-md-4">
                        <img ng-src="//dn-skypixel-image.qbox.me/uploads/newphotos/dd26f2bfa0546009a0903cc763352e86/128x128" src="//dn-skypixel-image.qbox.me/uploads/newphotos/dd26f2bfa0546009a0903cc763352e86/128x128"></a><!-- end ngRepeat: item in resourceData.related_recommende -->
                    <a ng-repeat="item in resourceData.related_recommende" ng-click="getResource(item.id)" class="item ng-scope col-md-4">
                        <img ng-src="//dn-skypixel-image.qbox.me/uploads/newphotos/8e1225bc1f7976371bb1b53ee0087564/128x128" src="//dn-skypixel-image.qbox.me/uploads/newphotos/8e1225bc1f7976371bb1b53ee0087564/128x128"></a><!-- end ngRepeat: item in resourceData.related_recommende -->
                    <a ng-repeat="item in resourceData.related_recommende" ng-click="getResource(item.id)" class="item ng-scope col-md-4">
                        <img ng-src="//dn-skypixel-image.qbox.me/uploads/newphotos/299665e5507f3a38a666a50ac05b4dc0/128x128" src="//dn-skypixel-image.qbox.me/uploads/newphotos/299665e5507f3a38a666a50ac05b4dc0/128x128"></a><!-- end ngRepeat: item in resourceData.related_recommende -->
                    <a ng-repeat="item in resourceData.related_recommende" ng-click="getResource(item.id)" class="item ng-scope col-md-4">
                        <img ng-src="//dn-skypixel-image.qbox.me/uploads/newphotos/e498bd1acc78065d14ee699a38be4311/128x128" src="//dn-skypixel-image.qbox.me/uploads/newphotos/e498bd1acc78065d14ee699a38be4311/128x128"></a><!-- end ngRepeat: item in resourceData.related_recommende -->
                    <a ng-repeat="item in resourceData.related_recommende" ng-click="getResource(item.id)" class="item ng-scope col-md-4">
                        <img ng-src="//dn-skypixel-image.qbox.me/uploads/newphotos/9243ee98a23798b871e1c489b05c7372/128x128" src="//dn-skypixel-image.qbox.me/uploads/newphotos/9243ee98a23798b871e1c489b05c7372/128x128"></a><!-- end ngRepeat: item in resourceData.related_recommende -->
                    <a ng-repeat="item in resourceData.related_recommende" ng-click="getResource(item.id)" class="item ng-scope col-md-4">
                        <img ng-src="//dn-skypixel-image.qbox.me/uploads/newphotos/82bcb688fc623eeb936e95048b9a588e/128x128" src="//dn-skypixel-image.qbox.me/uploads/newphotos/82bcb688fc623eeb936e95048b9a588e/128x128"></a><!-- end ngRepeat: item in resourceData.related_recommende -->
                </div>
            </div>

            <!-- END PORTLET 4-->
	        </div>

	    </div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<script>

//$(document).ready(function() {
//    $('.pgwSlideshow').pgwSlideshow();
//});
//$('.jcarousel')
//    .on('jcarousel:create jcarousel:reload', function() {
//        var element = $(this),
//            width = element.innerWidth();
//
//        // This shows 1 item at a time.
//        // Divide `width` to the number of items you want to display,
//        // eg. `width = width / 3` to display 3 items at a time.
//        element.jcarousel('items').css('width', width + 'px');
//    })
//    .jcarousel({
//        // Your configurations options
//    });

//$(document).ready(function() {
//    $(".mCustomScrollbar").mCustomScrollbar({axis:"x"});
//});
//$(document).ready(function() {
//    $(".mCustomScrollbar").mCustomScrollbar({axis:"x"});
//});

</script>
