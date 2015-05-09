<div class="" style="background-color:#5B5B5B; padding-top:100px">
    
    <div class='well' style="">
        <?php 
            //var_dump($myRank);
            //var_dump($topRanks);
            //var_dump($myCount);
        ?>
        <div class="" style="min-height:200px; font-size:50px; padding-bottom:10px; text-align:center"> 
            <div class="" style="width:100%; dispaly:inline; font-size:100px">
                <?php 
                        echo "{$myNick}";
                ?>
            </div>
            <hr></hr>

            <div class="" style="width:50%; float:left; dispaly:inline; line-height:1px; border-size:1px; border-color:black">
                <?php 
                    if($myRank == -1) {
                        echo "┏ (゜ω゜)=☞";
                    } else {
                        $realRank = $myRank + 1;
                        echo "排名: {$realRank} \n";
                    }
                ?>
            </div>
            <div class="" style="width:50%; float:left; dispaly:inline; line-height:1px">
                <?php 
                    if($myCount==NULL) {
                        echo "新增阅读量: 0 篇";    
                    } else {
                        echo "新增阅读量: {$myCount}";
                    }
                ?>
            </div>
        </div>


    </div>
    <div class='well' style="font-size:50px">

        <?php 
            if($topRanks==NULL) {?>
                <div class="row"> 

                    <div class="col-md-4">
                        <?php 
                                echo "┏ (゜ω゜)=☞";
                        ?>
                    </div>
                    <div class="col-md-8">
                        <a href="http://izhuomi.com/IzArticles/show/">
                        <?php 
                                echo "方圆百里无书声，赶紧读一篇？";    
                        ?>
                        </a>
                    </div>
                </div>
        <?php
            } else {
                $i = 0;
                $maxCount = $topRanks[0][0]['count'];
                $colorMap = array(
                     "progress-bar-success" => 75,
                     "progress-bar-info" => 50,
                     "progress-bar-warning" => 25,
                     "progress-bar-danger" => 0,
                );
                foreach($topRanks as $r) {
                    $i += 1;
                    $rate = $r[0]['count'] * 100 / $maxCount ;
                    $class = '';
                    foreach($colorMap as $c => $v) {
                        if($rate >= $v) {
                            $class = $c;
                            break;
                        }       
                    }
        ?>
            <div class="" style="min-height:200px"> 
                <div class="" style="width:20%; float:left; dispaly:inline; text-align:center; ">
                    <div style="font-size:100px">
                    <?php 
                            echo "{$i}";
                    ?>
                    </div>
                </div>

                <div class="" style="width:75%; float:left; dispaly:inline">
                    <div>
                            <?php echo "{$r['Users']['first_name']}"; 
                            ?>
                            <div style="float:right"> 
                                <?php 
                                    echo "{$r[0]['count']} 篇";
                                ?>
                            </div>
                    </div>
                    <div class="progress">
                      <div class="progress-bar <?php echo $class;?>" role="progressbar" aria-valuenow="<?php echo $rate;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $rate;?>%">
                        <span class="sr-only"><?php echo $rate;?>% </span>
                      </div>
                    </div>
                </div>
                <div class="" style="width:5%; float:left; dispaly:inline">
                </div>

            </div>

        <?php 
                }
            }
        ?>

    </div>

</div>
