<?php
/* @var $this AutoController */
/* @var $model Auto */

$this->breadcrumbs=array(
	'Auto\'s'=>array('index'),
	'Nieuwe Auto Toevoegen',
);

?>
<br>
<h1>Nieuwe Auto Toevoegen</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>