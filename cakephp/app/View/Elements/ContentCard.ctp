<a style="display:block;" target="_blank" href='<?php 
  echo $this->Html->url( '/IzArticles/show/'.$article["id"] );
  ?>'>
<div class="col-sm-5 col-md-3" >
  <div class="thumbnail" style="height:300px; text-overflow: ellipsis; overflow:hidden;">
    <img style="width:100%" src="<?php echo $article['zipPicUrl']; ?>">
    <div class="caption" >
      <h4> <?php echo $article['name']; ?> </h4>
      <p><?php echo $article['abstract']; ?></p>
    </div>
  </div>
</div>
</a>
