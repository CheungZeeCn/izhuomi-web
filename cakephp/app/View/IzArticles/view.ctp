<?php
// app/View/Posts/view.ctp
$this->extend('/Common/view');

$this->assign('title', $id);

$this->start('sidebar');
?>

<li>
<?php
echo $this->Html->link('edit', array(
    'action' => 'edit',
    $classification
)); ?>

changge
</li>

<?php $this->end(); ?>

// The remaining content will be available as the 'content' block
// in the parent view.

<?php echo h($data); ?>
