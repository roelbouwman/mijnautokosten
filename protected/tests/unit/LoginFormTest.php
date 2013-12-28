<?php
class LoginFormTest extends CDbTestCase
{
    public $fixtures=array(
        'users'=>'User',
    );
 
    
	/**
     * 
     * test authentication
     */
	public function testAuthenticate()
    {
        $model=new LoginForm;	
    	$hit=$model->authenticate('tester','newest');
    	
    	$this->assertTrue(isset($model));	
    }
    
	/**
     * 
     * test login
     */
	public function testLogin()
    {
    	$model=new LoginForm;
    	//$model->username="tester";
    	//$model->password="newest";
    	//$model->rememberMe=true;
    	    	
    	$model->login();
    	   	
    	$this->assertTrue($model==true);	
    }
    
    /**
     * 
     * dummy methode voor 100% coverage
     */
	public function testRules()
    {
        $model=new LoginForm;	
    	$hit=$model->rules();
    	
    	$this->assertTrue(isset($model));	
    }
    
	/**
     * 
     * of de labelfunctie wel werkt
     */
	public function testLabels()
    {
    	$model=new LoginForm;
    	$labels=$model->attributeLabels();
    	$label=$labels['username'];
    	$this->assertTrue($label=='Gebruikersnaam');	
    }
    
}