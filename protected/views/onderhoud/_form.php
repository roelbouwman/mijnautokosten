<?php
/* @var $this OnderhoudController */
/* @var $model Onderhoud */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'onderhoud-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Velden met <span class="required">*</span> zijn verplicht.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'datum'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'datum',
				// additional javascript options for the date picker plugin
				'options'=>array(
				'dateFormat'=>'dd-mm-yy',
        		'showAnim'=>'fold',
    			),
    			'htmlOptions'=>array(
        		'style'=>'height:20px;'
    			),
		));
		?>
		<?php echo $form->error($model,'datum'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'onderhoud'); ?>
		<?php
	        $onderhoud = CHtml::listData(Soortonderhoud::model()->findAll(), 'onderhoud','onderhoud');
	        echo $form->dropDownList($model, 'onderhoud', $onderhoud);
	    ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'omschrijving'); ?>
		<?php echo $form->textField($model,'omschrijving'); ?>
		<?php echo $form->error($model,'omschrijving'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kosten'); ?>
		<?php echo $form->textField($model,'kosten'); ?>
		<?php echo $form->error($model,'kosten'); ?>
	</div>

	<!-- 
	<div class="row">
		<?php echo $form->labelEx($model,'tbl_auto_idtbl_auto'); ?>
		<?php echo $form->textField($model,'tbl_auto_idtbl_auto'); ?>
		<?php echo $form->error($model,'tbl_auto_idtbl_auto'); ?>
	</div>
	 -->
	 
	<div class="row">
		<?php echo $form->labelEx($model,'kmstand'); ?>
		<?php echo $form->textField($model,'kmstand'); ?>
		<?php echo $form->error($model,'kmstand'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Maak' : 'Bewaar', array('class'=>'button2')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->