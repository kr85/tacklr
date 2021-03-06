<?php
/* @var $this BoardController */
/* @var $model Board */
/* @var $form CActiveForm */
?>


<style>
div.form {
    width:80%;
}

.row {
    width: 100%;
    padding: 0;
    position: relative;
}
</style>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'board-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div align="center" id="modalForm" >
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row" align="center">
		<?php echo $form->labelEx($model,'boardTitle'); ?>
		<?php echo $form->textField($model,'boardTitle',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'boardTitle'); ?>
	

		<?php echo $form->labelEx($model,'categoryID'); ?>
        <?php
            // retrieve the models from db
            $models = Category::model()->findAll(array('order' => 'categoryName'));
            // format models as $key=>value with listData
            $list = CHtml::listData($models, 'categoryID', 'categoryName');
            echo $form->dropDownList($model, 'categoryID', $list, array('empty' => 'Choose a category')); ?>
		<?php echo $form->error($model,'categoryID'); ?></br>
   
        <a href="/mytacks/tacklr/category/create"><button type="button">Create New Category</button></a>
   
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->
