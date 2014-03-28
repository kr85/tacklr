<?php
/* @var $this TackController */
/* @var $model Tack */

$this->breadcrumbs=array(
	'Tacks'=>array('index'),
	'Create',
);

$this->menu=array(
    array('label'=>'View Boards', 'url'=>('/mytacks/tacklr/board/index'))
);
?>

<h1>Create Tack</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>