<?php
/* @var $this AutoController */
/* @var $model Auto */

$this->breadcrumbs=array(
	'Auto\'s'=>array('index'),
	'Overzicht Auto',
);


?>
<br>
<h1>Gewijzigd: <?php echo $model->merk; ?> <?php echo $model->type; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idtbl_auto',
		'merk',
		'type',
		'brandstof',
		'beginstand',
		'kenteken',
		'bouwjaar',
		'aanschafprijs',
		'wegenbelasting',
		'verzekering',
		'afschrijving',
		'aanschaf',
		//'tbl_user_idtbl_user',
	),
)); ?>
