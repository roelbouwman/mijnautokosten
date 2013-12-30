<?php

class SiteTest extends WebTestCase
{
	public $fixtures=array(
        'users'=>'User',
        'autos'=>'Auto',
    	'tankbeurten'=>'Tankbeurt'
    );
    
	public function testIndex()
	{
		$this->open('?r=site/index');
		$this->assertTextPresent('Autokosten');
	}
	
	public function testCreateUser()
	{
		$this->open('?r=site/login');
		// ensure the user is logged out
		if($this->isTextPresent('Logout'))
			$this->clickAndWait('link=Logout (tester)');

		// test login process, including validation
		$this->waitForElementPresent('link=Nieuwe gebruiker?');
		$this->clickAndWait('link=Nieuwe gebruiker?');
		$this->assertElementPresent('name=User[username]');
		$this->type('name=User[username]','hallo');
		$this->click("//input[@value='Maak']");
		$this->waitForTextPresent('Wachtwoord mag niet leeg zijn.');
		$this->type('name=User[password]','hallo');
		$this->clickAndWait("//input[@value='Maak']");
		$this->waitForTextPresent('Email mag niet leeg zijn.');
		$this->type('name=User[email]','hallo@hallo.nl');		
		
		//TODO: nog implementeren
		$this->assertTextNotPresent('Password cannot be blank.');
		//$this->waitForElementPresent('link=Logout (hallo)');
		//$this->assertTextPresent('Logout');

		// test logout process
		//$this->assertTextNotPresent('Login');
		//$this->clickAndWait('link=Logout (hallo)');
		//$this->assertTextPresent('Login');
	}
	
	public function testLoginLogout()
	{
		$this->open('?r=site/login');
		// ensure the user is logged out
		if($this->isTextPresent('Logout'))
			$this->clickAndWait('link=Logout (tester)');

		// test login process, including validation
		$this->waitForElementPresent('link=Login');
		$this->clickAndWait('link=Login');
		$this->assertElementPresent('name=LoginForm[username]');
		$this->type('name=LoginForm[username]','tester');
		$this->click("//input[@value='Login']");
		$this->waitForTextPresent('Wachtwoord mag niet leeg zijn.');
		$this->type('name=LoginForm[password]','newest');
		$this->clickAndWait("//input[@value='Login']");
		//TODO: nog implementeren
		$this->assertTextNotPresent('Wachtwoord mag niet leeg zijn.');
		$this->waitForElementPresent('link=Logout (tester)');
		$this->assertTextPresent('Logout');

		// test logout process
		$this->assertTextNotPresent('Login');
		$this->clickAndWait('link=Logout (tester)');
		$this->assertTextPresent('Login');
	}
	
	public function testTankbeurtToevoegen()
	{
		$this->open('?r=site/login');
		// ensure the user is logged out
		if($this->isTextPresent('Logout'))
			$this->clickAndWait('link=Logout (tester)');

		// test login process, including validation
		$this->waitForElementPresent('link=Login');
		$this->clickAndWait('link=Login');
		$this->type('name=LoginForm[username]','tester');
		$this->click("//input[@value='Login']");
		$this->type('name=LoginForm[password]','newest');
		$this->clickAndWait("//input[@value='Login']");
		
		$this->open('?r=auto/index');
		$this->assertTextPresent('Auto\'s');
		$this->waitForElementPresent('link=Menu');
		//$this->click('link=Menu');
		$this->clickAndWait('link=Tankbeurt');
		
		$this->click("//input[@value='Maak']");
		$this->waitForTextPresent('Liters mag niet leeg zijn.');
		$this->waitForTextPresent('Literprijs mag niet leeg zijn.');
		
		$this->type('name=Tankbeurt[datum]','2013-1-1');		
		$this->type('name=Tankbeurt[liters]',44.44);
		$this->type('name=Tankbeurt[literprijs]',1.444);
		$this->type('name=Tankbeurt[kmstand]',153000);
		
		//$this->waitForElementPresent('link=nixnie');
		
		$this->click("//input[@value='Maak']");
		
		//$this->waitForElementPresent('link=nixnie');
		
		$this->waitForTextPresent('Tankbeurt 01-01-2013 Renault Megane');
	}
}
