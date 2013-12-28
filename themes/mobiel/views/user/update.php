<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->idtbl_user=>array('view','id'=>$model->idtbl_user),
	'Update',
);

?>

<h1>Update User <?php echo $model->idtbl_user; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>