<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Boards'=>array('index'),
	$model->boardID,
);
// allow jQuery
Yii::app()->clientScript->registerCoreScript('jquery');
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

// register js files
//$cs->registerScriptFile($baseUrl.'/js/jquery.js');
$cs->registerScriptFile($baseUrl.'/js/jquery-1.10.2.js');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.js');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.min.js');

// register tack css
$cs->registerCssFile($baseUrl.'/css/user_tack.css');

$this->menu=array(
    array('label'=>'Create Tack', 'url'=>array('tack/create', 'boardID'=>$model->boardID)),
	array('label'=>'Update Board', 'url'=>array('update', 'id'=>$model->boardID)),
	array('label'=>'Delete Board', 'url'=>array('delete', 'id'=>$model->boardID)),
    array('label'=>'List Boards', 'url'=>array('index')),
);
?>

<h1>Board: <?php echo $model->boardTitle; ?></h1>

<?php

$BID = $model->boardID;
$tacks = Tack::model()->findAllByAttributes(array('boardID'=>(int)$BID));
?>

<div class="row">
    <div class="span12">
        <ul class="thumbnails">
            <?php foreach ($tacks as $tack): ?>
                <li class="span4">
                    <!--<div class="drag">-->
                        <div class="thumbnail">
                            <img src="<?php echo $tack['imageURL']; ?>">
                            <div class="caption">
                                <a href="/mytacks/tacklr/tack/view/id/<?php echo $tack['tackID']; ?>">
                                    <h3> <?php echo $tack['tackName'] ?></h3></a>
                                <a href="<?php echo $tack['tackURL'] ?>"><h5>Link</h5></a>
                            </div>
                        </div>
                    <!--</div>-->
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $( document).ready(function() {
        $('.user_tack').draggable();
        $('.user_tack').resizable();
    });
</script>


<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'newTack')
); ?>


    <div class="modal-header" align="center">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>New tack</h4>
    </div>

    <div class="modal-body" align="center">
        <?php $this->renderPartial('../Tack/_form', array('model'=>new Tack)); ?>
    </div>
    <!--
    <div class="modal-footer">
       <?php /* $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'button',
                'type' => 'primary',
                'label' => 'Save changes',
                'url' => '/view/'
            )
        ); */?>
    </div>
    -->

<?php $this->endWidget(); ?>

<?php $this->widget(
    'bootstrap.widgets.TbButton',
    array(
        'label' => '+',
        'type' => 'primary',
        'htmlOptions' => array(
            'data-toggle' => 'modal',
            'data-target' => '#newTack',
        ),
    )
);
?>
