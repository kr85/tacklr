<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">


<?php 

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array(
				'enctype' => 'multipart/form-data',
				'class'=>'user_tack'
		),
));

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

<div class='tack_content'>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model, 'username',array('readonly'=>true)); ?>
		<?php echo $form->passwordFieldRow($model, 'password'); ?>
		<?php echo $form->passwordFieldRow($model, 'password_repeat');?>
		<?php echo $form->textFieldRow($model,'email'); ?>

		
	<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Update')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'cancel', 'label'=>'Cancel','url'=>Yii::app()->request->urlReferrer)); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->

</div>

<script type="text/javascript">

    $( document).ready(function() {
        $(".user_tack").draggable();
        $(".board_title").draggable();
        $(".user_tack").resizable(); 
    });

    maxZ = 1;
    $(".user_tack").mousedown(function setOnTop() {
        $(this).css("z-index", maxZ + 1);
        maxZ += 1;
    });

    $(".user_tack").dblclick(function() {
        $('tack_modal').modal('show');
    });

    $(".user_tack").mouseup(function() {
        //alert($(this).position().top + " " + $(this).position().left);
    });

    addfeedback = function($id) {
        $.post("test.php", $id, "a","b");
    }
</script>
