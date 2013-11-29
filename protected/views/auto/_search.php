<?php
/* @var $this AutoController */
/* @var $model Auto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtbl_auto'); ?>
		<?php echo $form->textField($model,'idtbl_auto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'merk'); ?>
		<?php echo $form->textField($model,'merk',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'brandstof'); ?>
		<?php echo $form->textField($model,'brandstof',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'beginstand'); ?>
		<?php echo $form->textField($model,'beginstand'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kenteken'); ?>
		<?php echo $form->textField($model,'kenteken',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bouwjaar'); ?>
		<?php echo $form->textField($model,'bouwjaar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aanschafprijs'); ?>
		<?php echo $form->textField($model,'aanschafprijs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wegenbelasting'); ?>
		<?php echo $form->textField($model,'wegenbelasting'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'verzekering'); ?>
		<?php echo $form->textField($model,'verzekering'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'afschrijving'); ?>
		<?php echo $form->textField($model,'afschrijving'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_user_idtbl_user'); ?>
		<?php echo $form->textField($model,'tbl_user_idtbl_user'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->