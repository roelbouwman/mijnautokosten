<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;


?>
<br>

<h1>Mijn <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>
Met deze app kun je je autokosten bijhouden, voer tankbeurten in via je telefoon
en bekijk later op de website de grafieken en meters. Bereken hier je autokosten.

</p>
<p>
<b>Demo</b><br>
Log in met het <?php echo CHtml::link('demo', array('site/login')); ?> account en krijg alvast een indruk hoe de applicatie werkt.
Met het demo account kun je alleen raadplegen maar niet wijzigen, toevoegen of verwijderen. Het demo account heeft representatieve
voorbeeld gegevens zodat je een goede indruk krijgt van de mogelijkheden.<br>
</p>
<p>
<div class="row">
<font color="green" >Gebruikersnaam:demo</font>
</div>
<div class="row">
<font color="green" >Wachtwoord:demo</font>
</div>
</p>
<p>
<b>Gratis account</b><br>
Deze app is geheel gratis, maak gratis een <?php echo CHtml::link('account', array('user/create')); ?> aan en begin meteen met het vastleggen van je 
autokosten
</p>
<p>
<b>Screenshot mobiele app</b><br>
Hieronder zie je een screenshot van de mobiele app. Je gebruikt hiervoor dezelfde url http://www.mijnautokosten.nl 
De app herkent automatisch of je via een mobiel device of een gewone computer verbinding maakt.<br>
<br>
<img src="images/phone.png" alt="Smiley face"> 

</p>