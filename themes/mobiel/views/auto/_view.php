<?php
/* @var $this AutoController */
/* @var $data Auto */

?>

<div class="view">
	
	<table>
	<tr>
	<td>
	<h2><?php echo CHtml::encode($data->merk); ?>
	<?php echo CHtml::encode($data->type); ?></h2>
	</td>
	</tr>
	<tr>
	<td>
	<!-- Buttons voor applicatie doeleinden -->
	<a href="?r=tankbeurt/create&id=<?php echo $data->idtbl_auto ?>" class="button normal">Tankbeurt</a>
	<a href="?r=onderhoud/create&id=<?php echo $data->idtbl_auto ?>" class="button normal">Onderhoud</a>

    </td>
    </tr>
    </table>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('brandstof')); ?>:</b>
	<?php echo CHtml::encode($data->brandstof); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beginstand')); ?>:</b>
	<?php echo CHtml::encode($data->beginstand); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kenteken')); ?>:</b>
	<?php echo CHtml::encode($data->kenteken); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bouwjaar')); ?>:</b>
	<?php echo CHtml::encode($data->bouwjaar); ?>
	
	</div>
	
	<br />
	<br />
