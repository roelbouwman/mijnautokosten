<?php
/* @var $this AutoController */
/* @var $data Auto */

?>

<div class="view">
	
	<div style="padding:8px;border: 1px solid black;border-radius: 10px ;-moz-border-radius: 10px ;-webkit-border-radius: 10px ;" >
	<table>
	<tr>
	<td>
	<h2><?php echo CHtml::encode($data->merk); ?>
	<?php echo CHtml::encode($data->type); ?></h2>
	</td>
	<td>
	<!-- Buttons voor applicatie doeleinden -->
	<a href="?r=tankbeurt/create&id=<?php echo $data->idtbl_auto ?>" class="button"><span class="label">Tankbeurt</span></a>
	<a href="?r=onderhoud/create&id=<?php echo $data->idtbl_auto ?>" class="button"><span class="label">Onderhoud</span></a>
	<a href="?r=vergoeding/create&id=<?php echo $data->idtbl_auto ?>" class="button"><span class="label">Vergoeding</span></a>
 </td>
 </tr>
 <tr>
 <td>
 
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
 </td>
 <td>
    <div class="dropdown">
      <a href="#" class="button"><span class="label">Menu</span><span class="toggle"></span></a>
      <div class="dropdown-slider">
        <a href="?r=tankbeurt/lijst&id=<?php echo $data->idtbl_auto ?>" class="ddm"><span class="label">Alle&nbspTankbeurten</span></a>
        <a href="?r=onderhoud/lijst&id=<?php echo $data->idtbl_auto ?>" class="ddm"><span class="label">Alle&nbspOnderhoud</span></a>
        <a href="?r=vergoeding/lijst&id=<?php echo $data->idtbl_auto ?>" class="ddm"><span class="label">Alle&nbspVergoedingen</span></a>
        <a href="?r=auto/update&id=<?php echo $data->idtbl_auto ?>" class="ddm"><span class="label">Wijzig&nbspAuto</span></a>
        <a href="?r=auto/create" class="ddm"><span class="label">Auto&nbspToevoegen</span></a>
      </div> <!-- /.dropdown-slider -->
    </div> <!-- /.dropdown -->
    </td>
    </tr>
    </table>
	
	
	</div>
	
	<br />
	<br />
</div>