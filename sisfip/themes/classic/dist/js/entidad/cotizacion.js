/*
    INICIO Fn Cotizacion
*/
var CotizacionCore = {
    registrarCotizacion: function(idCotizacion,idCliente,muestra,cond_tecnica,detalle_servicios,total,fecha_Entrega,cant_Muestra_necesaria,detalle){
        $.ajax({
        url: 'index.php?r=cotizacion/AjaxRegistrarCotizacion',
        type: 'POST',
        data: {
            idCotizacion:idCotizacion,
            idCliente:idCliente,
            muestra,muestra,
            cond_tecnica:cond_tecnica,
            detalle_servicios:detalle_servicios,
            total:total,
            fecha_Entrega:fecha_Entrega,
            cant_Muestra_necesaria:cant_Muestra_necesaria,
            json:JSON.stringify(detalle),
            },
    })
.done(function(response) {
    console.log(response);
})
         
      
    }

}



/*
    INICIO Fn Cliente
*/
var ClienteCore = {

 consultarCliente: function(nro_doc){
        $.ajax({
            url: 'index.php?r=cliente/AjaxConsultarClientexDoc',
            type: 'POST',            
            data: {doc_ident: nro_doc},
        })
        .done(function(response) {
            data=response;
            console.log(data);
            if (data==null) {
                $("#doc_Exist").show();
                $("#txtDocumento").attr('data-id','Nuevo');
            }else{
              $("#txtNomCliente").val(data.nombres);
$("#txtDocumento").val(data.doc_ident);
$("#txtDocumento").attr('data-id',data.idCliente);
$("#txtAtencion").val(data.atencion_a);
$("#txtDireccion").val(data.direccion);
$("#txtTelefono").val(data.telefono);
$("#txtEmail").val(data.correo);
$("#txtRefCliente").val(data.referencia);  
}

            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           
        });
        
    },
    registrarCliente: function(nombres,doc_ident,atencion_a,direccion,telefono,correo,referencia){
        var idCliente;
        $.ajax({
            url: 'index.php?r=cliente/AjaxRegistrarCliente',
            type: 'POST',
            async: false,
            data: {
                nombres:nombres,
                doc_ident:doc_ident,
                atencion_a:atencion_a,
                direccion:direccion,
                telefono:telefono,
                correo:correo,
                referencia:referencia
            },
        })
        .done(function(response) {
           idCliente=response.idGenerado;;
          
        })
        .always(function(response) {
          
        });
 return idCliente;
         
      
    },
    sumarCliente: function(num1,num2){
        var suma;
        suma=num1*num2;
        return suma;
    }

}



