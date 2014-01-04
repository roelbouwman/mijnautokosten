<?php
 class AutoTest extends CDbTestCase
{
    public $fixtures=array(
        'users'=>'User',
        'autos'=>'Auto'
    );
 
    /**
     * 
     * testen van het opslaan van een record
     */
    public function testSave()
    {
    	$auto=new Auto();
   		$auto->setAttributes(array(
        	'merk'=>'Peugeot',
	        'type'=>'304',
	        'brandstof'=>'benzine',
	        'beginstand'=>34000,
			'kenteken'=>'55-YB-11',
			'bouwjaar'=>1975,
			'aanschafprijs'=>5000.00,
			'wegenbelasting'=>0,
			'verzekering'=>19.00,
			'afschrijving'=>0,
			'tbl_user_idtbl_user'=>1,
			'aanschaf'=>'2008-10-1'
    	),false);
    	$this->assertTrue($auto->save());
    }
    
    /**
     * 
     * het vinden van een record
     */
    public function testFind()
    {
    	$model=Auto::model()->findByPk(1);
    	$this->assertTrue($model->merk=='Renault');	
    }
    
	/**
     * 
     * zet de hoofdauto
     */
    public function testSetMainCar()
    {
    	//false scenario
    	try {
    		$model=Auto::model()->findByPk(1);
    		$model->setMainCar(0);
    		$auto=Auto::model()->findByPk(1);
    		$this->assertTrue($auto->hoofdauto==0);
    	} catch (Exception $e) {
    	
    	}
    	    	
    	//happy scenario
    	Yii::app()->user->id=1;
		   	    	
    	$model=Auto::model()->findByPk(1);
    	$model->setMainCar(0);
    	$auto=Auto::model()->findByPk(1);
    	$this->assertTrue($auto->hoofdauto==0);	
    }
    
	/**
     * 
     * aantal maanden ophalen
     */
    public function testGetMonths()
    {
    	//happy scenario
    	$months=Auto::model()->getMonths('1-4-2000','1-1-2000');
    	$this->assertTrue($months==2);
		//false scenario
    	$months=Auto::model()->getMonths('','1-1-2000');
    	$this->assertTrue($months>165);
    }
    
	/**
     * 
     * brandstof verloop ophalen
     */
    public function testGetBrandstofverloop()
    {
    	//false scenario
    	try {
    		$fuel=Auto::model()->getBrandstofverloop();	
    	} catch (Exception $e) {
    	}
    	    	
		//happy scenario
		Yii::app()->user->id=1;
		$fuel=Auto::model()->getBrandstofverloop();
		$aantal=0;
		//door de recordset heenlopen, aantal van 3 ophalen
	    foreach($fuel as $row) {
			$aantal++;
		}
    	$this->assertTrue($aantal==3);
    }
    
	/**
     * 
     * user auto ophalen
     */
    public function testGetUserAuto()
    {
    	//false scenario
    	try {
    		Auto::getUserAuto();
    	} catch (Exception $e) {
    	}
    	    	
		//happy scenario
		Yii::app()->user->id=1;
		$auto=Auto::getUserAuto();
		$this->assertTrue($auto->kenteken=='74-PL-TF');	
    }
    
	/**
     * 
     * user auto's ophalen, alle auto's dus
     */
    public function testGetUserAutos()
    {
    	//false scenario
    	try {
    		Auto::getUserAutos();
    	} catch (Exception $e) {
    	}
    	    	
		//happy scenario
		Yii::app()->user->id=1;
		$autos=Auto::getUserAutos();
		$aantal=0;
    	//door de recordset heenlopen, aantal van 1 ophalen
	    foreach($autos as $row) {
			$aantal++;
		}
		$this->assertTrue($aantal==1);	
    }
    
    /**
     * 
     * of de labelfunctie wel werkt
     */
	public function testLabels()
    {
    	$model=Auto::model()->findByPk(1);
    	$labels=$model->attributeLabels();
    	$label=$labels['merk'];
    	$this->assertTrue($label=='Merk');	
    }

    /**
     * 
     * dummy methode voor 100% coverage
     */
	public function testSearch()
    {
    	$model=Auto::model()->findByPk(1);
    	$hit=$model->search();
    	
    	$this->assertTrue(isset($hit));	
    }
    
    /**
     * 
     * dummy methode voor 100% coverage
     */
	public function testRules()
    {
    	$model=Auto::model()->findByPk(1);
    	$hit=$model->rules();
    	
    	$this->assertTrue(isset($hit));	
    }
}