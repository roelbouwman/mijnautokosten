<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $idtbl_user
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property string $roles
 * @property string $woonplaats
 */
class AccountForm extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccountForm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'required'),
			array('email', 'exist'),
			array('email', 'email'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
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
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_user' => 'Idtbl User',
			'username' => 'Username',
			'password' => 'Password',
			'salt' => 'Salt',
			'email' => 'Email',
			'roles' => 'Roles',
			'woonplaats' => 'Woonplaats',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idtbl_user',$this->idtbl_user);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('roles',$this->roles,true);
		$criteria->compare('woonplaats',$this->woonplaats,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}