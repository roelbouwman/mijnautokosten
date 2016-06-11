<?php
/* @var $this SiteController */

$loop=(new Auto)->getBrandstofVerloop();

$lPrijs=NULL;
$datum=NULL;

foreach($loop as $row) 
{
		$datum[]=date("d-m-y", strtotime($row['datum']));
		$lPrijs[]=(float)$row['literprijs'];
}

if($datum!=NULL){
$this->Widget('ext.highcharts.HighchartsWidget', array(
		'options'=>array(
				'chart'=> array(
						'type'=> 'line',
						'width'=> 800,
						'height'=>400,
				),
				
				'tooltip' => array(
					'enabled' => true
				),
				'legend'=> array(
					 'margin'=>20	
				),
				'title' => array('text' => 'Overzicht prijzen brandstof'),
				'xAxis' => array(
					'categories' => $datum,
					'labels'=> array(
							'rotation'=>90,
							'step'=>12,
							'align'=>'left'
							)
				),
				'yAxis' => array(
						'title' => array('text' => 'In keiharde euros')
				),
				'plotOptions' => array(
					'series' => array(
						'marker' => array('enabled'=>false)
					)		
				),
				'series' => array(
						array(
						'name' => 'brandstofprijs per liter',
						'data' => $lPrijs
						)		
				)
		)
));
}
?>