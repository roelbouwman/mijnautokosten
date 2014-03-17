<?php
/* @var $this VergoedingController */
/* @var $model Vergoeding */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vergoeding-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'datum'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'datum',
				
				// additional javascript options for the date picker plugin
				'options'=>array(
				'dateFormat'=>'dd-mm-yy',
        		'showAnim'=>'fold',
    			),
    			'htmlOptions'=>array(
        		'style'=>'height:20px;'
    			),
		));
		?>
		
		<?php echo $form->error($model,'datum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'omschrijving'); ?>
		<?php echo $form->textField($model,'omschrijving'); ?>
		<?php echo $form->error($model,'omschrijving'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vergoeding'); ?>
		<?php echo $form->textField($model,'vergoeding'); ?>
		<?php echo $form->error($model,'vergoeding'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'tbl_auto_idtbl_auto'); ?>
		<?php echo $form->textField($model,'tbl_auto_idtbl_auto'); ?>
		<?php echo $form->error($model,'tbl_auto_idtbl_auto'); ?>
	</div>  -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->