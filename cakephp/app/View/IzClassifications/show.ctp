<?php 
echo $this->Html->css('classification');
?>
<div class="izClassifications container blog-page">

<div class="row">
        <div class="col-md-9 col-sm-8 article-block">
            <h1>分类: <?php echo $thisCls['IzClassification']['classification'] ?></h1>
            <?php 
            foreach($articles as $article) {
            ?>
                <div class="row">
                    <div class="col-md-4 blog-img blog-tag-data">
                        <img src="<?php  echo $article['IzArticle']['picUrl']?>" alt="" class="img-responsive">
                        <ul class="list-inline">
                            <li>
                                <i class="fa fa-calendar"></i>
                                <a href="javascript:;">
                                <?php echo $article['IzArticle']['time_create']?></a>
                            </li>
                            <!--
                            <li>
                                <i class="fa fa-comments"></i>
                                <a href="javascript:;">
                                38 Comments </a>
                            </li>
                            -->
                        </ul>
                        <ul class="list-inline blog-tags">
                            <li>
                                <i class="fa fa-tags"></i>
                                <a href="javascript:;">
                                <?php echo $thisCls['IzClassification']['classification']?> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 blog-article">
                        <h3>
                        <a href="<?php  
                            echo $this->Html->url(array('controller'=>'IzArticles',
                                'action'=>'show', $article['IzArticle']['id'])) ?>">
                        <?php echo $article['IzArticle']['name']?></a>
                        </h3>
                        <p>
                            <?php echo $article['IzArticle']['abstract']?></a>
                        </p>
                        <a class="btn blue" href="<?php  
                            echo $this->Html->url(array('controller'=>'IzArticles',
                                'action'=>'show', $article['IzArticle']['id'])) ?>">
                        读一个 <i class="fa fa-caret-square-o-right"></i>
                        </a>
                    </div>
                </div>
                <hr>
            <?php }?> 
        </div>
        <!--end col-md-9-->
        <div class="col-md-3 col-sm-4 blog-sidebar">
            <h3> 其余分类 </h3>
            <div class="top-news">
	            <?php foreach ($izClassifications as $izClassification){ ?>
                    <?php  
                        if($izClassification['IzClassification']['id'] == 1 
                            || $izClassification['IzClassification']['id'] == $thisCls['IzClassification']['id']
                            ) { 
                            continue; 
                        }
                    ?>
                    <a href="<?php echo $this->Html->url(array( 'controller' =>'IzClassifications', 'action' =>'show',  $izClassification['IzClassification']['id'])); ?>" class="btn blue normal-wrap" >
                    <span>
                        <?php  echo $izClassification['IzClassification']['classification']; ?>
                     </span>
                    <i class="fa fa-globe top-news-icon"></i>
                    </a>
	            <?php } ?>
            </div>
            <div class="space20">
            </div>
        </div>
        <!--end col-md-3-->
    </div>
</div>

