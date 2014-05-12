<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);


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


</br>
	<div class="form_tack">
		<div class="tack_title">Login</div>
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'horizontalForm',
			'type'=>'vertical',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			'htmlOptions'=>array('class'=>'tack_content'),
			),
		)); ?>
	
		<p class="note">Fields with <span class="required">*</span> are required.</p>
			<?php echo $form->textFieldRow($model,'username'); ?>
		    <?php echo $form->passwordFieldRow($model,'password'); ?>
			</br>
			<p>
			<?php echo CHtml::link('Forget your password?',array('//user/recovery'));
				  echo ' | ';
			?>
			<?php echo CHtml::link('Register?',array('//user/create'));?>
			</p>
			<p style="left:20%; position:relative; max-width:200px;">
			<?php echo $form->checkBoxRow($model,'rememberMe'); ?>
			</p>
		
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary', 'label'=>'Login')); ?>
			
			
			
<?php $this->endWidget(); ?>
</div>



<script type="text/javascript">

    $( document).ready(function() {
        $(".user_tack").draggable();
        $(".board_title").draggable();
        $(".form_tack").draggable();
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
