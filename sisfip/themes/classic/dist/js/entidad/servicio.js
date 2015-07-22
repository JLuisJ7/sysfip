/*
    INICIO Fn ProdCore
*/
var ServicioCore = {
    
    validarServicio: function(){
        //console.log("VAMOS A VALIDAR");
        var me = this;
        $(".inputNumero").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        $('#mensaje-succes-usuario-div').removeAttr('style');
        $('#ServicioForm')
        .bootstrapValidator(
                {
                    message : 'El valor ingresado no es valido',
                    feedbackIcons : {
                        valid : 'glyphicon glyphicon-ok',
                        invalid : 'glyphicon glyphicon-remove',
                        validating : 'glyphicon glyphicon-refresh'
                    },
                    fields : {
                        txtServicio : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar una Descripcion'
                                }
                            }
                        }
                    },
                    submitHandler : function(form) {
                        var Accion=$("#btn-Accion-M").val();                        
                        var descripcion =$("#txtServicio").val();
                        var metodo =$("#txtMetodo").val();
                        var tiempo_entrega =$("#txtTiempoEntrega").val();
                        var cantM_x_ensayo =$("#txtCantMuestra").val();
                        var tarifa =$("#txtTarifa").val();
                        var detalle =$("#txtDetalle").val();
                       if($("#btn-Accion-M").val()=='Registrar'){
                        $.ajax({
                         url: 'index.php?r=servicio/AjaxAccionMantenimiento',
                         type: 'POST',                        
                         data: {
                            Accion:Accion,
                            descripcion:descripcion,
                            metodo:metodo,
                            tiempo_entrega:tiempo_entrega,
                            cantM_x_ensayo:cantM_x_ensayo,
                            tarifa:tarifa,
                            detalle:detalle

                        },
                     })
                     .done(function(response) {
                         console.log(response.success['message']);
                            $("#text-message").text(response.success['message']);
                           
                            $('#alert-message').show('fade');
                             setTimeout(function() {
                                location.reload();
                            }, 1000);

                     })
                     .fail(function() {
                         console.log("error");
                     })
                     .always(function() {
                         console.log("complete");

                     });
                }else if ($("#btn-Accion-M").val()=='Actualizar') {

                    var idServicio=$("#txtServicio").attr('data-id');
                    $.ajax({
                         url: 'index.php?r=servicio/AjaxAccionMantenimiento',
                         type: 'POST',                        
                         data: {
                            Accion:Accion,
                            idServicio:idServicio,
                            descripcion:descripcion,
                            metodo:metodo,
                            tiempo_entrega:tiempo_entrega,
                            cantM_x_ensayo:cantM_x_ensayo,
                            tarifa:tarifa,
                            detalle:detalle

                        },
                     })
                     .done(function(response) {
                        console.log(response.success['message']);
                            $("#text-message").text(response.success['message']);
                           
                            $('#alert-message').show('fade');

                            setTimeout(function() {
                                location.reload();
                            }, 1000);

                     })
                     .fail(function() {
                         console.log("error");
                     })
                     .always(function() {
                         console.log("complete");

                     });
                };     
                     
                                                                 
                       
           }
                });

    },
    loadListadoServicios: function(){
        //alert("hola");
        var me = this;
        
        Util.createGrid('#listarServicios',{
            toolButons:'',
            url:'index.php?r=servicio/AjaxListarServicios',
            columns:[
                {"mData": "idServicio", "sClass": "alignCenter"},
                {"mData": "descripcion", "sClass": "alignCenter"},                
                {"mData": "metodo", "sClass": "alignCenter"},
                {"mData": "tiempo_entrega", "sClass": "alignCenter"},
                {"mData": "cantM_x_ensayo", "sClass": "alignCenter"},
                 {"mData": "tarifa", "sClass": "alignCenter"},            
                {
                    "mData": 'idServicio',
                    "bSortable": false,
                    "bFilterable": false,
                    //"width": "150px",
                    "mRender": function(o) {
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm editarServicio"><i class="fa fa-pencil"></i></a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm suspenderServicio"><i class="fa fa-trash-o"></i></a>';
                    }
                }
            ],
            fnDrawCallback: function() {
                $('.suspenderServicio').click(function() {
                    me.confirmSuspenderProducto($(this).attr('lang'));
                });
                $('.editarServicio').click(function() {
                    me.obtenerServicio($(this).attr('lang'));
                    $("#btn-Accion-M").attr('value', 'Actualizar');
                    $("#text-Accion").text('Actualizar');

                });

            }
        });
    },
    obtenerServicio: function(idServicio){
        $.ajax({
            url: 'index.php?r=servicio/AjaxObtenerServicio',
            type: 'POST',            
            data: {idServicio: idServicio},
        })
        .done(function(response) {
            data=response;
            console.log(data[0].descripcion);
            $("#txtServicio").attr('data-id',data[0].idServicio);
            $("#txtServicio").val(data[0].descripcion);
            $("#txtMetodo").val(data[0].metodo);
            $("#txtTiempoEntrega").val(data[0].tiempo_entrega);
            $("#txtCantMuestra").val(data[0].cantM_x_ensayo);
            $("#txtTarifa").val(data[0].tarifa);
            $("#txtDetalle").val(data[0].detalle);  

            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           $('#myModalEditarProveedor').modal('show');
        });
        
    },
    initListadoServicios: function() {
        var me = this;
         /*$('#myModalNuevoProducto').on('show.bs.modal', function(e) {
         
                       
        });*/
         $('#myModalNuevoProducto').on('hidden.bs.modal', function() {
         
             $('#ProductoForm').bootstrapValidator('resetForm', true);            
        });
         $('#myModalEditarProducto').on('hidden.bs.modal', function() {
         
             $('#updateProductoForm').bootstrapValidator('resetForm', true);            
        });
        
        
        this.loadListadoServicios();

    }

}