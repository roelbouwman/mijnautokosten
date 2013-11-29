<?php
/* @var $this TankbeurtController */
/* @var $model Tankbeurt */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtbl_tankbeurt'); ?>
		<?php echo $form->textField($model,'idtbl_tankbeurt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datum'); ?>
		<?php echo $form->textField($model,'datum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'liters'); ?>
		<?php echo $form->textField($model,'liters'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'literprijs'); ?>
		<?php echo $form->textField($model,'literprijs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kmstand'); ?>
		<?php echo $form->textField($model,'kmstand'); ?>
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