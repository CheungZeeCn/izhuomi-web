<div class="container izpage">
<div class="izWordbooks index">
    <ul class="nav nav-tabs">
        <li role="presentation" ><a href="<?php echo $this->Html->url('/IzWordbooks'); ?>"><span class="glyphicon glyphicon-list-alt"></span><?php echo __('单词本'); ?></a></li>
        <li role="presentation" class="active"><a href="#"> <i class="fa fa-bookmark"></i> 美句摘录</a></li>
    </ul>

	<table style="" class="table table-bordered table-responsive table-condensed table-hover table-striped radius-3px" cellpadding="0" cellspacing="0">
	<tr class="info">
			<th><?php echo $this->Paginator->sort('IzArticle.name', '文章'); ?></th>
			<th><?php echo __('摘录'); ?></th>
			<th><?php echo $this->Paginator->sort('IzUserDiget.addtime', '加入时间'); ?></th>
			<th class="actions"><span class="glyphicon glyphicon-remove-circle"></span></th>
	</tr>
	<?php foreach ($izUserDigests as $izUserDigest): ?>
	<tr digestId="<?php echo $izUserDigest['IzUserDigest']['id']?>">
		<td style="max-width:150px;" field="" class=""><?php echo h($izUserDigest['IzArticle']['name']); ?> </td>
		<td style="max-width:400px;" field="digest" ><?php echo h($izUserDigest['IzUserDigest']['digest']); ?> </td>
		<td style="max-width:150px;" field="addtime" class=""><?php echo h(date("Y-m-d H:i", strtotime($izUserDigest['IzUserDigest']['addtime']))); ?> </td>
		<td style="max-width:300px;" field="delete" class="actions">
			<?php //echo $this->Form->postLink($this->Html->tag('span', '', array('class'=>'glyphicon glyphicon-remove-circle')), array('action' => 'delete', $izUserDigest['IzUserDigest']['id']), array('escape' => FALSE), __('真的要删除单词 [ %s ] 吗?', $izUserDigest['IzUserDigest']['word'])); ?>
			<a class="wordbook-ajax-delete"><?php echo $this->Html->tag('span', '', array('class'=>'glyphicon glyphicon-remove-circle')); ?></a>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php /*
	echo $this->Paginator->counter(array(
	'format' => __(' {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	)); */
	?>	</p>
	<div class="paging">
    <ul class="pagination">
	<?php
		//echo $this->Paginator->first(__('最先页'), array(), null, array('class' => 'prev disabled',));
		//echo $this->Paginator->prev('< ' . __('上一页'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('first' => '第一页', 'last' => '最后一页', 
                                        'currentTag' => 'span', 'separator' => '', 'tag'=>'li',
                                        'currentClass' => 'active' 
                                        ));
		//echo $this->Paginator->next(__('下一页') . ' >', array(), null, array('class' => 'next disabled', 'tag'=>'li'));
		//echo $this->Paginator->last(__('最后页'), array(), null, array('class' => 'prev disabled', 'tag'=>'li'));
	?>
    </ul>
	</div>
    <div class="ui-content" data-role="popup" id="wordbook-popupCloseRight" style="max-width:350px; background-color:#ebcccc;">
        <div id='wordbook-popup-msg' style="font-size:18px">
        </div>
    </div>

      <!--<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>-->
</div>
</div>
<script>
$(document).ready(function() {
     $('.wordedit').editable(function(value, settings) { 
             var wordId = $(this).parent().attr('wordId');
             var wordField = $(this).attr('field');
             var target="<?php echo $this->Html->url('/IzWordbooks/ajax_edit/')?>"+wordId+".json";
             var ele = this;
             $.post(target, {wordId:wordId, wordField:wordField, value:value}, function(retData) {
               if (retData['status'] == 'OK' ) {
                   console.log("OK!!! saved");   
                   //do nothing;
               } else {
                   $( "#wordbook-popup-msg" ).text(retData['msg']);
                   $( "#wordbook-popupCloseRight" ).popup("open", { positionTo: "tr[wordId="+wordId+"]" });
                   $(ele).text(retData['return']);
               }
             }).fail(function() {
                   $( "#wordbook-popup-msg" ).text("Server Failed! Try it later... :(");
                   $( "#wordbook-popupCloseRight" ).popup("open", { positionTo: "tr[wordId="+wordId+"]" });
             });
             //console.log(target);
             //console.log(wordId);
             //console.log(wordField);
             //console.log(settings);
             //return (value);
             return(value);
        //}'http://localhost/bs/cakephp/IzWordbooks/ajax_edit.json', {
        }, {
           tooltip: '点击编辑',            
        });

        $('.wordbook-ajax-delete').click(function(e) {
            //console.log($(this).parent().parent().attr('wordId'));
            var wordId = $(this).parent().parent().attr('wordId'); 
            var target="<?php echo $this->Html->url('/IzWordbooks/delete/')?>"+wordId+".json";
            $.post(target, {}, function(ret) {
                if(ret['status'] == 'OK') {
                    //console.log("OK, delete tr");
                    $("tr[wordId="+wordId+"]").fadeOut();
                } else {
                   $( "#wordbook-popup-msg" ).text(retData['msg']);
                   $( "#wordbook-popupCloseRight" ).popup("open", { positionTo: "tr[wordId="+wordId+"]" });
                }
            });
            return false;
        });

     });


</script>
