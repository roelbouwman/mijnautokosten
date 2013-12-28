<?php
/* @var $this AutoController */
/* @var $model Auto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'auto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Velden met <span class="required">*</span> zijn verplicht.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->error($model,'merk'); ?>
		<?php echo $form->textField($model,'merk'); ?>
		<?php echo $form->labelEx($model,'merk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brandstof'); ?>
		<?php echo $form->textField($model,'brandstof'); ?>
		<?php echo $form->error($model,'brandstof'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beginstand'); ?>
		<?php echo $form->textField($model,'beginstand'); ?>
		<?php echo $form->error($model,'beginstand'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kenteken'); ?>
		<?php echo $form->textField($model,'kenteken'); ?>
		<?php echo $form->error($model,'kenteken'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bouwjaar'); ?>
		<?php echo $form->textField($model,'bouwjaar'); ?>
		<?php echo $form->error($model,'bouwjaar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aanschafprijs'); ?>
		<?php echo $form->textField($model,'aanschafprijs'); ?>
		<?php echo $form->error($model,'aanschafprijs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wegenbelasting'); ?>
		<?php echo $form->textField($model,'wegenbelasting'); ?>
		<?php echo $form->error($model,'wegenbelasting'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'verzekering'); ?>
		<?php echo $form->textField($model,'verzekering'); ?>
		<?php echo $form->error($model,'verzekering'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'afschrijving'); ?>
		<?php echo $form->textField($model,'afschrijving'); ?>
		<?php echo $form->error($model,'afschrijving'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aanschaf'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'aanschaf',
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
		<?php echo $form->error($model,'aanschaf'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'hoofdauto'); ?>
		<?php echo $form->checkBox($model,'hoofdauto'); ?>
		<?php echo $form->error($model,'hoofdauto'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'afschaf'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'afschaf',
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
		<?php echo $form->error($model,'aanschaf'); ?>
	</div>
	 
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aanmaken' : 'Bewaren', array('class'=>'button2')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->