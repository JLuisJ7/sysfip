<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Solicitud';
// Titulo del modulo
$this->moduleTitle="Solicitud";
// Subtitulo del modulo
$this->moduleSubTitle="Solicitud para servicios de ensayos";
// Breadcrumbs
$this->breadcrumbs=array(
	'Solicitud para servicios de ensayos',
);?>
<style>
	tbody {
    text-align:center;
}
</style>
<section class="content">

<!--end contadores-->
<div class="box box-primary">
<div class="box-header">
	<h3 class="box-title">Cotizacion de Servicios para Ensayos Nro: <b id="NroCotizacion" data-nro="">     </b></h3>
	<h3 class="box-title" style="float:right;" id="fecha_actual">2015-07-16 </h3>
</div>
<div class="box-body">

	<!-- Date range -->
	<div class="form-group col-md-3">	
		<label class="" for="">DNI o RUC: <span class="text-danger " id="doc_Exist" style="display:none;">El cliente no Existe</span></label>
		<div class="input-group">
			<input type="text" class="form-control" id="txtDocumento" data-id="nuevo" autofocus>
			<span class="input-group-btn">
			    <button class="btn btn-default " type="button" id="consultarNro_Doc"><i class="fa fa-search"></i></button>
			</span>
		</div>	
	</div>	
	<div class="form-group col-md-9">
	<label class="" for="">Cliente / Solicitante : </label>
	<input type="text" class="form-control cli_block" id="txtNomCliente" >
	</div>
	
	<div class="form-group col-md-12">
	<label class="" for="">Atencion a : </label>
	<input type="text" class="form-control cli_block" id="txtAtencion" >
	</div>
	<div class="form-group col-md-12">
	<label class="" for="">Direccion : </label>
	<input type="text" class="form-control cli_block" id="txtDireccion" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Telefono : </label>
	<input type="text" class="form-control col-md-12 cli_block" id="txtTelefono" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">E-mail : </label>
	<input type="text" class="form-control col-md-12 cli_block" id="txtEmail" >
	</div>
	<div class="form-group col-md-12">
	<label class="" for="">Comunicación de Referencia : </label>
	<input type="text" class="form-control cli_block" id="txtRefCliente" >
	</div>

	<div class="form-group col-md-12">
	<label class="" for="s_listarProd">Seleccione Muestra : </label>

	<select id="s_listarProducto" class="selectpicker form-control" data-live-search="true" title="Muestras " style="display:none;">
	<option value="">Seleccione </option>
	</select>
	</div>
	<div class="form-group col-md-12">
	<label class="" for="">Muestra : </label>
	<input type="text" class="form-control" id="txtMuestra" >
	</div>


	<div class="form-group col-md-8">
	<label class="" for="s_listarServicio">Servicio : <span id="repeatServicio" class="text-danger"></span></label>
	<select id="listarServicio" class="selectpicker form-control" data-live-search="true" title="Seleccione Servicio" style="display:none;">
	<option value="">Seleccione Servicio</option>
	</select>

	</div>

    <div class="form-group">
            <label for="" style="color:transparent;">Agregar</label><br>
            <button id="agregarServicio" type="button" class="btn btn-default"><i class="fa fa-cart-plus" ></i> Agregar</button>         
    </div>

	<table id="DetalleCotizacion" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%" style="border-bottom:2px solid;">
	<thead>
	<tr>                        
	<th style="vertical-align: middle;" >id</th>                        
	<th style="vertical-align: middle;" >Descripcion</th>	
	<th style="vertical-align: middle;" >Metodologia</th>
	<th style="vertical-align: middle;" >Tiempo </th>
	<th style="vertical-align: middle;" >Cantidad </th> 
	<th style="vertical-align: middle;" >Tarifa</th>                        
	<th style="vertical-align: middle;" >Acreditado</th>
	<th style="vertical-align: middle;" >DEL</th>
	</tr>
	</thead>                 
	</table>



	
<div class="row" >
	
	<div class="form-group col-md-4">	
		<label class="" for="">Fecha de Entrega de los Resultados : </label>
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			<input type="date" class="form-control" id="txtTiempo" >			
		</div>	
	</div>
	<div class="form-group col-md-4">	
		<label class="" for="">Cantidad de Muestra Necesaria : </label>
		<div class="input-group">
			<div class="input-group-addon">NRO</div>
			<input type="text" class="form-control" id="txtCantidad" >
			
		</div>	
	</div>	

	<div class="form-group col-md-4">
	<label class="" for="">Valor total de los servicios : </label>
	<div class="input-group">
	<div class="input-group-addon">Total S/.</div>
	<input type="text" class="form-control" id="txtTotal" placeholder="0.00" value="0.00" disabled>
	</div>
	</div>
	<div class="form-group col-md-12">
        <label class="" for="">Condiciones Técnicas Especiales Aplicables a los servicios: </label>       
         <textarea id="txtCondTecnicas" class="form-control col-md-12"  rows="2">       
         </textarea>
      </div>
    <div class="form-group col-md-12">
        <label class="" for="">Detalle sobre los Servicios Ofrecido: </label>       
         <textarea id="txtDetalles" class="form-control col-md-12"  rows="2">       
         </textarea>
    </div>
	<div class="col-md-6">
		<button type="button" class="btn btn-primary col-md-12" id="btn_GuardarCotizacion">Guardar e Imprimir</button>
	</div>
	<div class="col-md-6">
		<button type="button" class="btn btn-danger col-md-12" id="btn_cancelar">Cancelar</button>
	</div>

	<div class="col-md-12" style="margin-top:1em;">
		<button type="button" class="btn btn-primary col-md-12" id="btn_Generar_Solicitud">Generar Solicitud </button>
	</div>
	

</div>


</div><!-- /.box-body -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/cotizacion.js" type="text/javascript"></script>
<script>
	
	$(document).ready(function() {
		setTimeout(function() {
				/**/
		}, 1000);
	});
</script>