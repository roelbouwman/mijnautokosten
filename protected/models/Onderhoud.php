<?php

/**
 * This is the model class for table "tbl_onderhoud".
 *
 * The followings are the available columns in table 'tbl_onderhoud':
 * @property integer $idtbl_onderhoud
 * @property string $omschrijving
 * @property string $datum
 * @property double $kosten
 * @property integer $tbl_auto_idtbl_auto
 * @property integer $kmstand
 *
 * The followings are the available model relations:
 * @property TblAuto $tblAutoIdtblAuto
 */
class Onderhoud extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Onderhoud the static model class
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
		return 'tbl_onderhoud';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('omschrijving, datum, kosten, kmstand, onderhoud', 'required'),
			array('tbl_auto_idtbl_auto, kmstand', 'numerical', 'integerOnly'=>true),
			array('kosten', 'numerical'),
			array('omschrijving', 'length', 'max'=>128),
			array('datum', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_onderhoud, omschrijving, datum, kosten, tbl_auto_idtbl_auto, kmstand', 'safe', 'on'=>'search'),
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
			'idtbl_onderhoud' => 'Idtbl Onderhoud',
			'omschrijving' => 'Omschrijving',
			'datum' => 'Datum',
			'kosten' => 'Kosten',
			'tbl_auto_idtbl_auto' => 'Tbl Auto Idtbl Auto',
			'kmstand' => 'Kmstand',
		);
	}

	/**
	 * rekent het totaal aan onderhoud uit
	 * @return integer totaal
	 */
	public function totaalOnderhoud($id)
	{
		$sum = Yii::app()->db->createCommand()
		->select('SUM(kosten)')
		->from('tbl_onderhoud')
		->where('tbl_auto_idtbl_auto=:id AND onderhoud=:oh', array(':id'=>$id, ':oh'=>'onderhoud'))
		->queryScalar();
		return $sum;
	}
	
	/**
	 * rekent het totaal aan onderhoud uit
	 * @return integer totaal
	 */
	public function totaalExtraKosten($id)
	{
		$sum = Yii::app()->db->createCommand()
		->select('SUM(kosten)')
		->from('tbl_onderhoud')
		->where('tbl_auto_idtbl_auto=:id AND onderhoud=:oh', array(':id'=>$id, ':oh'=>'extra kosten'))
		->queryScalar();
		return $sum;
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

		$criteria->compare('idtbl_onderhoud',$this->idtbl_onderhoud);
		$criteria->compare('omschrijving',$this->omschrijving,true);
		$criteria->compare('datum',$this->datum,true);
		$criteria->compare('kosten',$this->kosten);
		$criteria->compare('onderhoud',$this->onderhoud);
		$criteria->compare('tbl_auto_idtbl_auto',$this->tbl_auto_idtbl_auto);
		$criteria->compare('kmstand',$this->kmstand);

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