<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


<div class="form">
<fieldset>
		<legend>Login</legend>
		<p>Please fill out the following form with your login credentials:</p>
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'verticalForm',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			'htmlOptions'=>array('class'=>'well'),
			),
		)); ?>
	
		<p class="note">Fields with <span class="required">*</span> are required.</p>
			
			<?php echo $form->textFieldRow($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		    
		    <?php echo $form->passwordFieldRow($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
		
			<?php echo $form->checkBoxRow($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>
			
			<?php echo CHtml::link('Register?',array('//user/create'));?>
			
	
</fieldset>
<?php $this->endWidget(); ?>


</div><!-- form -->
