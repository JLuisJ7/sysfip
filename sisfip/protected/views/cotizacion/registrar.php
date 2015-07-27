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
	<div class="form-group col-md-3">	
		<label class="" for="">DNI o RUC: </label>
		<div class="input-group">
			<input type="text" class="form-control" id="txtDocumento" >
			<span class="input-group-btn">
			    <button class="btn btn-default " type="button" ><i class="fa fa-search"></i></button>
			</span>
		</div>	
	</div>	
	<div class="form-group col-md-9">
	<label class="" for="">Cliente / Solicitante : </label>
	<input type="text" class="form-control" id="txtNomCliente" >
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
	<input type="text" class="form-control" id="txtRefCliente" >
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
	<label class="" for="s_listarServicio">Servicio : </label>
	<select id="listarServicio" class="selectpicker form-control" data-live-search="true" title="Seleccione Servicio" style="display:none;">
	<option value="">Seleccione Servicio</option>
	</select>

	</div>

    <div class="form-group">
            <label for="" style="color:transparent;">Agregar</label><br>
            <button id="agregarServicio" type="button" class="btn btn-default"><i class="fa fa-cart-plus" ></i> Agregar</button>         
    </div>
	<table id="DetalleCotizacion" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
	<thead>
	<tr>                        
	<th style="vertical-align: middle;" >id</th>                        
	<th style="vertical-align: middle;" >Descripcion</th>	
	<th style="vertical-align: middle;" >Metodologia</th>
	<th style="vertical-align: middle;" >Tiempo </th>
	<th style="vertical-align: middle;" >Cantidad </th> 
	<th style="vertical-align: middle;" >Tarifa</th>                        
	<th style="vertical-align: middle;" >Acred</th>
	<th style="vertical-align: middle;" >DEL</th>
	</tr>
	</thead>                 
	</table>



	<div class="form-group col-md-4">
	<label class="sr-only" for="exampleInputAmount"></label>
	<div class="input-group">
	<div class="input-group-addon">Total S/.</div>
	<input type="text" class="form-control" id="txtTotal" placeholder="0.00" value="0.00" disabled>
	</div>
	</div>
	<button type="button" class="btn btn-primary" id="btn_GuardarCotizacion">Guardar </button>
<button type="button" class="btn btn-primary" id="btn_GuardarCotizacion">Guardar e Imprimir </button>



</div><!-- /.box-body -->

<div class="alert alert-success alert-dismissable" id="Success" style="display:none;">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>  <i class="icon fa fa-check"></i> Alert!</h4>
Cotización Guardada Correctamente
</div>                  
</div><!-- /.box -->
<!--end contadores-->


</section><!-- /.content -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/cotizacion.js" type="text/javascript"></script>
<script>
    /*window.onload=function(){
        ServicioCore.initListadoServicios();
    };*/
  
</script>

<script>
   listarServicios();

</script>
<script>
	
$('#agregarServicio').on( 'click', function () {

    var idServicio=$("#listarServicio").val();

    $.ajax({
        url: 'index.php?r=servicio/AjaxObtenerServicio',
        type: 'POST',        
        data: {idServicio:parseInt(idServicio)},
    })
    .done(function(response) {
        console.log(response);
	    $('#DetalleCotizacion').DataTable().row.add([
	           response[0].idServicio,
	           response[0].descripcion,
	           response[0].metodo,
	           response[0].tiempo_entrega,
	           response[0].cantM_x_ensayo+' ml',
	           response[0].tarifa,
	           '<input type="checkbox" id="Todoscheckbox">'
	    ]).draw();

    })
        .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
        calcularTotal();
    });
        


       
    } );

$(document).ready(function() {
    
     $('#DetalleCotizacion').dataTable({  
      "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": " ",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        },   
        "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='btn btn-danger'><i class='fa fa-trash-o '></i></button>"
        } ],
        "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false
    } );



	$('#DetalleCotizacion tbody').on( 'click', 'button', function () {
	  	
	  	var table = $('#DetalleCotizacion').DataTable();
	    
	    table.row( $(this).parents('tr') ).remove().draw( false );         
	      
	    if(table.column(5).data().length==0){
	    	$("#txtTotal").val('0.00'); 
	    }else{
	      calcularTotal();  
	    }        


	} );

} );

function calcularTotal(){
  var table=$('#DetalleCotizacion').DataTable(); 

  var total = table 
    .column(5)
    .data()
    .reduce( function (a, b) {
      //console.log(a+"->"+b );
        return parseFloat(a) + parseFloat(b);
    } );


 
   $("#txtTotal").val(parseFloat(total).toFixed(2)); 


}   
</script>