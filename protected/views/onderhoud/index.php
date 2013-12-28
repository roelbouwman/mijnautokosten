<?php
/* @var $this OnderhoudController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Onderhouds',
);

?>

<h1>Onderhouds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
