<?php
/* @var $auto Auto */


$this->pageTitle=Yii::app()->name." ".$auto->merk;
?>
<font color = "red">Let op! de database geeft de eerste auto terug, als je dus meerdere auto's hebt krijg je de 
auto die je als eerste hebt ingevoerd...</font>
<br /><br />
<table>
 <tr>
 	<td>
 	Je hebt de auto <b><?php echo $auto->getMonths(date("d-m-Y"), $auto->aanschaf) ?> maanden</b> in bezit.<br />
 	Dat is <b><?php echo round($auto->getMonths(date("d-m-Y"), $auto->aanschaf)/12, 2) ?> jaar</b>.
 	</td>
 </tr>
 <tr>
 	<td>
		<?php 
		$verbruik=Tankbeurt::model()->verbruik($auto->idtbl_auto);
		$verbruikHkm=100/Tankbeurt::model()->verbruik($auto->idtbl_auto);
		
		$this->widget('ext.egauge.EGauge',array('value'=>$verbruik, 'end'=>30));		
		?> 	
		
 	</td>
 </tr>
 <tr>
 	<td>
 	verbruik in <font color='blue'>aantal km/Liter</font>
 	</td>
 </tr>
 <tr>
 	<td>
<?php 		$this->widget('ext.egauge.EGauge',array('value'=>$verbruikHkm, 'end'=>10));?>
 	</td>
 </tr>
 <tr>
 	<td>
 		verbuik in <font color='green'>aantal liters per 100Km</font>
 	</td>
 </tr>
</table>


 

