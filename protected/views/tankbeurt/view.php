<?php
/* @var $this TankbeurtController */
/* @var $model Tankbeurt */

$autoModel=Auto::model()->findByPk($model->tbl_auto_idtbl_auto);

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Tankbeurten'=>array('lijst', 'id'=>$model->tbl_auto_idtbl_auto),
	$model->datum,
);

?>
<br>
<h1>Tankbeurt <?php echo $model->datum; ?> <?php echo $autoModel->merk; ?> <?php echo $autoModel->type; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idtbl_tankbeurt',
		'datum',
		'liters',
		'literprijs',
		'kmstand',
		'totaal',
		//'tbl_auto_idtbl_auto',
	),
)); ?>
