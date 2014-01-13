<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

//TODO: ugly hack, zie todo: als de gebruikersnaam of email wordt gewijzigd mag het password niet
$model->password="";
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Velden met <span class="required">*</span> zijn verplicht.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_repeat'); ?>
		<?php echo $form->passwordField($model,'password_repeat'); ?>
		<?php echo $form->error($model,'password_repeat'); ?>
	</div>
	
	<!-- <div class="row">
		<?php echo $form->labelEx($model,'salt'); ?>
		<?php echo $form->textField($model,'salt'); ?>
		<?php echo $form->error($model,'salt'); ?>
	</div>  -->

	<div class="row">
		<?php echo $form->labelEx($model,'woonplaats'); ?>
		<?php echo $form->textField($model,'woonplaats'); ?>
		<?php echo $form->error($model,'woonplaats'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Maak' : 'Bewaar', array('class'=>'button2')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->