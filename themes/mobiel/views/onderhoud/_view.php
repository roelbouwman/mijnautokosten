<?php
/* @var $this OnderhoudController */
/* @var $data Onderhoud */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtbl_onderhoud')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtbl_onderhoud), array('view', 'id'=>$data->idtbl_onderhoud)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('omschrijving')); ?>:</b>
	<?php echo CHtml::encode($data->omschrijving); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datum')); ?>:</b>
	<?php echo CHtml::encode($data->datum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kosten')); ?>:</b>
	<?php echo CHtml::encode($data->kosten); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_auto_idtbl_auto')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_auto_idtbl_auto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kmstand')); ?>:</b>
	<?php echo CHtml::encode($data->kmstand); ?>
	<br />


</div>