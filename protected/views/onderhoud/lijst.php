<?php
/* @var $this OnderhoudController */
/* @var $model Onderhoud */
/* @var $auto Auto */

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Lijst',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('onderhoud-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<br>
<h1>Lijst Onderhoud <?php echo $auto->merk ?> <?php echo $auto->type ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'onderhoud-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model,
	'columns'=>array(
		//'idtbl_onderhoud',
		'datum',
		'onderhoud',
		'omschrijving',
		'kosten',
		//'tbl_auto_idtbl_auto',
		'kmstand',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
