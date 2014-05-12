<?php
/* @var $this RecoveryFormController */
/* @var $model RecoveryForm */
/* @var $form CActiveForm */


$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

// register js files
$cs->registerScriptFile($baseUrl.'/js/jquery.js');
//$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4/ui/');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.min.js');
$cs->registerScriptFile('https://w.soundcloud.com/player/api.js');
$cs->registerScriptFile($baseUrl.'/js/ajaxScript.js');

// register tack css
$cs->registerCssFile($baseUrl.'/css/user_tack.css');
$cs->registerCssFile($baseUrl.'/css/board.css');
?>

<div class="form_tack">
	<div class="tack_title">Password Recovery</div>
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'recovery-form-recovery-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			'htmlOptions'=>array('class'=>'tack_content'),
			),
		)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->textFieldRow($model,'email'); ?>
	</br>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary', 'label'=>'Submit')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->
