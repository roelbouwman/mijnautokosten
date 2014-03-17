<?php
/* @var $this VergoedingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vergoedings',
);


?>

<h1>Vergoedings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
