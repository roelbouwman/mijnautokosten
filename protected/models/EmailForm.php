<?php

/**
 * EmailForm class.
 * EmailForm is the data structure for keeping
 * user login form data. It is used by the 'mail' action of 'UserController'.
 */
class EmailForm extends CFormModel
{
	public $mail;
	
	private $_identity;
      
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('mail', 'required'),
			// password needs to be authenticated
			array('mail', 'email'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'mail'=>'Emailadres',
			
		);
	}

/**
	 * Sends new user password to given e-mailadres
	 * 
	 * @param Emailadres $email
	 */
	public function mailPassword($email)
	{
		//TODO:wachtwoord resetten en dan mailen
		$message=new YiiMailMessage;
                  
        $message->subject='Reset wachtwoord';
        $message->setBody('Uw wachtwoord is gewijzigd in:', 'text/html');                
        $message->addTo($email);
        $message->from = 'info@mijnautokosten.nl';   
        Yii::app()->mail->send($message); 
	}
}
