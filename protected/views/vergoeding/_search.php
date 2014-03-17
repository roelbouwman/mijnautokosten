<?php
/* @var $this VergoedingController */
/* @var $model Vergoeding */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtbl_vergoeding'); ?>
		<?php echo $form->textField($model,'idtbl_vergoeding'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datum'); ?>
		<?php echo $form->textField($model,'datum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'omschrijving'); ?>
		<?php echo $form->textField($model,'omschrijving',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vergoeding'); ?>
		<?php echo $form->textField($model,'vergoeding'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_auto_idtbl_auto'); ?>
		<?php echo $form->textField($model,'tbl_auto_idtbl_auto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->