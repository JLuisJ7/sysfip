<?php

class CotizacionController extends Controller
{

	public function actionAjaxRegistrarCotizacion(){
	




//cotizacion
$idCliente=$_POST['idCliente'];
$muestra=$_POST['muestra'];
$cond_tecnica=$_POST['cond_tecnica'];
$detalle_servicios=$_POST['detalle_servicios'];
$total=$_POST['total'];
$fecha_Entrega=$_POST['fecha_Entrega'];
$cant_Muestra_necesaria=$_POST['cant_Muestra_necesaria'];

		$respuesta = Cotizacion::model() -> registrarCotizacion($idCliente,$cond_tecnica,$detalle_servicios,$total,$fecha_Entrega,$cant_Muestra_necesaria,$muestra);
	

		
		Util::renderJSON(array( 'success' => $respuesta ));
	}

	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionRegistrar()
	{
		$this->render('registrar');
	}
	
}