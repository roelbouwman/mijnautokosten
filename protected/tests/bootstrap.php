<?php

// change the following paths if necessary
$yiit='/var/www/yii/framework/yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
require_once( Yii::getPathOfAlias('system.test.CTestCase').'.php' );
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
