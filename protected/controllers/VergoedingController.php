<?php

class VergoedingController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'lijst'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'createMobiel'),
				'roles'=>array('demo'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'delete', 'createMobiel'),
				'roles'=>array('leden'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
	 * @param integer $id
	 */
	public function actionCreate($id)
	{
		$model=new Vergoeding;
		$model->tbl_auto_idtbl_auto=$id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vergoeding']))
		{
			$model->attributes=$_POST['Vergoeding'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idtbl_vergoeding));
		}

		$this->render('create',array(
			'model'=>$model,
			'auto'=>(new Auto)->model()->findByPk($id),
		));
	}

	/**
	 * Creates a new model for input from the android app.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionCreateMobiel()
	{
		if((new Auto)->getUserAuto()==NULL){
			$this->redirect(array('site/page&view=geenauto'));
		}
		
		$model=new Vergoeding;
				
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
				
		if(isset($_POST['Vergoeding']))
		{
			$model->attributes=$_POST['Vergoeding'];
									
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vergoeding']))
		{
			$model->attributes=$_POST['Vergoeding'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idtbl_vergoeding));
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
		$dataProvider=new CActiveDataProvider('Vergoeding');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Vergoeding('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vergoeding']))
			$model->attributes=$_GET['Vergoeding'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 *  @param integer $id the ID of the model to be displayed
	 */
	public function actionLijst($id)
	{
		//$model = new Vergoeding();
		//$model->tbl_auto_idtbl_auto=$id;
		
		$criteria = new CDbCriteria();
		$criteria->condition = "tbl_auto_idtbl_auto = $id";
		//$criteria->addSearchCondition('tbl_auto_idtbl_auto', $id, true);
	
		$dataProvider=new CActiveDataProvider('Vergoeding', array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>10,
				),
		));
				
		$this->render('lijst',array(
			'dataProvider'=>$dataProvider,
			'auto'=>(new Auto)->model()->findByPk($id),
		));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Vergoeding the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=(new Vergoeding)->model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Vergoeding $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='vergoeding-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
