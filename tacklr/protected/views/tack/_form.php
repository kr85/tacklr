<?php
/* @var $this TackController */
/* @var $model Tack */
/* @var $form CActiveForm */

// Include the client scripts
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerCoreScript('jquery');

$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/tack_generator.js');
$cs->registerScriptFile($baseUrl.'/js/jquery.js');
?>

<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'newTack')
); ?>

    <div class="modal-header" align="center">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>New tack</h4>
    </div>

    <div class="modal-body" align="center">
        <div class="form">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'tack-form',
                'action'=>'/mytacks/tacklr/tack/create',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>false,
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
                <?php echo $form->labelEx($model,'tackDescription'); ?>
                <?php echo $form->textArea($model,'tackDescription',array('rows'=>3, 'cols'=>50)); ?>
                <?php echo $form->error($model,'tackDescription'); ?>
            </div>
            <div>
                <?php echo $form->hiddenField($model, 'userID', array('value'=>$model['userID'])) ?>
                <?php echo $form->hiddenField($model, 'boardID', array('value'=>$model['boardID'])) ?>
                <?php echo $form->hiddenField($model, 'isPrivate', array('value'=>false)) ?>
            </div>

            <div class="row buttons">
                <?php echo CHtml::submitButton( ($model->isNewRecord ? 'create' : 'Save')) ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div><!-- form -->


    <div class="modal-footer" align="center">
       <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => 'Save Tack',
                'url' => array('/view/', 'save', 'tack'=>$model)
            )
        ); ?>
    </div>
<?php $this->endWidget(); ?>

