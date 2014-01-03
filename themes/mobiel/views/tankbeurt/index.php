<?php
/* @var $this TankbeurtController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tankbeurts',
);

?>

<h1>Tankbeurt</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
