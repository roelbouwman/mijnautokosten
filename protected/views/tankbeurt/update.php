<?php
/* @var $this TankbeurtController */
/* @var $model Tankbeurt */

$autoModel=Auto::model()->findByPk($model->tbl_auto_idtbl_auto);

$this->breadcrumbs=array(
	'Auto\'s'=>array('auto/index'),
	'Tankbeurten'=>array('lijst', 'id'=>$model->tbl_auto_idtbl_auto),
	$model->datum,
);


?>
<br>
<h1>Wijzigen Tankbeurt <?php echo $model->datum; ?> <?php echo $autoModel->merk; ?> <?php echo $autoModel->type; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>