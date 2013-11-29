<?php

/**
 * This is the model class for table "tbl_auto".
 *
 * The followings are the available columns in table 'tbl_auto':
 * @property integer $idtbl_auto
 * @property string $merk
 * @property string $type
 * @property string $brandstof
 * @property integer $beginstand
 * @property string $kenteken
 * @property integer $bouwjaar
 * @property double $aanschafprijs
 * @property double $wegenbelasting
 * @property double $verzekering
 * @property double $afschrijving
 * @property integer $tbl_user_idtbl_user
 * @property string $aanschaf
 * @property integer $hoofdauto
 * @property string $afschaf
 *
 * The followings are the available model relations:
 * @property TblUser $tblUserIdtblUser
 * @property TblOnderhoud[] $tblOnderhouds
 * @property TblTankbeurt[] $tblTankbeurts
 */
class Auto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Auto the static model class
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
		return 'tbl_auto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('merk, type, brandstof, beginstand, kenteken, bouwjaar, aanschafprijs, wegenbelasting, verzekering, aanschaf', 'required'),
			array('beginstand, bouwjaar, tbl_user_idtbl_user', 'numerical', 'integerOnly'=>true),
			array('aanschafprijs, wegenbelasting, verzekering, afschrijving, hoofdauto', 'numerical'),
			array('merk, type, brandstof, kenteken, afschaf', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_auto, merk, type, brandstof, beginstand, kenteken, bouwjaar, aanschafprijs, wegenbelasting, verzekering, afschrijving, tbl_user_idtbl_user', 'safe', 'on'=>'search'),
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
			//'tblUserIdtblUser' => array(self::BELONGS_TO, 'TblUser', 'tbl_user_idtbl_user'),
			'tblOnderhouds' => array(self::HAS_MANY, 'TblOnderhoud', 'tbl_auto_idtbl_auto'),
			'tblTankbeurts' => array(self::HAS_MANY, 'TblTankbeurt', 'tbl_auto_idtbl_auto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_auto' => 'ID',
			'merk' => 'Merk',
			'type' => 'Type',
			'brandstof' => 'Brandstof',
			'beginstand' => 'Beginstand',
			'kenteken' => 'Kenteken',
			'bouwjaar' => 'Bouwjaar',
			'aanschafprijs' => 'Aanschafprijs',
			'wegenbelasting' => 'Wegenbelasting',
			'verzekering' => 'Verzekering',
			'afschrijving' => 'Afschrijving',
			'aanschaf' => 'Datum aanschaf',
			'hoofdauto' => 'Hoofdauto',
			'afschaf' => 'Datum afschaf',
			'tbl_user_idtbl_user' => 'Tbl User Idtbl User',
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

		$criteria->compare('idtbl_auto',$this->idtbl_auto);
		$criteria->compare('merk',$this->merk,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('brandstof',$this->brandstof,true);
		$criteria->compare('beginstand',$this->beginstand);
		$criteria->compare('kenteken',$this->kenteken,true);
		$criteria->compare('bouwjaar',$this->bouwjaar);
		$criteria->compare('aanschafprijs',$this->aanschafprijs);
		$criteria->compare('wegenbelasting',$this->wegenbelasting);
		$criteria->compare('verzekering',$this->verzekering);
		$criteria->compare('afschrijving',$this->afschrijving);
		$criteria->compare('tbl_user_idtbl_user',$this->tbl_user_idtbl_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
   	/**
   	* zet de datum om naar mysql standaard
   	* @return type
   	*/
   	public function beforeSave()
	{
		$this->aanschaf = date("Y-m-d", strtotime($this->aanschaf));
		$this->afschaf = date("Y-m-d", strtotime($this->afschaf));
		//TODO: kan weg?
		/*if($this->afschaf=='01-01-1970')
		{
			
		}*/
				
		if ($this->hoofdauto == 1)
			$this->setMainCar($this->idtbl_auto);
		
		return parent::beforeSave();
	}
	
    /**
    * zet de datum om naar het juiste formaat
    */
    public function afterFind()
	{
		$this->aanschaf = date("d-m-Y", strtotime($this->aanschaf));
		$this->afschaf = date("d-m-Y", strtotime($this->afschaf));
		if($this->afschaf=='01-01-1970')
		{
			$this->afschaf = '';
		}

		parent::afterFind();
	}
	
	/**
	 * Sets the new Main car
	 * Enter description here ...
	 * @param integer $carID
	 */
	public function setMainCar($carID)
	{
		//get user id
		$myId=Yii::app()->user->id;
		
		if ($myId==""){
			throw new Exception('Gebruiker niet aangemeld');
		}
		
		//first set all cars to 0
		$autoID = Yii::app()->db->createCommand()
		->update('tbl_auto', array('hoofdauto'=>0), 'tbl_user_idtbl_user=:id', array(':id'=>$myId));
		
		//then set the new main car
		$updatecar = Yii::app()->db->createCommand()
		->update('tbl_auto', array('hoofdauto'=>1), 'idtbl_auto=:id', array(':id'=>$carID));
				
	}
	
	/**
	 * Calculates number of months between two dates.
	 * @param date $date1
	 * @param date $date2
	 * @return number number of months between date1 and date2
	 */
	public function getMonths($date1, $date2)
	{
		if($date1==''||$date1=='01-01-1970')
		{
			$date1=date("d-m-Y");
		}
		$diff = strtotime($date1) - strtotime($date2);
		
		$total_months = floor($diff / 60 / 60 / 24 / 7 / 4.4);
		
		$years = floor($total_months / 12);
		$months = floor($total_months %12);
		
		return $total_months;
	}
	
	/**
	 * 
	 * returns an array
	 * @throws CHttpException
	 */
	public function getBrandstofVerloop()
	{
		//TODO:refactor to english
		if(Yii::app()->user->id!=null)
		{
			$autoId=Auto::getUserAuto()->idtbl_auto;
			$brandstof = Yii::app()->db->createCommand()
			->select('datum, literprijs')
			->from('tbl_tankbeurt')
			->where('tbl_auto_idtbl_auto=:id', array(':id'=>$autoId))
			->query();
			
			return $brandstof;
		} else {
			throw new CHttpException(404,'Er is iets vreselijk mis gegaan!');
		}
	
	}
	
	/**
	 * Returns the maincar
	 * Enter description here ...
	 * @throws CHttpException
	 */
	public function getUserAuto()
	{
		//TODO:refactor to english
		if(Yii::app()->user->id!=null)
		{
			$myId=Yii::app()->user->id;
			/*$autoID = Yii::app()->db->createCommand()
			->select('*')
			->from('tbl_auto')
			->where('tbl_user_idtbl_user=:id AND hoofdauto=:ha', array(':id'=>$myId, ':ha'=>1))
			->queryScalar();
			$auto=Auto::model()->findByPk($autoID);*/
			
			//TODO: alle queries vervangen door CDbCriteria
			
			$criteria = new CDbCriteria();
			$criteria->select = '*';
			$criteria->condition = 'tbl_user_idtbl_user=:id AND hoofdauto=:ha';
			$criteria->params = array(':id'=>$myId, ':ha'=>1);
			$auto = Auto::model()->find($criteria);
			
			return $auto;
		} else {
			throw new CHttpException(404,'Er is iets vreselijk mis gegaan!');
		}
		
	}
	
	/**
	 * Returns an array with user cars
	 * Enter description here ...
	 * @throws CHttpException
	 */
	public function getUserAutos()
	{
		//TODO:refactor to english
		if(Yii::app()->user->id!=null)
		{
			$myId=Yii::app()->user->id;
			$autos = Yii::app()->db->createCommand()
			->select('*')
			->from('tbl_auto')
			->where('tbl_user_idtbl_user=:id', array(':id'=>$myId))
			->queryAll();
			
			return $autos;
			
		} else {
			throw new CHttpException(404,'Er is iets vreselijk mis gegaan!');
		}
		
	}

}