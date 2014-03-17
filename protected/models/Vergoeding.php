<?php

/**
 * This is the model class for table "tbl_vergoeding".
 *
 * The followings are the available columns in table 'tbl_vergoeding':
 * @property integer $idtbl_vergoeding
 * @property string $datum
 * @property string $omschrijving
 * @property double $vergoeding
 * @property integer $tbl_auto_idtbl_auto
 *
 * The followings are the available model relations:
 * @property TblAuto $tblAutoIdtblAuto
 */
class Vergoeding extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vergoeding the static model class
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
		return 'tbl_vergoeding';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_auto_idtbl_auto, datum, vergoeding', 'required'),
			array('tbl_auto_idtbl_auto', 'numerical', 'integerOnly'=>true),
			array('vergoeding', 'numerical'),
			array('omschrijving', 'length', 'max'=>45),
			array('datum', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_vergoeding, datum, omschrijving, vergoeding, tbl_auto_idtbl_auto', 'safe', 'on'=>'search'),
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
			'idtbl_vergoeding' => 'Idtbl Vergoeding',
			'datum' => 'Datum',
			'omschrijving' => 'Omschrijving',
			'vergoeding' => 'Vergoeding',
			'tbl_auto_idtbl_auto' => 'Tbl Auto Idtbl Auto',
		);
	}

	/**
	 * rekent het totaal van de vergoedingen uit
	 * @return integer totaal
	 */
	public function totaalVergoedingen($id)
	{
		$sum = Yii::app()->db->createCommand()
		->select('SUM(vergoeding)')
		->from('tbl_vergoeding')
		->where('tbl_auto_idtbl_auto=:id', array(':id'=>$id))
		->queryScalar();
		return $sum;
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
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idtbl_vergoeding',$this->idtbl_vergoeding);
		$criteria->compare('datum',$this->datum,true);
		$criteria->compare('omschrijving',$this->omschrijving,true);
		$criteria->compare('vergoeding',$this->vergoeding);
		$criteria->compare('tbl_auto_idtbl_auto',$this->tbl_auto_idtbl_auto);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}