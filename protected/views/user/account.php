<?php
/* @var $this AccountFormController */
/* @var $model AccountForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form-account-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,)
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
	<br>
		<?php echo CHtml::submitButton('Verstuur', array('class'=>'button')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->