<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Cotizacion';
// Titulo del modulo
$this->moduleTitle="Cotizacion";
// Subtitulo del modulo
$this->moduleSubTitle="Cotizacion";
// Breadcrumbs
$this->breadcrumbs=array(
  'Cotizacion',
);?>

<section class="content">
     
          <!--end contadores-->
  <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Producto</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                   <div class="form-group">
      <label class="" for="fac_RazSoc_Prov">Seleccion Producto: </label>
   
      <select id="s_listarProd" class="selectpicker form-control" data-live-search="true" title="Seleccione " style="display:none;">
        <option value="">Seleccione </option>
      </select>

    </div>
    <div class="form-group" style="display:none;">
          <label for="">Producto</label><br>
         <select id="fac_desc_Prod" data-doc="orden" class=" form-control" >
        <option value="">Seleccione Producto</option>
      </select>
                    
      
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
                 
                    
                    <form class="">
  <div class="form-group ">
    <label class="sr-only" for="exampleInputAmount"></label>
    <div class="input-group">
      <div class="input-group-addon">$</div>
      <input type="text" class="form-control" id="txtCosto" placeholder="0.00" value="0.00">
    
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Guardar Cotización</button>
</form>
                  </div>
                  

       </div><!-- /.box-body -->

              
              </div><!-- /.box -->
          <!--end contadores-->
       
             
</section><!-- /.content -->



<script>

 function listarProductos(){
   $.ajax({
            type: "POST",
            url: 'index.php?r=almacen/AjaxLlenarS_Productos',
            //sync:false,           
            success: function(data) {
                var html = "";

                //$(".listaProveedores").find("option").remove();
                 
                $.each(data, function(index, value) {
                 
                   
                     html += '<option value="'+value.idProducto+'">'+value.descProd+'</option>';

                });
                          
                $("#s_listarProd").append(html);  
                
            },
            dataType: 'json'

        });
 };
 listarProductos();

function Servicios_x_Producto(idProducto){
        var table = $('#ListarServicios').DataTable();            
        table.destroy();
        var me = this;

        $.ajax({
             url: 'index.php?r=almacen/AjaxListarServicios',
            type: 'POST',       
            data: {          
                     idProducto:idProducto
                },
        })
        .done(function(response) {
            console.log(response);
           
             var table = $('#ListarServicios').DataTable( {
                "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        "search":false,
        "data": response,
 columns:[
               
                {"mData": "idServicio", "sClass": "alignCenter"},                
                {"mData": "descServ", "sClass": "alignCenter"},
                //{"mData": "Empleado", "sClass": "alignCenter"},                
                {"mData": "metodo", "sClass": "alignCenter"},
              
                {"mData": "precio", "sClass": "alignCenter"},
                              
                {
                    "mData": null,
                    "bSortable": false,
                    "bFilterable": false,
                     "mRender": function (data, type, row) {
                  /*return row.nroSerie +', '+ row.nroFact;*/
                  return '<input type="checkbox"  class="check_Servicio" data-id="' + row.idServicio + '" value="' + row.precio + '"> ';
                
                }
                }
            ],
            fnDrawCallback: function() {

                $('.check_Servicio')
.change(function() {
    
    if ($(this).is(':checked')) {
       costo=$("#txtCosto").val();
        precio= $(this).val();
       
       suma=parseFloat(costo)+parseFloat(precio);
      $("#txtCosto").val(suma.toFixed(2));
      
    } else {
        costo=$("#txtCosto").val();
        precio= $(this).val();
       
       resta=parseFloat(costo)-parseFloat(precio);
      $("#txtCosto").val(resta.toFixed(2));
    }
}).change();
              $("#txtCosto").val('0.00')  
            }            
            } );
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
           
        });
        


    };



 $(document).ready(function($) {

               $('#Todoscheckbox')
.change(function() {
  var sumarPrecio=0;
      if ($("#Todoscheckbox").is(':checked')) {
          
            $(".check_Servicio").each(function () {
                $(this).prop("checked", true);
                sumarPrecio=parseFloat(sumarPrecio)+parseFloat($(this).val());
            });

        } else {
            $(".check_Servicio").each(function () {
                $(this).prop("checked", false);
            });
        }
         $("#txtCosto").val(sumarPrecio.toFixed(2));
}).change();



    $( "#s_listarProd" )
  .change(function () {
    var  idProducto=$("#s_listarProd").val();  
if(idProducto!=""){ 
  Servicios_x_Producto(idProducto);

}
   

  })
  .change();
  






 });



</script>
 

