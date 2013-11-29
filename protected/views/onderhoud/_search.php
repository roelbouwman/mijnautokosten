<?php
/* @var $this OnderhoudController */
/* @var $model Onderhoud */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtbl_onderhoud'); ?>
		<?php echo $form->textField($model,'idtbl_onderhoud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'omschrijving'); ?>
		<?php echo $form->textField($model,'omschrijving',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datum'); ?>
		<?php echo $form->textField($model,'datum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kosten'); ?>
		<?php echo $form->textField($model,'kosten'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_auto_idtbl_auto'); ?>
		<?php echo $form->textField($model,'tbl_auto_idtbl_auto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kmstand'); ?>
		<?php echo $form->textField($model,'kmstand'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->