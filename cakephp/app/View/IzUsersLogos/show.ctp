<?php
//echo $this->Html->script('jquery-1.11.0.min');
echo $this->Html->css('uploadLogoCss');
echo $this->Html->css('jquery.Jcrop.min');
echo $this->Html->script('jquery.min');
echo $this->Html->script('jquery.Jcrop.min');
echo $this->Html->script('uploadLogoScript');

?>
        <div style="width:960px; margin:20px auto">
            <div >

                <!-- upload form -->
                <?php echo $this->Form->create(null, array(
                                'url' => array('controller'=>'IzUsersLogos', 'action'=>'upload'), 
                                'type'=>'file' , 
                                'data-ajax' => 'false',
                                'onsubmit' => "return checkForm()",
                                )
                            ); 
                ?> 

              <!--  <form id="upload_form" enctype="multipart/form-data" data-ajax="false" method="post" action="<?php echo $this->Html->url(array('action'=>'upload'));?>" onsubmit="return checkForm()">   -->

                    <!-- hidden crop params -->
                    <input type="hidden" id="x1" name="x1" />
                    <input type="hidden" id="y1" name="y1" />
                    <input type="hidden" id="x2" name="x2" />
                    <input type="hidden" id="y2" name="y2" />

                    <h2>步骤1: 请选择图片文件</h2>
                    <div><input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" /></div>

                    <div class="error"></div>

                    <div class="step2">
                        <h2>步骤2: 请截图</h2>
                        <img id="preview" />

                        <div  style="display:none">
                            <label>File size</label> <input type="text" id="filesize" name="filesize" />
                            <label>Type</label> <input type="text" id="filetype" name="filetype" />
                            <label>Image dimension</label> <input type="text" id="filedim" name="filedim" />
                            <label>W</label> <input type="text" id="w" name="w" />
                            <label>H</label> <input type="text" id="h" name="h" />
                        </div>


                    </div>
                        <?php
                        echo $this->Form->end(array("style"=>"width:100%"));
                        ?>
                        <!--<input type="submit" value="上传" /> -->
                </form>

            </div>
        </div>
