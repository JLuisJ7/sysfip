
<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Cotizaciones';
// Titulo del modulo
$this->moduleTitle="Modulo de Cotizaciones";
// Subtitulo del modulo
$this->moduleSubTitle="Cotizaciones";
// Breadcrumbs
$this->breadcrumbs=array(
	'Cotizaciones',
);?>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-credit-card"></i> Listado de Cotizaciones</h3>
                </div>
                <div class="box-body">
                  <table id="listaCotizaciones" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>                        
                        <th style="vertical-align: middle;" >Cotizacion</th>
                        <th style="vertical-align: middle;" >Cliente.</th>
                        <th style="vertical-align: middle;" >Producto</th>
                        <!-- <th style="vertical-align: middle;" >Empleado</th> -->
                        <th style="vertical-align: middle;" >Total</th>
                        <th style="vertical-align: middle;" >Estado</th>                       
                        <th style="vertical-align: middle;" >&nbsp;</th>
                      </tr>
                    </thead>                 
                  </table>


                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

        <div class="modal fade" id="myModalFacturaDetallada" tabindex="-1" role="dialog" aria-labelledby="myModalFacturaDetalladaLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#myModalFacturaDetallada').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalFacturaDetalladaLabel">Detalle de la Factura : <b><span id="serie-factura"></span></b><img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              
              <div class="modal-body" style="background-color:#fff;">
                
        <table  class="table table-striped table-bordered" cellspacing="0" width="100%" id="detalleCotizacion" style="">
                <thead>
                  <tr>
                    <!--th style="vertical-align: middle;">#</th-->
                    <!-- <th style="vertical-align: middle;" >Codigo</th> -->
                    <th style="vertical-align: middle;" >Descripcion</th>
                    <th style="vertical-align: middle;" >Cantidad</th>
                    <th style="vertical-align: middle;" >Precio</th>
                    <th style="vertical-align: middle;" >Importe</th>                                  
                  </tr>
                </thead>
             </table>
             
              

              </div><!-- /.modal-body -->             

            </div><!-- /. modal-content -->
          </div><!-- /. modal-dialog-->          
        </div><!-- /#myModalEditarCliente --> 
       
    <script>
    window.onload=function(){
        InventCore.initCotizacion();
    };



</script>
<script>
  
  obtenerParametro(3,"T","nroSerie");
  obtenerParametro(1,"I","igv");
  
  listarComboEntidad("ventas","Cliente","fac_RazSoc_Cli");
  listarComboEntidad("almacen","Producto","fac_desc_Prod");
  $(document).ready(function(){
    setTimeout(function(){
      obtenerNroComprobante("ventas","nroFactura","nroSerie");
    },300);

  });
  
</script>