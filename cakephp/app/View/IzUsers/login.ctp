
<!--login modal-->
<div class="users form container">
<span class="span50"> </span>
<span class="span50"> </span>
  <div class="modal-dialog" style="width:400px">
        <?php //echo $this->Session->flash(); ?>
        <?php echo $this->Session->flash('auth');?>
        <?php echo $this->Form->create('IzUser', array('data-ajax' => 'false')); ?>
            <div class="form-group">
                <?php echo $this->Form->input('username', 
                    array('placeholder'=>'Username', 'label'=>'', 'class'=>'form-control input-lg'));
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('password', 
                    array('placeholder'=>'Password', 'label'=>'', 'class'=>'form-control input-lg'));
                ?>
            </div>
        <?php echo $this->Form->end('login', array('class'=>'btn btn-primary btn-lg btn-block')); ?>
        <div class="form-group">
          <span class="pull-right"><a href="reg">Register</a></span><span><a href="#" mark="todo">Need help?</a></span>
        </div>
    </div>
</div>
