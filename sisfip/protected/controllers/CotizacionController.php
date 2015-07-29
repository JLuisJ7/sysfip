<?php

class CotizacionController extends Controller
{
	public function actionAjaxObtenerNroCotizacion(){		
		$cotizacion = Cotizacion::model()->ObtenerNroCotizacion();
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$cotizacion[0]));
		
	}

	public function actionAjaxRegistrarCotizacion(){
	




//cotizacion
$idCliente=$_POST['idCliente'];
$idCotizacion=$_POST['idCotizacion'];
$muestra=$_POST['muestra'];
$cond_tecnica=$_POST['cond_tecnica'];
$detalle_servicios=$_POST['detalle_servicios'];
$total=$_POST['total'];
$fecha_Entrega=$_POST['fecha_Entrega'];
$cant_Muestra_necesaria=$_POST['cant_Muestra_necesaria'];
$json=$_POST['json'];
$array = json_decode($json);

		$respuesta = Cotizacion::model() -> registrarCotizacion($idCliente,$cond_tecnica,$detalle_servicios,$total,$fecha_Entrega,$cant_Muestra_necesaria,$muestra);
	
foreach($array as $obj){
			$idServicio=$obj->id;			
			$Precio=$obj->Tarifa;	
						
 Detallecotizacion::model() -> registrarDetalleCotizacion($idCotizacion,$idServicio,$Precio,$muestra);



}
		
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