<?php
/* @var $this OnderhoudController */
/* @var $model Onderhoud */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Lijst',
);

?>
<br>
<h1>Lijst Onderhoud <?php echo $this->getAutoModel()->merk ?> <?php echo $this->getAutoModel()->type ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'onderhoud-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model,
	'columns'=>array(
		//'idtbl_onderhoud',
		'datum',
		'omschrijving',
		'kosten',
		//'tbl_auto_idtbl_auto',
		'kmstand',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
