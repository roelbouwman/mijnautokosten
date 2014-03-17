<?php
/* @var $this VergoedingController */
/* @var $model Vergoeding */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vergoeding-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Velden met <span class="required">*</span> zijn verplicht.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php
			$defaultCar=Auto::getUserAuto();
			
	        $cars = CHtml::listData(Auto::getUserAutos(),'idtbl_auto', 'type', 'merk');
	        echo $form->dropDownList($model, 'tbl_auto_idtbl_auto', $cars, array('class'=>'button normal','options'=>array($defaultCar->idtbl_auto=>array('selected'=>'selected'))));
	    ?>
	    <br>
	    <br><br>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'datum'); ?><br>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'datum',
				'value'=>$model->datum=date("d-m-Y",time()),
				// additional javascript options for the date picker plugin
				'options'=>array(
				'dateFormat'=>'dd-mm-yy',
        		'showAnim'=>'fold',
    			),
    			//'htmlOptions'=>array(
        		//'style'=>'height:20px;'
    			//),
		));
		?>
		<?php $form->error($model,'datum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'omschrijving'); ?>
		<?php echo $form->textField($model,'omschrijving'); ?>
		<?php echo $form->error($model,'omschrijving'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vergoeding'); ?>
		<?php echo $form->textField($model,'vergoeding'); ?>
		<?php echo $form->error($model,'vergoeding'); ?>
	</div>
	
	<div class="row buttons">
		<br>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'OK' : 'Opslaan', array('class'=>'button normal')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->