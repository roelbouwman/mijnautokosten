<?php
/* @var $this VergoedingController */
/* @var $model Vergoeding */
/* @var $auto Auto */

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Lijst',
);


?>

<h1>Alle Vergoedingen</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vergoeding-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model,
	'columns'=>array(
		//'idtbl_vergoeding',
		'datum',
		'omschrijving',
		'vergoeding',
		'terugkerendeVergoeding',
		//'tbl_auto_idtbl_auto',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
