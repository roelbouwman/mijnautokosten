<?php
/* @var $this DashboardController */
/* @var $model Auto */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . " " . $auto->merk;
?>

<!-- BEGIN DIALOOGVENSTER -->

<?php

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'dialogBrandstof',
    // additional javascript options for the dialog plugin
    'options' => array(
        'title' => 'Verloop brandstof kosten',
        'autoOpen' => false,
        'width' => 820,
    //'height'=>400
    ),
));

echo $this->renderPartial('_brandstofverloop');	

$this->endWidget('zii.widgets.jui.CJuiDialog');

?>

<!-- EIND DIALOOGVENSTER -->
<font color=red>
<?php
if($auto->verzekering==NULL||$auto->wegenbelasting==NULL){
	echo "Je hebt nog niet alle gegevens van je auto ingevuld, daarom werkt het dashboard niet goed<br>";
	echo CHtml::link('Klik hier voor het aanvullen van de gegevens',array('auto/update', 'id'=>$auto->idtbl_auto));
}
?>
</font>
<table>
	<tr>
    	<td>    	
    	<?php $form=$this->beginWidget('CActiveForm', array(
        	'id'=>'auto-form',
        	'enableAjaxValidation'=>false,
			));
		?>
		 <div class="row">
		 wijzig hoofdauto: 
	    <?php
	        $cars = CHtml::listData(Auto::getUserAutos(),'idtbl_auto', 'type', 'merk');
	         
	        echo CHtml::dropDownList('car_name', '', $cars, array('prompt'=>'Maak een keuze'));
	        echo CHtml::submitButton("ok");
	    ?>
		
	    </div>
		<?php $this->endWidget(); ?>
    	</td>
    </tr>
    <tr>
        <td align="center">
            <?php
            $verbruik=new Tankbeurt();
            $verbruik = Tankbeurt::model()->verbruik($auto->idtbl_auto);
            $verbruikHkm = 100 / Tankbeurt::model()->verbruik($auto->idtbl_auto);
			
            $this->widget('ext.egauge.EGauge', array('value' => (int) round($verbruik),
                'end' => 30,
                'prefix' => '1:'));

            $this->widget('ext.egauge.EGauge', array('value' => (int) round($verbruikHkm),
                'end' => 10,
                'suffix' => ':100km'));
            ?> 	
        </td>
   
    	<td>
    	<?php 
    	//these variables are used in the highchartswidget also
    	$totaalTanken = Tankbeurt::model()->totaalTankbeurten($auto->idtbl_auto);
        $totaalOnderhoud = Onderhoud::model()->totaalOnderhoud($auto->idtbl_auto);
        $totaalExtraKosten = Onderhoud::model()->totaalExtraKosten($auto->idtbl_auto);
        $belasting = Auto::getMonths($auto->afschaf, $auto->aanschaf) * $auto->wegenbelasting;
        $verzekering = Auto::getMonths($auto->afschaf, $auto->aanschaf) * $auto->verzekering;
    	$knPerMaand = $totaalTanken + $totaalOnderhoud + $belasting + $verzekering;
    	$totaalVergoeding = Vergoeding::totaalVergoedingen($auto->idtbl_auto);
    	
//$columnsArray = array('id','name','lastname','tel','email');
$rowsArray = array(
    array('aantal maanden in bezit',Auto::getMonths($auto->afschaf, $auto->aanschaf)),
    array('aantal jaren in bezit',round(Auto::getMonths($auto->afschaf, $auto->aanschaf) / 12, 2)),
    array('totaal gereden km',Tankbeurt::model()->aantalkm($auto->idtbl_auto)),
    array('brandstofprijs', CHtml::button(Tankbeurt::model()->laatsteBrandstofprijs($auto->idtbl_auto), array('onclick' => '$("#dialogBrandstof").dialog("open"); return false;'))), 
    //array('<b>kosten per maand</b>',round($knPerMaand/Auto::getMonths($auto->afschaf, $auto->aanschaf))),  
);
 
$this->widget('ext.htmltableui.htmlTableUi',array(
    //'collapsed'=>false,
    //'enableSort'=>true,
    'title'=>'Dashboard',
    //'subtitle'=>'Rev 1.3.3',
    //'columns'=>$columnsArray,
    'rows'=>$rowsArray,
	'cssFile'=>'css/style.css',
    //'footer'=>'Totaal rijen: '.count($rowsArray)
));
?>
    	
    	</td>
    </tr>
    <tr>
        <td>
            <?php
                        
            //here the variables are used for the second time
            $this->Widget('ext.highcharts.HighchartsWidget', array(
                'options' => array(
                    'chart' => array(
                        'type' => 'column',
                        'width' => 400,
                        'height' => 300
                    ),
                    'title' => array('text' => 'Autokosten'),
                    'xAxis' => array(
                        'categories' => array($auto->merk.' '.$auto->type)
                    ),
                    'yAxis' => array(
                        'title' => array('text' => 'In keiharde euros')
                    ),
                    'series' => array(
                        array('name' => 'Onderhoud', 'data' => array((int) $totaalOnderhoud), 'color'=> 'blue'),
                        array('name' => 'Extra Kosten', 'data' => array((int) $totaalExtraKosten), 'color'=> 'orange'),
						array('name' => 'Tanken', 'data' => array((int) $totaalTanken), 'color'=> 'navy'),
						array('name' => 'Belasting', 'data' => array((int) $belasting), 'color'=> 'gray'),
						array('name' => 'Verzekering', 'data' => array((int) $verzekering), 'color'=> 'darkgray')                        
                    )
                )
            ));
            ?>
        </td>
   
        <td>
            <?php
                        
            //here the variables are used for the second time
            $this->Widget('ext.highcharts.HighchartsWidget', array(
                'options' => array(
                    'chart' => array(
                        'type' => 'column',
                        'width' => 400,
                        'height' => 300
                    ),
                    'plotOptions' => array(
                		'column' => array('stacking' => 'normal')
                    ),
                    'title' => array('text' => 'Autokosten vs Vergoedingen'),
                    'xAxis' => array(
                        'categories' => array('kosten','vergoeding')
                    ),
                    'yAxis' => array(
                        'title' => array('text' => 'In keiharde euros')
                    ),
                    'series' => array(
                        array('name' => 'onderhoud', 'data' => array( (int) $totaalOnderhoud, 0,),'color'=> 'blue'),
                        array('name' => 'Extra Kosten', 'data' => array((int) $totaalExtraKosten), 'color'=> 'orange'),
                        array('name' => 'tanken', 'data' => array ( (int) $totaalTanken, 0), 'color'=> 'navy'),
                        array('name' => 'belasting', 'data' => array ( (int) $belasting, 0), 'color'=> 'gray'),
                        array('name' => 'verzekering', 'data' => array ( (int) $verzekering, 0), 'color'=> 'darkgray'),
                        array('name' => 'vergoeding', 'data' => array ( 0, (int) $totaalVergoeding), 'color'=> 'green')
                    )
                )
            ));
            
            
            ?>
        </td>
    </tr>
</table>




