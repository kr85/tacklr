<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->userID=>array('view','id'=>$model->userID),
	'Update',
);

?>

<h1>Update User</h1>

<?php $this->renderPartial('_formUpdate', array('model'=>$model)); ?>