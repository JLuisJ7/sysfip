<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Servicios';
// Titulo del modulo
$this->moduleTitle="Servicios";
// Subtitulo del modulo
$this->moduleSubTitle="Servicios";
// Breadcrumbs
$this->breadcrumbs=array(
	'Servicios',
);?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class='box-header with-border'>
          <h3 class='box-title'><i class="fa fa-user"></i> <b>Agregar</b> Servicio</h3>
        </div>
        <div class="box-body">
          <div class="row">

    <form action="" method="post" name="ServicioForm" id="ServicioForm"  onclick="ServicioCore.validarServicio();" >
      <div class="form-group col-md-6">
        <label class="" for="txtServicio">Servicio: </label>
         <input type="text" class="form-control" id="txtServicio" >
      </div>
      <div class="form-group col-md-6">
        <label class="" for="txtMetodo">Metodo: </label>
         <input type="text" class="form-control" id="txtMetodo" >
      </div>
      <div class="form-group col-md-4">
        <label class="" for="txtTiempoEntrega">Tiempo de Entrega: </label>
         <input type="number" class="form-control" id="txtTiempoEntrega" >
      </div>
      <div class="form-group col-md-4">
        <label class="" for="txtCantMuestra">Cantidad de Muestras: </label>
         <input type="number" class="form-control" id="txtCantMuestra" >
      </div>
      <div class="form-group col-md-4">
        <label class="" for="txtTarifa">Tarifa: </label>
         <input type="text" class="form-control" id="txtTarifa" >
      </div>
      <div class="form-group col-md-12">
        <label class="" for="">Detalle: </label>       
         <textarea id="txtDetalle" class="form-control col-md-12"  rows="2">       
         </textarea>
      </div>
      <div class="form-group col-md-6 ">
        <input class="btn btn-primary col-md-12" type="submit" value="Guardar">
      </div>
      <div class="form-group col-md-6">
        <input class="btn btn-danger col-md-12" type="reset" value="Cancelar">
      </div>
    </form>

    </div><!--end row  -->
    



        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class='box-header with-border'>
          <h3 class='box-title'><i class="fa fa-user"></i> Servicios</h3>
        </div>
        <div class="box-body">
          <table id="listarServicios" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
            <thead>
              <tr>
                <!--th style="vertical-align: middle;">#</th-->
                <th style="vertical-align: middle;" >ID</th>
                <th style="vertical-align: middle;" >Producto</th>
                <th style="vertical-align: middle;" >Servicio</th>
                <th style="vertical-align: middle;" >Metodo</th>
                <th style="vertical-align: middle;" >Tiempo</th>
                <th style="vertical-align: middle;" >Cant</th>
                <th style="vertical-align: middle;" >Precio</th>
                <th style="vertical-align: middle;" >&nbsp;</th>
              </tr>
            </thead>                 
          </table>


        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/servicio.js" type="text/javascript"></script>
<script>
    window.onload=function(){
        ServicioCore.initListadoServicios();
    };
</script>
