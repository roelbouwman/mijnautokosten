<?php
/* @var $this UserController */
/* @var $model User */

//$model=User::getUser();
//echo $model->email;

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->idtbl_user=>array('view','id'=>$model->idtbl_user),
	'Update',
);

?>

<h1>Wijzig gebruiker: <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>