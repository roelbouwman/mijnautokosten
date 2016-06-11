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
 * @property string $terugkerendeVergoeding
 * @property string $einddatum
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
			array('omschrijving, terugkerendeVergoeding', 'length', 'max'=>45),
			array('datum, einddatum', 'safe'),
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
	 * @param integer $id
	 * @return integer totaal
	 */
	public function totaalVergoedingen($id)
	{
		$bedrag = (new Vergoeding)->model()->berekenTerugkerendeVergoeding($id);

		//Moet eigenlijk met dBcriteria maar is (nog) niet gelukt
		$sql = "SELECT sum(vergoeding) FROM tbl_vergoeding where tbl_auto_idtbl_auto=".$id.
		" and (terugkerendeVergoeding='' or terugkerendeVergoeding='eenmalig');";
		$sum = Yii::app()->db->createCommand($sql)->queryScalar();
		
		$sum= $sum+$bedrag;
		
		return $sum;
	}
	
	/**
	 * rekent de terugkerende vergoeding uit aan de hand van de startdatum
	 * @param integer $id
	 * @return integer bedrag
	 */
	private function berekenTerugkerendeVergoeding($id)
	{
		$bedragWekelijks = (new Vergoeding)->model()->berekenPerInterval($id, "wekelijks");
		$bedragMaandelijks = (new Vergoeding)->model()->berekenPerInterval($id, "maandelijks");
		$bedragJaarlijks = (new Vergoeding)->model()->berekenPerInterval($id, "jaarlijks");
		
		return $bedragJaarlijks+$bedragMaandelijks+$bedragWekelijks;
	}
	
	/**
	 * 
	 * Geeft per interval (wekelijks, maandelijks, jaarlijks) de totale vergoeding terug
	 * @param integer $id
	 * @param string $interval
	 * @return float totaal_vergoeding
	 */
	private function berekenPerInterval($id, $intervalArg)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("tbl_auto_idtbl_auto=:tbl_auto_idtbl_auto");
		$criteria->addCondition("terugkerendeVergoeding=:terugkerendeVergoeding");
		$criteria->params = array(':tbl_auto_idtbl_auto' => $id, ':terugkerendeVergoeding'=>$intervalArg);
		$interval = (new Vergoeding)->model()->findAll($criteria);
		
		$bedrag=0.0;
		
		foreach($interval as $iteratie) 
		{ 
			$aantal = (new Vergoeding)->model()->datumInterval($iteratie['datum'], $iteratie['einddatum'], $intervalArg);
						
			$bedrag=$bedrag+((float)$aantal*(float)$iteratie['vergoeding']);
		}
				
		return $bedrag;
	}
	
	
	/**
	 * 
	 * rekent aantal dagen, weken of maanden tussen twee datums uit
	 * @param datum $date1
	 * @param datum $date2
	 * @return integer interval
	 */
	private function datumInterval($date11, $date12, $intervalArg)
	{
		$date1 = new DateTime($date11);
		if($date12=='01-01-1970'){
			$date2 = new DateTime('now');
		}else{
			$date2 = new DateTime($date12);	
		}
				
    	$interval = $date1->diff($date2);
    	$years = $interval->format('%y');
    	$months = $interval->format('%m');
    	$days = $interval->format('%a');
    	    	
    	$weeks =0;
    	if ($days>0)
    	{
    		$weeks = round($days/7);	
    	}
    	 
    	$returnwaarde=0;
		switch ($intervalArg) {
		    case "wekelijks":
		    	//echo "weken: ".$weeks."<br>";
		        $returnwaarde=$weeks;
		        break;
		    case "maandelijks":
		        //echo "maanden: ".$months."<br>";
		    	$returnwaarde=$months;
		        break;
		    case "jaarlijks":
		    	//echo "jaren: ".$years."<br>";
		        $returnwaarde=$years;
		        break;
		}
    	
    	return $returnwaarde;
	}
	
	public function beforeSave() 
	{
		$this->datum = date("Y-m-d", strtotime($this->datum));
		$this->einddatum = date("Y-m-d", strtotime($this->einddatum));
	
		return parent::beforeSave();
	}
	
	public function afterFind()
	{
		$this->datum = date("d-m-Y", strtotime($this->datum));
		$this->einddatum = date("d-m-Y", strtotime($this->einddatum));
		
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