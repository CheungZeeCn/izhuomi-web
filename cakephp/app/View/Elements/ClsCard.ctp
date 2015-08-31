<div class="col-sm-6 col-md-4">
  <div class="thumbnail" style="max-height:400px">
    <div class="caption">
      <h4 style=""> <?php echo $this->Html->link($cls['name'], array( 'controller' =>'IzClassifications', 'action' =>'show',  $cls['id'])); ?></h4>
    </div>
    <?php 
        foreach($cls['articles'] as $a) {
            echo $this->element('ZipPicAndTitleSmallCard', array('article' => $a));
        }
    ?>
  </div>
</div>
