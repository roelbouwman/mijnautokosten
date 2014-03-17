<?php
/* @var $this VergoedingController */
/* @var $model Vergoeding */

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Vergoedingen'=>array('lijst', 'id'=>$model->tbl_auto_idtbl_auto),
	$model->datum,
);

?>

<h1>View Vergoeding <?php echo $model->datum; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idtbl_vergoeding',
		'datum',
		'omschrijving',
		'vergoeding',
		'tbl_auto_idtbl_auto',
	),
)); ?>
