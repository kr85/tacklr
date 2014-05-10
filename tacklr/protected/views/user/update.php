<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->userID=>array('view','id'=>$model->userID),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->userID)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
*/
?>

<h1>Update User</h1>

<?php $this->renderPartial('_formUpdate', array('model'=>$model)); ?>