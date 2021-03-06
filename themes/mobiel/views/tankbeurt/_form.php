<?php
/* @var $this TankbeurtController */
/* @var $model Tankbeurt */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tankbeurt-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Velden met <span class="required">*</span> zijn verplicht.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php
			$defaultCar=(new Auto)->getUserAuto();
			
	        $cars = CHtml::listData((new Auto)->getUserAutos(),'idtbl_auto', 'type', 'merk');
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
		<?php echo $form->labelEx($model,'liters'); ?><br>
		<?php echo $form->textField($model,'liters'); ?>
		<?php $form->error($model,'liters'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'literprijs'); ?><br>
		<?php echo $form->textField($model,'literprijs'); ?>
		<?php $form->error($model,'literprijs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kmstand'); ?><br>
		<?php echo $form->textField($model,'kmstand'); ?>
		<?php $form->error($model,'kmstand'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'tbl_auto_idtbl_auto'); ?><br>
		<?php echo $form->textField($model,'tbl_auto_idtbl_auto'); ?>
		<?php $form->error($model,'tbl_auto_idtbl_auto'); ?>
	</div>  -->
	
	<div class="row buttons">
		<br>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'OK' : 'Opslaan', array('class'=>'button normal')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->