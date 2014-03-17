<?php
/* @var $this SiteController */
?>

Maak een keuze uit het menu:
<br />
<br />
<a href="?r=tankbeurt/createMobiel" class="button">Tankbeurt</a>
<br />
<br />
<br />
<a href="?r=onderhoud/createMobiel" class="button">Onderhoud</a>
<br />
<br />
<br />
<a href="?r=vergoeding/createMobiel" class="button">Vergoeding</a>
<br />
<br />
<br />
<a href="?r=auto/create" class="button">Auto</a>
<br />
<br />
<br />
<?php 
if(Yii::app()->user->id!=null){
	echo "<a href='?r=site/logout' class='button'>Logout</a>";
}
?>
<br />
