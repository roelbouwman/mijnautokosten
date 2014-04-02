<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="content-language" content="nl" />
	<meta name="description" content="Met deze website kun je je autokosten bijhouden! Voer tankbeurten, onderhoud en je vergoeding in en bekijk de grafieken en meters. Log in met het demo account en krijg alvast een indruk hoe de applicatie werkt..." />
	<meta name="keywords" content="gratis, autokosten, berekenen, tankbeurt, onderhoud, kosten, auto, inzicht, grafiek, meten, app, smartphone" />
	<meta name="author" content="Roel Bouwman" />
	
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/css3-buttons.css" media="screen" />
	
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<title>Mijn <?php echo CHtml::encode($this->pageTitle); ?></title>
	
	
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

<div class="container" id="page">

    <div id="head">
		  <div id="title">Welkom!</div>
      <div id="menu">
        <ul>
          <li class="active">
            <a href="http://www.mijnautokosten.nl" title="autokosten">Autokosten</a>
          </li>
          
        </ul>
      </div>
    </div>
    <div id="body_wrapper">
      <div id="body">
        <div id="left">
          <div class="top"></div>
          <div class="content">
		
<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	
<?php echo $content; ?>
		

          </div>
          <div class="bottom"></div>
        </div>
        <div id="right">
          <div class="top"></div>
          <div class="content">
            
			<h4>Autokosten</h4>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Dashboard', 'url'=>array('/dashboard/index')),
				array('label'=>'Auto\'s', 'url'=>array('/auto/index')),
				array('label'=>'Over', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Inloggen', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Uitloggen', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
          </div>
          <div class="bottom"></div>
        </div>
        <div class="clearer"></div>
      </div>
      <div class="clearer"></div>
    </div>
    <div id="end_body"></div>
    <div id="footer">
      &copy; Copyright2012 Roel Bouwman
     <br>
	Mede mogelijk gemaakt door: <a href="https://freedns.afraid.org">Free DNS</a>

    </div>
</div>

  </body>
</html>
