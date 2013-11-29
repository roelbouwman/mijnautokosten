<?php
/* @var $this OnderhoudController */
/* @var $model Onderhoud */
/* @var $auto Auto */

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Nieuw onderhoud',
);

?>
<br>
<h1>Maak Onderhoud voor <?php echo $auto->merk;?> <?php echo $auto->type;?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>