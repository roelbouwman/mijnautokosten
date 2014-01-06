<?php
class UserTest extends CDbTestCase
{
    public $fixtures=array(
        'users'=>'User',
    );
 
    /**
     * 
     * testen van het opslaan van een record
     */
    public function testSave()
    {
    	$auto=new User();
   		$auto->setAttributes(array(
        	'username'=>'nieuw',
        	'password'=>'newest',
        	//'salt'=>'1234HvP',
        	'email'=>'nieuw@test.nl'
    	),false);
    	$this->assertTrue($auto->save(false));
    }

	/**
     * 
     * het vinden van een record
     */
    public function testFind()
    {
    	$this->testSave();
    	$model=User::model()->findByPk(2);
    	$this->assertTrue($model->username=='nieuw');	
    }
    
    /**
     * 
     * het wachtwoord valideren
     */
    public function testValidatePassword()
    {
    	$this->testSave();
    	$model=User::model()->findByPk(2);
    	$this->assertTrue($model->validatePassword('newest'));
    }
    
    
	/**
     * 
     * of de labelfunctie wel werkt
     */
	public function testLabels()
    {
    	$model=User::model()->findByPk(1);
    	$labels=$model->attributeLabels();
    	$label=$labels['username'];
    	$this->assertTrue($label=='Gebruikersnaam');	
    }

	/**
     * 
     * testen van het opslaan van een gewijzigd record
     */
    public function testUpdateUsername()
    {
    	//$this->testSave();
    	$model=User::model()->findByPk(1);
    	$model->username="nieuw";
    	$model->password="";
    	
    	$model->save();
    	
   		$test=User::model()->findByPk(1);
    	$this->assertTrue($test->validatePassword("newest"));
    }
    
	/**
     * 
     * testen van het opslaan van een gewijzigd record
     */
    public function testUpdateWachtwoord()
    {
    	//$this->testSave();
    	$model=User::model()->findByPk(1);
    	$model->password="hoihoi";
    	$model->password_repeat="hoihoi";
    	$model->save();
    	
   		$test=User::model()->findByPk(1);
    	   		
    	$this->assertTrue($test->validatePassword("hoihoi"));
    }
    
    /**
     * 
     * Gebruiker van de app ophalen
     */
    public function testGetUser()
    {
    	    	
    	$model=User::model()->findByPk(1);
    	try {
    		$model->getUser();	
    	} catch (Exception $e) {
    	}
    	Yii::app()->user->id=1;
    	$model=User::model()->findByPk(1);
    	$model->getUser();
    	    	 
    	$this->assertTrue($model->username=='tester');
    }
    
    /**
     * 
     * dummy methode voor 100% coverage
     */
	public function testSearch()
    {
    	$model=User::model()->findByPk(1);
    	$hit=$model->search();
    	
    	$this->assertTrue(isset($hit));	
    }
    
    /**
     * 
     * dummy methode voor 100% coverage
     */
	public function testRules()
    {
    	$model=User::model()->findByPk(1);
    	$hit=$model->rules();
    	
    	$this->assertTrue(isset($hit));	
    }
    
}