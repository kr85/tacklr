<?php
/* @var $this BoardController */
/* @var $data Board */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('boardID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->boardID), array('view', 'id'=>$data->boardID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('boardTitle')); ?>:</b>
	<?php echo CHtml::encode($data->boardTitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::encode($data->userID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoryID')); ?>:</b>
	<?php echo CHtml::encode($data->categoryID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updateDate')); ?>:</b>
	<?php echo CHtml::encode($data->updateDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br />


</div>