<?php
/* @var $this VergoedingController */
/* @var $model Vergoeding */
/* @var $auto Auto */

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Nieuwe Vergoeding',
);

?>
<br>
<h1>Maak Vergoeding voor <?php echo $auto->merk;?> <?php echo $auto->type;?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>