<?php
/* @var $this DashboardController */

$this->breadcrumbs=array(
	'Dashboard',
);
?>
<h1><?php echo $this->id ?></h1>

<?php 
if(Auto::getUserAuto()==NULL)
{
	echo "Er is nog geen auto aangemaakt, ga naar menu auto's en maak een auto aan.";
}else{
	
	$this->renderPartial('_dashboard', array('auto'=>Auto::getUserAuto()));
}
?>
