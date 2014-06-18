    <div class="container">
        <?php
        if(isset($msg)) {
            echo "$msg <br />";       
        } else { ?>
            <h2 id="title">
                <?php echo $word ?>
                <span id="phonetic">[<?php echo $phonetic ?>]</span>
                <a id="more" href="http://dict.youdao.com/search?keyfrom=selector&amp;q=<?php echo $word ?>" target="_blank" hidefocus="true"><span style="font-size:22px" class="glyphicon glyphicon-globe"> </span></a>
                <a id="add"> <span style="font-size:22px" class="glyphicon glyphicon-plus"></span> </a>
            </h2>
            <hr class="clear-hr">
            <div id="basic">
            <?php
            foreach( $explains as $e) {
                echo "$e <br />";       
            }
            ?>
            </div>
            <hr class="clear-hr">
            <div id="from">
               <p> 来自: <?php echo $from ?> </p>
            </div>

        <?php
        }
        ?>
    </div><!-- /.container -->


