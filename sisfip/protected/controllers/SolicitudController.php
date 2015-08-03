<?php

class SolicitudController extends Controller
{

	/*public function actionAjaxgenerarSolicitud(){
		$NroCotizacion=$_POST['NroCotizacion'];
	
		if(empty($NroCotizacion)){
			$this->redirect("login.php");
		}else{
			
			 $this->render('registrar', array('data' => $NroCotizacion));
			//$this->render("registrarFactura");
		}

		
	}*/

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionRegistrar()
	{
		
	//	$NroCotizacion=$_POST['NroCotizacion'];
	$NroCotizacion = Yii::app()->request->getParam('NroCotizacion');
		if(empty($NroCotizacion)){
			$this->render("registrar");
		}else{
			//$cotizacion = Cotizacion::model()->obtenerCotizacion($NroCotizacion);
			//$detalle = Detallecotizacion::model()->obtenerDetalleCotizacion($NroCotizacion);

			$this->render('registrar', array('data' => $NroCotizacion));
			
			
		}
		


	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}