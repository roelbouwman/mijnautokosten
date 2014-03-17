<?php
/* @var $this VergoedingController */
/* @var $data Vergoeding */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_vergoeding')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_vergoeding), array('view', 'id'=>$data->idtbl_vergoeding)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datum')); ?>:</b>
	<?php echo CHtml::encode($data->datum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('omschrijving')); ?>:</b>
	<?php echo CHtml::encode($data->omschrijving); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vergoeding')); ?>:</b>
	<?php echo CHtml::encode($data->vergoeding); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_auto_idtbl_auto')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_auto_idtbl_auto); ?>
	<br />


</div>