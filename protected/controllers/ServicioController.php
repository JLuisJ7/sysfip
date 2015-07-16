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

	public function actionAjaxListarServiciosxProducto(){
		$idProducto=$_POST['idProducto'];
		$servicios = Servicio::model()->ListarServiciosxProducto($idProducto);

		Util::renderJSON($servicios);
	}


}