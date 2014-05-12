<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Board'=>array('index'),
	'Create',
);

$this->menu=array(
	array( 'label'=>'List Boards', 'url'=>array('index')),
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
		<div class="tack_title">New Board</div>
<?php		
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'vertical',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array(
				'class'=>'tack_content'
		),
));

 ?>

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
     
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

