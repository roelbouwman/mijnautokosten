<?php
/* @var $this AutoController */
/* @var $dataProvider CActiveDataProvider */

if((new Auto)->getUserAuto()==NULL)
{
	echo "<br /><br />";
	echo  CHtml::button('Nieuwe Auto invoeren', array('submit' => array('auto/create'), 'class'=>'button2'));
	echo "<br /><br /><br /><br />";
}

$this->breadcrumbs=array(
	'Auto\'s',
);

?>
<br />
<h1>Auto's</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<br />
<br />

