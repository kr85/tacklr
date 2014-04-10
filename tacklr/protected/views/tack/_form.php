<?php
/* @var $this TackController */
/* @var $model Tack */
/* @var $form CActiveForm */

// Include the client scripts
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerCoreScript('jquery');

$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/tack_generator.js');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tack-form',
    'action'=>'/mytacks/tacklr/tack/create',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tackName'); ?>
		<?php echo $form->textField($model,'tackName',array('size'=>60, 'maxLength'=>50)); ?>
		<?php echo $form->error($model,'tackName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tackURL'); ?>
		<?php echo $form->textField($model,'tackURL',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tackURL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imageURL'); ?>
		<?php echo $form->textField($model,'imageURL',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'imageURL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tackDescription'); ?>
		<?php echo $form->textArea($model,'tackDescription',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tackDescription'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'isPrivate'); ?>
        <?php echo $form->dropDownList($model,'isPrivate', $model->getIsPrivateOptions(), array('empty' => 'Choose')); ?>
        <?php echo $form->error($model,'isPrivate'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

