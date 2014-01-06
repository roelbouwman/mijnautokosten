<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $idtbl_user
 * @property string $username
 * @property string $password
 * @property string $password_repeat
 * @property string $salt
 * @property string $email
 * @property string $roles
 * @property string $woonplaats
 *
 * The followings are the available model relations:
 * @property TblAuto[] $tblAutos
 */
class User extends CActiveRecord
{
	public $password_repeat;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
			array('username', 'unique'),
			array('username, password, email, woonplaats', 'required'),
			array('username, password, salt, email', 'length', 'max'=>128),
			array('password', 'compare'),
			array('password_repeat', 'safe'),
			array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_user, username, password, salt, email', 'safe', 'on'=>'search'),
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
			'tblAutos' => array(self::HAS_MANY, 'TblAuto', 'tbl_user_idtbl_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_user' => 'ID',
			'username' => 'Gebruikersnaam',
			'password' => 'Wachtwoord',
			'password_repeat' => 'Wachtwoord herhalen',
			'salt' => 'Salt',
			'email' => 'Email',
		);
	}

	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}
	
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}
	
	/**
	 * This function generates a password salt as a string of x (default = 15) characters
	 * in the a-zA-Z0-9!@#$%&*? range.
	 * @param $max integer The number of characters in the string
	 * @return string
	 * @author AfroSoft <info@afrosoft.tk>
	 */
	function generateSalt($max = 15) {
		$characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$i = 0;
		$salt = "";
		while ($i < $max) {
			$salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
			$i++;
		}
		return $salt;
	}
	
	/**
	 * Returns the user
	 * Enter description here ...
	 * @throws CHttpException
	 */
	public function getUser()
	{
		//TODO:refactor to english
		if(Yii::app()->user->id!=null)
		{
			$user=User::model()->findByPk(Yii::app()->user->id);
			return $user;
		} else {
			throw new CHttpException(404,'Er is iets vreselijk mis gegaan!');
		}
		
	}
	
	public function beforeSave() {
		//het wachtwoord hashen met de salt
		//TODO: als de gebruikersnaam of email wordt gewijzigd mag het password niet
		//opnieuw worden gezet!!!
		if($this->password!=""){
			$newSalt=$this->generateSalt(10);
			$newPass=$this->hashPassword($this->password, $newSalt);
			$this->salt=$newSalt;
			$this->password=$newPass;
			$this->roles="leden";
		}
		
		return parent::beforeSave();
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}