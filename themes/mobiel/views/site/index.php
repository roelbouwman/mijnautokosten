<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$auto="";

if(Yii::app()->user->id!=null)
{
	if(Auto::getUserAuto()!=NULL)
	{
		$auto=Auto::getUserAuto()->merk." ".Auto::getUserAuto()->type;
	} 
}
?>
<h1>Mijn <i><?php echo CHtml::encode(Yii::app()->name." ".$auto); ?></i></h1>

<p>Deze app geeft een overzicht van de kosten van autorijden. Je kunt een nieuwe auto aanmaken
en dan meteen tankbeurten en onderhoud/reparaties in gaan voeren. Het is mijn eerste app met het Yii framework, dus nog een leerpoject!</p>  

<?php 
if(Yii::app()->user->id!=null)
{
	if(Auto::getUserAuto()!=NULL)
	{
		echo $this->renderPartial('_dashboard', array('auto'=>Auto::getUserAuto()));
	} else {
		echo 'Je hebt nog geen auto, koop er een en maak hem een aan in het menu.';
	}
	 
}	else {
		echo 'Als je ingelogd bent zie je op deze pagina een dashboard ;-)'; 
}
?>





