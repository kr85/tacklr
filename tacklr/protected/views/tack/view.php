<?php
/* @var $this TackController */
/* @var $model Tack */

$this->breadcrumbs=array(
	'Tacks'=>array('index'),
	$model->tackID,
);

$this->menu=array(
	array('label'=>'List Tacks', 'url'=>array('/board/view?&id='.$model->boardID)),
	array('label'=>'Create Tack', 'url'=>array('create')),
	array('label'=>'Update Tack', 'url'=>array('update', 'id'=>$model->tackID)),
	array('label'=>'Delete Tack', 'url'=>('/mytacks/tacklr/tack/delete?&id='.$model->tackID)),
    array('label'=>'List Boards', 'url'=>('/mytacks/tacklr/board/index')),
);
?>

<h1>Tack: <?php echo $model->tackName; ?></h1>

<?php

?>
