<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"> 
 
  <!-- BEGIN HEAD --> 
  <head profile="http://gmpg.org/xfn/11"> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" /> 
    <title><?php echo Yii::app()->name ?></title> 
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl ?>/css/style.css" /> 
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/schemes.css" type="text/css" media="screen" /> 

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
        <!--[if lt IE 8]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
    <![endif]--> 
    <link rel="icon" type="image/png" href="<?php echo Yii::app()->theme->baseUrl?>/images/favicon.png" /> 
    <script type="text/javascript"> 
      search_string = 'search';
      menu_collapse = false;
      menu_speed = 250;
    </script> 
        <meta name='robots' content='noindex,nofollow' /> 
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl ?>/js/l10n.js'></script> 
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl ?>/js/jquery.js'></script> 
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl ?>/js/common.js'></script> 
</head> 
  <!-- END HEAD --> 
 
  <!-- BEGIN BODY --> 
  <body class="home blog"> 
    <div id="wrapper"> 
 
      <!-- BEGIN LOGO --> 
      <a id="logo" href="index.php?r=site/index" title="<?php echo Yii::app()->name ?>"> 
        <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/logo.png" alt="Simple Mobile" /> 
      </a>
      <!-- END LOGO --> 
 
      <div class="hr"></div> 
 
      <!-- BEGIN HEADER --> 
           <!--  <img id="header" src="<?php echo Yii::app()->theme->baseUrl?>/images/header.jpg" alt="" /> --> 
            <!-- END HEADER --> 
 
      <div class="hr"></div> 
 
      <!-- BEGIN NAVIGATION & SEARCH --> 
     
       
      <!-- END NAVIGATION & SEARCH --> 
 
      <!-- BEGIN MENU --> 
   
      <!-- END MENU--> 
 
      <div class="hr bold"></div> 
 
        <div id="content">
        	
            <?php echo $content ?>
             
        </div>

    <div class="hr bold"></div> 
 
    <!-- BEGIN FOOTER --> 
    <div id="footer"> 
      <span class="copyright">&copy; <?php echo Yii::app()->name ?> <?php echo date('Y') ?></span> 
       
      
    </div> 
    <!-- END FOOTER --> 
 
  </div><!-- end div #wrapper --> 
 
  
  </body> 
  <!-- END BODY --> 
 
</html>
