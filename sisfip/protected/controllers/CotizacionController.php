<?php

class CotizacionController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionRegistrar()
	{
		$this->render('registrar');
	}
	
}