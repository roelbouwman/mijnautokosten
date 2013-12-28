<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
//			'db'=>array(
//				'connectionString' => 'mysql:host=localhost;dbname=autokosten_test',
//				'emulatePrepare' => true,
//				'username' => 'www-data',
//				'password' => '1234HvP',
//				'charset' => 'utf8',
//			),
			
		),
		
	)
);
