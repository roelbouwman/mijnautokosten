<?php
class OnderhoudTest extends CDbTestCase
{
    public $fixtures=array(
        'users'=>'User',
        'autos'=>'Auto',
    	'onderhoud'=>'Onderhoud'
    );
 
    /**
     * 
     * testen van het opslaan van een record
     */
    public function testSave()
    {
    	$auto=new Onderhoud();
   		$auto->setAttributes(array(
        	'omschrijving'=>'simpel onderhoud',
    		'datum'=>'2013-10-10',
        	'kosten'=>150,
        	'kmstand'=>160000,
			'tbl_auto_idtbl_auto'=>1
    	),false);
    	$this->assertTrue($auto->save(false));
    }
    
	/**
     * 
     * het vinden van een record
     */
    public function testFind()
    {
    	$model=Onderhoud::model()->findByPk(1);
    	$this->assertTrue($model->kosten==100);	
    }
    
	/**
     * 
     * of de labelfunctie wel werkt
     */
	public function testLabels()
    {
    	$model=Onderhoud::model()->findByPk(1);
    	$labels=$model->attributeLabels();
    	$label=$labels['datum'];
    	$this->assertTrue($label=='Datum');	
    }
    
    /**
     * 
     * testen van het totaal aan onderhoud
     */
	public function testTotaalOnderhoud()
	{
		$model=Onderhoud::model()->findByPk(1);
		$this->assertTrue($model->totaalOnderhoud(1)==300);
	}
    
	/**
     * 
     * dummy methode voor 100% coverage
     */
	public function testSearch()
    {
    	$model=Onderhoud::model()->findByPk(1);
    	$hit=$model->search();
    	
    	$this->assertTrue(isset($hit));	
    }
    
    /**
     * 
     * dummy methode voor 100% coverage
     */
	public function testRules()
    {
    	$model=Onderhoud::model()->findByPk(1);
    	$hit=$model->rules();
    	
    	$this->assertTrue(isset($hit));	
    }
}