<?php
/* @var $this TankbeurtController */
/* @var $model Tankbeurt */
/* @var $auto Auto */

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Lijst',
);

?>
<br>
<h1>Lijst Tankbeurten <?php echo $auto->merk ?> <?php echo $auto->type ?></h1>


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
		//'tbl_auto_idtbl_auto',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
