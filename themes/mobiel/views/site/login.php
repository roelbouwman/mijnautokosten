<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Inloggen';
$this->breadcrumbs=array(
	'Login',
);

?>

<h1>Inloggen</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Velden met <span class="required">*</span> zijn verplicht.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?><br>
		<?php echo $form->textField($model,'username'); ?>
		<?php $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?><br>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php $form->error($model,'password'); ?>
		
	</div>
	
	<div class="row buttons">
		<br>
		<?php echo CHtml::submitButton('Login', array('class'=>'button')); ?>
		<br>
		Nieuwe gebruiker? Tik op knop hieronder:
		<br>
		<a href="?r=user/create" class="button">Nieuwe gebruiker?</a>
	</div>
	
<?php $this->endWidget(); ?>
</div><!-- form -->
