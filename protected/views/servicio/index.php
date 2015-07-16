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
<script>
    window.onload=function(){
        ServicioCore.initListadoServicios();
    };
</script>