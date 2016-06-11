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
		<?php echo $form->textField($model,'merk'); ?>
		<?php echo $form->labelEx($model,'merk'); ?>
		<?php echo $form->error($model,'merk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
		<br>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brandstof'); ?>
		<?php
	        $brandstof = CHtml::listData((new Soortbrandstof)->model()->findAll(), 'brandstof','brandstof');
	        echo $form->dropDownList($model, 'brandstof', $brandstof, array('class'=>'button'));
	    ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'beginstand'); ?>
		<?php echo $form->textField($model,'beginstand'); ?>
		<?php echo $form->error($model,'beginstand'); ?>
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
    			
		));
		?>
		<?php echo $form->error($model,'aanschaf'); ?>
	</div>
		 
	<div class="row buttons">
		<br>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aanmaken' : 'Bewaren', array('class'=>'button')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->