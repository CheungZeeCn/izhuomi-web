<div style="height:70px;margin-top:0px;clear:both;display:block;float:none">
<div >    
    <?php 
        $article = $article['IzArticle'];

        ?>
        <div>
            <img class="" style="float:left;width:113px;margin-right:3px" src="<?php echo $article['zipPicUrl']?>", alt="No Pic ">
        </div>
        <h4 style="">
        <?php
       
            echo $this->Html->link("<span class='glyphicon glyphicon-volume-up'></span> {$article['name']}", array('controller' => 'IzArticles', 'action' => 'show', $article['id']), array("style"=>"color:#000;font-size:15px", 'escape'=>False));
    ?>
        </h4>
</div>
</div>
