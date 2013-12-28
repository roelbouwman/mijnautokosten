<?php
/* @var $this TankbeurtController */
/* @var $model Tankbeurt */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Lijst',
);

?>
<br>
<h1>Lijst Tankbeurten <?php echo $this->getAutoModel()->merk ?> <?php echo $this->getAutoModel()->type ?></h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tankbeurt-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model,
	'columns'=>array(
		'datum',
		//array(            // display 'create_time' using an expression
		//'name'=>'datum',
		//'value'=>'date("d-m-Y", strtotime($data->datum))',
		//),
		'liters',
		'literprijs',
		'kmstand',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
