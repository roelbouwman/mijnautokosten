<?php
/* @var $this AutoController */
/* @var $model Auto */

$this->breadcrumbs=array(
	'Auto\'s'=>array('index'),
	'Wijzig',
);

?>
<br>
<h1>Update <?php echo $model->merk; ?> <?php echo $model->type; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>