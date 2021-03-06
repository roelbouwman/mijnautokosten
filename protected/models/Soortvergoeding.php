<?php

/**
 * This is the model class for table "tbl_soortvergoeding".
 *
 * The followings are the available columns in table 'tbl_soortvergoeding':
 * @property integer $idtbl_soortvergoeding
 * @property string $terugkerendeVergoeding
 */
class Soortvergoeding extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Soortvergoeding the static model class
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
		return 'tbl_soortvergoeding';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('terugkerendeVergoeding', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtbl_soortvergoeding, terugkerendeVergoeding', 'safe', 'on'=>'search'),
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
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtbl_soortvergoeding' => 'Idtbl Soortvergoeding',
			'terugkerendeVergoeding' => 'Terugkerende Vergoeding',
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

		$criteria->compare('idtbl_soortvergoeding',$this->idtbl_soortvergoeding);
		$criteria->compare('terugkerendeVergoeding',$this->terugkerendeVergoeding,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}