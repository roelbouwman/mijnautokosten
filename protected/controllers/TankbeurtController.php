<?php

class TankbeurtController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','lijst'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','createMobiel', 'update', 'delete'),
				'roles'=>array('leden'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('test@test.nl'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
				
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionCreate($id)
	{
		$model=new Tankbeurt;
		$model->tbl_auto_idtbl_auto=$id;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
				
		if(isset($_POST['Tankbeurt']))
		{
			$model->attributes=$_POST['Tankbeurt'];
			
			//business logic, berekenen van de prijs
			$model->totaal=$model->literprijs*$model->liters;
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->idtbl_tankbeurt));
		}

		$this->render('create',array(
			'model'=>$model,
			'auto'=>Auto::model()->findByPk($id),
		));
	}

	
	/**
	 * Creates a new model for input from the android app.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionCreateMobiel()
	{
		if(Auto::getUserAuto()==NULL){
			$this->redirect(array('site/page&view=geenauto'));
		}
		
		$model=new Tankbeurt;
				
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
				
		if(isset($_POST['Tankbeurt']))
		{
			$model->attributes=$_POST['Tankbeurt'];
			
			//business logic, berekenen van de prijs
			$model->totaal=$model->literprijs*$model->liters;
						
			if($model->save())
				$this->redirect(array('site/index'));
		}

		$this->render('create',array(
			'model'=>$model,
			//'auto'=>Auto::model()->findByPk($id),
		));
		
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = new Tankbeurt();
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tankbeurt']))
		{
			$model->attributes=$_POST['Tankbeurt'];
                        
                        //business logic, berekenen van de prijs
			$model->totaal=$model->literprijs*$model->liters;
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->idtbl_tankbeurt));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Tankbeurt');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Lists all models.
	 *  @param integer $id the ID of the model to be displayed
	 */
	public function actionLijst($id)
	{
		$model = new Tankbeurt();
		$model->tbl_auto_idtbl_auto=$id;
		
		$criteria = new CDbCriteria();
		$criteria->addSearchCondition('tbl_auto_idtbl_auto', $id, true);
	
		$dataProvider=new CActiveDataProvider('Tankbeurt', array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>10,
				),
		));
				
		$this->render('lijst',array(
			'dataProvider'=>$dataProvider,
			'auto'=>Auto::model()->findByPk($id),
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tankbeurt('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tankbeurt']))
			$model->attributes=$_GET['Tankbeurt'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Tankbeurt::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tankbeurt-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
