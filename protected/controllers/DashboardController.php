<?php

class DashboardController extends Controller
{
	public function actionIndex()
	{
		
		if(isset($_POST['car_name']))
		{
			$param_car = (int)$_POST['car_name'];
			if($param_car!="")
			{ 
				Auto::setMainCar($param_car);
			}
		}
		
		$this->render('index');
	}
	
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
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
}