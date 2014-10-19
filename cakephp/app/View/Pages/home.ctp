<div class="container izpage">

<div class="boxwidget">
    <div class="boxwidgetInner">
         
        <div class="jumbotron" style="width:100%">
        <div style="width:100%">
         <?php //echo $this->Html->image("comeLater.jpeg", array('width'=>'100%'));?>
        </div>
        <h1>欢迎来到 i.啄米</h1>
        <p > izhuomi致力于提供舒适的阅读体验</p>
        <p>
        <ul>
        <li> 开始播放音频后，点哪里读到哪里 </li>
        <li> 便捷的字典查阅功能 </li>
        <li> 轻松的笔记记录 </li>
        </ul>
        </p>
        <p>
        <?php  echo $this->Html->link(__("尝尝鲜?"), 
                    array(
                        "controller" => 'IzArticles', 
                        "action" => 'show', 
                        ), 
                    array(
                        'class'=>'btn btn-primary btn-lg', 
                        'role'=>'button',
                        )
                    ); 
        ?>
        </p>
         </div>
    </div>
</div>

<div class="delimiter"><hr class="delimiter"></div>
    <h2><span class="label label-primary">最近更新</span> </h2>
    <div class="row">

    
    <?php 
        foreach($recentlyNew as $article) {
            echo $this->element('ContentCard', array('article'=>$article)); 
        }
    ?>

    </div>


<div class="delimiter"><hr class="delimiter"></div>
    <h2><span class="label label-primary">分类阅读</span></h2> 
    <div class="row">
    <?php 
        foreach($classesOut as $k => $v) {
            echo $this->element('ClsCard', array('cls'=>$v)); 
        }
    ?>
    </div>

</div>
