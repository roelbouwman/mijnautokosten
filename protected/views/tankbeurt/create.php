<?php
/* @var $this TankbeurtController */
/* @var $model Tankbeurt */
/* @var $auto Auto */

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Nieuwe Tankbeurt',
);


?>
<br /><br />

<h1>Maak Tankbeurt voor <?php echo $auto->merk;?> <?php echo $auto->type;?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>