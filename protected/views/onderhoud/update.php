<?php
/* @var $this OnderhoudController */
/* @var $model Onderhoud */

$autoModel=(new Auto)->model()->findByPk($model->tbl_auto_idtbl_auto);

$this->breadcrumbs=array(
	'Onderhoud'=>array('index'),
	'Update',
);

?>
<br>
<h1>Wijzig Onderhoud <?php echo $model->datum; ?> <?php echo $autoModel->merk; ?> <?php echo $autoModel->type; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>