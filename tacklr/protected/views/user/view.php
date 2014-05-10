<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->userID,
);

$this->menu=array(
	array('label'=>'Update User', 'url'=>array(array('/user/update', 'id'=>Yii::app()->user->getId()))),
);
?>

<h1>View User #<?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'password',
		'email',
		'joinDate',
	),
)); ?>
