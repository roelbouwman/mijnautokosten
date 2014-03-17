<?php
/* @var $this VergoedingController */
/* @var $model Vergoeding */

$autoModel=Auto::model()->findByPk($model->tbl_auto_idtbl_auto);

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Vergoedingen'=>array('lijst', 'id'=>$model->tbl_auto_idtbl_auto),
	$model->datum,
);


?>

<h1>Wijzigen vergoeding <?php echo $model->datum; ?> <?php echo $autoModel->merk; ?> <?php echo $autoModel->type; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>