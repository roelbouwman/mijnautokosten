<?php
/* @var $this TankbeurtController */
/* @var $model Tankbeurt */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tankbeurt-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Velden met <span class="required">*</span> zijn verplicht.</p>

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
		<?php echo $form->labelEx($model,'liters'); ?>
		<?php echo $form->textField($model,'liters'); ?>
		<?php echo $form->error($model,'liters'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'literprijs'); ?>
		<?php echo $form->textField($model,'literprijs'); ?>
		<?php echo $form->error($model,'literprijs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kmstand'); ?>
		<?php echo $form->textField($model,'kmstand'); ?>
		<?php echo $form->error($model,'kmstand'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'tbl_auto_idtbl_auto'); ?>
		<?php echo $form->textField($model,'tbl_auto_idtbl_auto'); ?>
		<?php echo $form->error($model,'tbl_auto_idtbl_auto'); ?>
	</div>  -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Maak' : 'Opslaan', array('class'=>'button2')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->