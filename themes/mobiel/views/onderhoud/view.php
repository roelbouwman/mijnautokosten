<?php
/* @var $this OnderhoudController */
/* @var $model Onderhoud */

$autoModel=Auto::model()->findByPk($model->tbl_auto_idtbl_auto);

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Onderhoud'=>array('lijst', 'id'=>$model->tbl_auto_idtbl_auto),
	$model->datum,
);

?>
<br>
<h1>Onderhoud <?php echo $model->datum; ?> <?php echo $autoModel->merk; ?> <?php echo $autoModel->type; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idtbl_onderhoud',
		'datum',	
		'omschrijving',
		'kosten',
		//'tbl_auto_idtbl_auto',
		'kmstand',
	),
)); ?>
