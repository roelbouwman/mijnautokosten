<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
$model=new User();
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<div class="row buttons">
	<br>
		<?php echo CHtml::submitButton('Bewaar', array('class'=>'button')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->