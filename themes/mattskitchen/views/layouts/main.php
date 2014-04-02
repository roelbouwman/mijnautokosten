<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="content-language" content="nl" />
	<meta name="description" content="Met deze website kun je je autokosten bijhouden! Voer tankbeurten, onderhoud en je vergoeding in en bekijk de grafieken en meters. Log in met het demo account en krijg alvast een indruk hoe de applicatie werkt..." />
	<meta name="keywords" content="gratis, autokosten, berekenen, tankbeurt, onderhoud, kosten, auto, inzicht, grafiek, meten, app, smartphone" />
	<meta name="author" content="Roel Bouwman" />
	

  <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/favicon.ico" type="image/x-icon" >

  <!-- blueprint CSS framework -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/css3-buttons.css" media="screen" />
  
  <!--[if gt IE 8]>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
  <![endif]-->

  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr-2.6.2.js"></script>

  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  
  <script>
        $(document).ready(function() {
            // Toggle the dropdown menu's
            $(".dropdown .button, .dropdown button").click(function () {
                $(this).parent().find('.dropdown-slider').slideToggle('fast');
                $(this).find('span.toggle').toggleClass('active');
                return false;
            });
        }); // END document.ready
        
        // Close open dropdown slider/s by clicking elsewhwere on page
        $(document).bind('click', function (e) {
            if (e.target.id != $('.dropdown').attr('class')) {
                $('.dropdown-slider').slideUp();
                $('.dropdown.toggle').removeClass('active');
            }
        }); // END document.bind
    </script>
</head>

<body>

<div class="container" id="wrapper">

  <header id="header">
    <div id="logo"><?php echo CHtml::link(CHtml::encode(Yii::app()->name), '/'); ?></div>

    <nav id="mainmenu">
      <?php
        $menuItems = array(
          array('label'=>'Home', 'url'=>array('/site/index')),
          array('label'=>'Dashboard', 'url'=>array('/dashboard/index')),
          array('label'=>'Auto\'s', 'url'=>array('/auto/index')),
          array('label'=>'user', 'url'=>array('/user/update')),
          //array('label'=>'Over...', 'url'=>array('/site/page', 'view'=>'about')),
          array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
          array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
        );
      ?>
      <?php $this->widget('zii.widgets.CMenu',array(
        'items'=>$menuItems,
        'firstItemCssClass'=>'first',
        'lastItemCssClass'=>'last',
      )); ?>
    </nav><!-- mainmenu -->
  </header><!-- header -->

  <div id="main-wrapper"><div id="main" role="main">
  <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	<div class="content">
    <?php echo $content; ?>
    </div>
  </div></div><!-- main -->

  <footer id="footer">
    <nav id="footermenu">
    	<?php array_push($menuItems,
    							array('label'=>'Over...', 'url'=>array('/site/page', 'view'=>'about')));?>
      <?php $this->widget('zii.widgets.CMenu',array('items'=>$menuItems)); ?>
    </nav>
    <div class="content">
      <?php echo Yii::powered(); ?>
    </div>
  </footer><!-- footer -->

</div><!-- wrapper -->

</body>
</html>
