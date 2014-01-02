<?php
/* @var $this SiteController */

//de returnurl zetten zodat na inloggen meteen het menu geopend wordt
Yii::app()->user->returnUrl="index.php?r=site/menu";
$this->redirect(Yii::app()->user->returnURL);

?>






