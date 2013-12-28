<?php

/**
 * This is the model class for table "tbl_tankbeurt".
 *
 * The followings are the available columns in table 'tbl_tankbeurt':
 * @property integer $idtbl_tankbeurt
 * @property string $datum
 * @property double $liters
 * @property double $literprijs
 * @property integer $kmstand
 * @property double $totaal
 * @property integer $tbl_auto_idtbl_auto
 *
 * The followings are the available model relations:
 * @property TblAuto $tblAutoIdtblAuto
 */
class Tankbeurt extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tankbeurt the static model class
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
		return 'tbl_tankbeurt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kmstand, liters, literprijs, datum', 'required'),
			array('kmstand, tbl_auto_idtbl_auto', 'numerical', 'integerOnly'=>true),
			array('liters, literprijs, totaal', 'numerical'),
			array('datum', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_tankbeurt, datum, liters, literprijs, kmstand, totaal, tbl_auto_idtbl_auto', 'safe', 'on'=>'search'),
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
			'tblAutoIdtblAuto' => array(self::BELONGS_TO, 'TblAuto', 'tbl_auto_idtbl_auto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_tankbeurt' => 'Idtbl Tankbeurt',
			'datum' => 'Datum',
			'liters' => 'Liters',
			'literprijs' => 'Literprijs',
			'kmstand' => 'Kmstand',
			'totaal' => 'Totaal',
			'tbl_auto_idtbl_auto' => 'Tbl Auto Idtbl Auto',
		);
	}

		
	/**
	 * rekent het totaal verbruik aan brandstof uit
	 * @return integer totaal
	 */
	public function totaalTankbeurten($id)
	{
		$sum = Yii::app()->db->createCommand()
		->select('SUM(totaal)')
		->from('tbl_tankbeurt')
		->where('tbl_auto_idtbl_auto=:id', array(':id'=>$id))
		->queryScalar();
		return $sum;
	}
	
	/**
	 * geeft de laatste brandstofprijs
	 * @return float brandstofprijs
	 */
	public function laatsteBrandstofprijs($id)
	{
		$prijs = Yii::app()->db->createCommand()
		->select('literprijs')
		->from('tbl_tankbeurt')
		->where('tbl_auto_idtbl_auto=:id', array(':id'=>$id))
		->order('datum desc')
		->queryScalar();
		return $prijs;
	}
	
	/**
	 * rekent het verbruik uit
	 * @return integer liters
	 */
	public function verbruik($id)
	{
		//TODO: is dit wel de juiste plek? kan misschien beter in het Auto model worden geplaatst
		
		$liters = Yii::app()->db->createCommand()
		->select('SUM(liters)')
		->from('tbl_tankbeurt')
		->where('tbl_auto_idtbl_auto=:id', array(':id'=>$id))
		->queryScalar();
		
		$eersteTankBeurt = Yii::app()->db->createCommand()
		->select('MIN(datum), liters')
		->from('tbl_tankbeurt')
		->where('tbl_auto_idtbl_auto=:id', array(':id'=>$id))
		->queryRow();
				
		$beginstand = Yii::app()->db->createCommand()
		->select('MIN(kmstand)')
		->from('tbl_tankbeurt')
		->where('tbl_auto_idtbl_auto=:id', array(':id'=>$id))
		->queryScalar();
		
		$eindstand = Yii::app()->db->createCommand()
		->select('MAX(kmstand)')
		->from('tbl_tankbeurt')
		->where('tbl_auto_idtbl_auto=:id', array(':id'=>$id))
		->queryScalar();
		
		if(($eindstand-$beginstand)>0)
		{
			//eerste tankbeurt eraf halen om resultaat te laten kloppen
			$liters=$liters-$eersteTankBeurt['liters'];
			$verbruik=($eindstand-$beginstand)/$liters;
		}else{
			$verbruik=1;
		}
		return $verbruik;
	}
	
	/**
	 * rekent het aantal gereden km uit
	 * @return integer km
	 */
	public function aantalkm($id)
	{
		//TODO: is dit wel de juiste plek? kan misschien beter in het Auto model worden geplaatst
				
		$beginstand = Yii::app()->db->createCommand()
		->select('beginstand')
		->from('tbl_auto')
		->where('idtbl_auto=:id', array(':id'=>$id))
		->queryScalar();
		
		$eindstand = Yii::app()->db->createCommand()
		->select('MAX(kmstand)')
		->from('tbl_tankbeurt')
		->where('tbl_auto_idtbl_auto=:id', array(':id'=>$id))
		->queryScalar();
		
		$km=($eindstand-$beginstand);
		
		return $km;
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

		$criteria->compare('idtbl_tankbeurt',$this->idtbl_tankbeurt);
		$criteria->compare('datum',$this->datum,true);
		$criteria->compare('liters',$this->liters);
		$criteria->compare('literprijs',$this->literprijs);
		$criteria->compare('kmstand',$this->kmstand);
		$criteria->compare('totaal',$this->totaal);
		$criteria->compare('tbl_auto_idtbl_auto',$this->tbl_auto_idtbl_auto);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave() 
	{
		$this->datum = date("Y-m-d", strtotime($this->datum));
	
		return parent::beforeSave();
	}
	
	public function afterFind()
	{
		$this->datum = date("d-m-Y", strtotime($this->datum));
		
		parent::afterFind();
	}
}