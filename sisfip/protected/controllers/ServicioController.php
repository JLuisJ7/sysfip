<?php

class ServicioController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionAjaxListarServicios(){
		
		$servicios = Servicio::model()->listarServicios();

		Util::renderJSON($servicios);
	}

	public function actionAjaxObtenerServicio(){
		$idServicio=$_POST['idServicio'];
		
		$servicios = Servicio::model()->ObtenerServicio($idServicio);

		Util::renderJSON($servicios);
	}

	public function actionAjaxListarServiciosxProducto(){
		$idProducto=$_POST['idProducto'];
		$servicios = Servicio::model()->ListarServiciosxProducto($idProducto);

		Util::renderJSON($servicios);
	}

	public function actionAjaxAccionMantenimiento(){
		$Accion=$_POST['Accion'];
		
		$descripcion=$_POST['descripcion'];
		$descripcion=$_POST['descripcion'];
		$metodo=$_POST['metodo'];
		$tiempo_entrega=$_POST['tiempo_entrega'];
		$cantM_x_ensayo=$_POST['cantM_x_ensayo'];
		$tarifa=$_POST['tarifa'];
		$detalle=$_POST['detalle'];
		if ($Accion=='Registrar') {
			$respuesta = Servicio::model() -> registrarServicio($descripcion,$metodo,$tiempo_entrega,$cantM_x_ensayo,$tarifa,$detalle);
		}elseif ($Accion=='Actualizar') {
			$idServicio=$_POST['idServicio'];
			$respuesta = Servicio::model() -> actualizarServicio($idServicio,$descripcion,$metodo,$tiempo_entrega,$cantM_x_ensayo,$tarifa,$detalle);
		}

		
		Util::renderJSON(array( 'success' => $respuesta ));
	}
	


}