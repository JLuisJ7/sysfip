<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Cotización';
// Titulo del modulo
$this->moduleTitle="Cotización";
// Subtitulo del modulo
$this->moduleSubTitle="Cotización de Servicios para Ensayos";
// Breadcrumbs
$this->breadcrumbs=array(
	'Cotización de Servicios para Ensayos',
);?>

<!-- Main content -->
<section class="content">

<!--end contadores-->
<div class="box box-primary">
<div class="box-header">
	<h3 class="box-title">Cotizacion de Servicios para Ensayos Nro:<b id="NroCotizacion" data-nro="">     </b></h3>
	<h3 class="box-title" style="float:right;" id="fecha_actual">2015-07-16 </h3>
</div>
<div class="box-body">
	<!-- Date range -->
	<div class="form-group col-md-8">
	<label class="" for="">Cliente / Solicitante : </label>
	<input type="text" class="form-control" id="txtNomCliente" >
	</div>
	<div class="form-group col-md-4">
	<label class="" for="">DNI : </label>
	<input type="text" class="form-control" id="txtAtencion" >
	</div>
	<div class="form-group col-md-12">
	<label class="" for="">Atencion a : </label>
	<input type="text" class="form-control" id="txtAtencion" >
	</div>
	<div class="form-group col-md-12">
	<label class="" for="">Direccion : </label>
	<input type="text" class="form-control" id="txtDireccion" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Telefono : </label>
	<input type="text" class="form-control col-md-12" id="txtTelefono" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">E-mail : </label>
	<input type="text" class="form-control col-md-12" id="txtEmail" >
	</div>
	<div class="form-group col-md-12">
	<label class="" for="">Comunicación de Referencia : </label>
	<input type="text" class="form-control" id="txtNomCliente" >
	</div>

	<div class="form-group col-md-12">
	<label class="" for="s_listarProd">Seleccione Producto : </label>

	<select id="s_listarProducto" class="selectpicker form-control" data-live-search="true" title="Productos " style="display:none;">
	<option value="">Seleccione </option>
	</select>

	</div>

	<div class="form-group col-md-12">
	<label class="" for="s_listarServicio">Seleccione Servicio : </label>

	<select id="s_listarServicio" class="selectpicker form-control" data-live-search="true" title="Servicios " style="display:none;">
	<option value="">Seleccione </option>
	</select>

	</div>

		<div class="form-group col-md-2">
            <label for="">Tiempo Entrega</label><br>
            <input type="text" class="form-control" id="txtTiempo" disabled>         
          </div>
          <div class="form-group col-md-2">
            <label for="">cantidad x ensayo</label><br>
            <input type="text" class="form-control" id="txtCantEnsayo" disabled>         
          </div>
          <div class="form-group col-md-2">
            <label for="">Tarifa</label><br>
            <input type="text" class="form-control" id="txtTarifa" disabled>         
          </div>
          <div class="form-group col-md-2">
            <label for="">Cantidad</label><br>
            <input type="number" class="form-control" id="txtCantidad" >         
          </div>
          <div class="form-group col-md-2">
            <label for="">Importe</label><br>
            <input type="text" class="form-control" id="txtImporte" disabled>         
          </div>
          <div class="form-group">
            <label for="" style="color:transparent;">Agregar</label><br>
            <button id="addRow" type="button" class="btn btn-default"><i class="fa fa-cart-plus" ></i> Agregar</button>         
          </div>
	<table id="ListarServicios" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
	<thead>
	<tr>                        
	<th style="vertical-align: middle;" >id</th>                        
	<th style="vertical-align: middle;" >Descripcion</th>
	<!-- <th style="vertical-align: middle;" >Empleado</th> -->
	<th style="vertical-align: middle;" >Metodologia</th>
	<th style="vertical-align: middle;" >Tarifa</th>                        
	<th style="vertical-align: middle;" ><input type="checkbox"  id="Todoscheckbox"> </th>
	</tr>
	</thead>                 
	</table>



	<div class="form-group col-md-4">
	<label class="sr-only" for="exampleInputAmount"></label>
	<div class="input-group">
	<div class="input-group-addon">Total S/.</div>
	<input type="text" class="form-control" id="txtCosto" placeholder="0.00" value="0.00" disabled>
	</div>
	</div>
	<button type="button" class="btn btn-primary" id="btn_GuardarCotizacion">Guardar Cotización</button>




</div><!-- /.box-body -->

<div class="alert alert-success alert-dismissable" id="Success" style="display:none;">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>  <i class="icon fa fa-check"></i> Alert!</h4>
Cotización Guardada Correctamente
</div>                  
</div><!-- /.box -->
<!--end contadores-->


</section><!-- /.content -->
<script>
   select_productos();

$( "#s_listarProducto" )
  .change(function () {
    var  idProducto=$(this).val();
	if(idProducto!=""){ 
		Servicios_x_Producto(idProducto);
	}
}).change();

$( "#s_listarServicio" )
  .change(function () {
    var  idServicio=$(this).val();
    var  idProducto=$(this).attr('data-prod');
	alert(idProducto);
		obtenerServicioxID(idServicio,idProducto);
	
}).change();


</script>