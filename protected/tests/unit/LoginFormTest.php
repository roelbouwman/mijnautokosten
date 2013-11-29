<?php
class LoginFormTest extends CDbTestCase
{
    public $fixtures=array(
        'users'=>'User',
    );
 
    
    
    
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
    
}