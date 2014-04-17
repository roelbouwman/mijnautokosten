<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;


?>
<table>
  <tr>
    <td>
<?php $this->widget('ext.slider.slider',
	array(
            'container'=>'slideshow',
            'width'=>560, 
            'height'=>340, 
            'timeout'=>3000,
            'infos'=>false,
            'constrainImage'=>true,
            'images'=>array('autos.png','brandstofprijzen.png','dashboard.png','loginMobiel.png','tankbeurt.png','tankbeurtDatum.png','tankbeurten.png','tankbeurtMobiel.png', ),)
            //'alts'=>array('First description','Second description','Third description','Four description'))
	);?>
    
    </td>
    <td>
<p>
Bereken met deze app je autokosten, voer tankbeurten in via je telefoon
en bekijk later op de website de grafieken en meters. Ga naar de veelgestelde <?php echo CHtml::link('vragen', array('site/page&view=about')); ?> voor meer informatie.
<br><br>
Bekijk de <a href="#release notes">release notes</a> met de laatste wijzigingen.
</p>

<p>
<b>Demo</b><br>
Log in met het <?php echo CHtml::link('demo', array('site/login')); ?> account en krijg alvast een indruk hoe de applicatie werkt.
Met het demo account kun je raadplegen, wijzigen en toevoegen maar niet verwijderen. Het demo account heeft representatieve
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
	</td>
  </tr>
</table>

<p>
<b>Gratis account</b><br>
Deze app is geheel gratis, maak gratis een <?php echo CHtml::link('account', array('user/create')); ?> aan en begin meteen met het vastleggen van je 
autokosten
</p>
<p>
<b>Mobiele app</b><br>
Surf met je smartphone naar <code>http://www.mijnautokosten.nl</code> en de app herkent automatisch dat je via een mobiel device verbinding maakt.<br>
</p>
<p>
<b><a name="release notes"></a>Release notes</b><br>
<i>Versie 1.4.1:</i> stacked bar bij grafiek vergoeding en totale kosten gemaakt, releasenotes aan index toegevoegd, knop voor openen grafiek bij brandstofprijs toegevoegd<br> 
<i>Versie 1.4:</i> nieuwe indexpagina, FAQ toegevoegd bij scherm over...<br>
<i>Versie 1.3.9:</i> meta tags aangepast<br>
<i>Versie 1.3.8:</i> grafieken aangepast, gekleurde bars. scherm wijzig/invoer auto aangepast: melding dat bedragen per maand zijn<br>
<i>Versie 1.3.7:</i> nieuwe functionaliteit 'vergoeding' toegevoegd<br>
<i>Versie 1.3.5:</i> mailen van wachtwoord verbeterd, checkt nu ook of email bestaat. Zoniet dan geen wachtwoord reset<br>
<i>Versie 1.3.4:</i> mailfunctionaliteit afgebouwd<br>
<i>Versie 1.3.3:</i> laatste wijzigingen aan de mobiele app, nieuwe knop gemaakt<br>
<i>Versie 1.3.2:</i> mobiele app uitgebreid met menuitem uitloggen, user uitgebreid met woonplaatsveld en bij aanmaken user met password repeat, extra tabel toegevoegd soortbrandstof, bij aanmaken nieuwe auto dropdownlist soortbrandstof toegevoeg<br>
<i>Versie 1.3:</i> mobiele versie productiewaardig gemaakt<br>
<i>Versie 1.2:</i> initiele setup repository
</p>

