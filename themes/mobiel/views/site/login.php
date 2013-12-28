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

<p>Vul hier je credentials in:</p>

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

	<div class="row">
		<?php CHtml::link('Nieuwe gebruiker?',array('user/create'));	?>
	</div>
	
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login', array('class'=>'button normal')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
