<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Gebruikers'=>array('index'),
	'Nieuw',
);

?>

<h1>Nieuwe gebruiker aanmaken</h1>
<br>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>