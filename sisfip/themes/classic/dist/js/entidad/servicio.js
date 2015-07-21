/*
    INICIO Fn ProdCore
*/
var ServicioCore = {

    
    validarServicio: function(){
        console.log("VAMOS A VALIDAR");
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
                        var descripcion =$("#txtServicio").val();
                        var metodo =$("#txtMetodo").val();
                        var tiempo_entrega =$("#txtTiempoEntrega").val();
                        var cantM_x_ensayo =$("#txtCantMuestra").val();
                        var tarifa =$("#txtTarifa").val();
                        var detalle =$("#txtDetalle").val();

                     $.ajax({
                         url: 'index.php?r=servicio/AjaxRegistrarServicio',
                         type: 'POST',                        
                         data: {

                            descripcion:descripcion,
                            metodo:metodo,
                            tiempo_entrega:tiempo_entrega,
                            cantM_x_ensayo:cantM_x_ensayo,
                            tarifa:tarifa,
                            detalle:detalle

                        },
                     })
                     .done(function(response) {
                         console.log(response);
                     })
                     .fail(function() {
                         console.log("error");
                     })
                     .always(function() {
                         console.log("complete");
                     });
                                                                 
                       
                       $.ajax({
                            type: "POST",
                            url: 'index.php?r=almacen/AjaxAgregarProducto',
                            data: {
                                desc_Prod:desc_Prod,
                                presentacion:presentacion,
                                tipoProd:tipoProd,
                                stock:stock,
                                idProveedor:idProveedor,
                                idMarca:idMarca,
                                idCategoria:idCategoria,
                                precio:precio
                            },
                            success: function(response) {
                                if (response.success) {
                                     me.loadListadoProductos();
                                    me.closeWin('myModalNuevoProducto');                                   
                                } else {
                                    //$('#message_save_acta').find('strong').html(response.message);
                                    //$('#message_save_acta').show('fade');

                                }
                            }
                        });



                    }
                });

    },
    loadListadoServicios: function(){
        //alert("hola");
        var me = this;
        
        Util.createGrid('#listarServicios',{
            toolButons:'<a style="display:inline-block;margin:-1px 0px 0px 0px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalNuevoProducto">Nuevo Producto</a>',
            url:'index.php?r=servicio/AjaxListarServicios',
            columns:[
                {"mData": "idServicio", "sClass": "alignCenter"},
                {"mData": "descripcion", "sClass": "alignCenter"},
                {"mData": "tiempo_entrega", "sClass": "alignCenter"},
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
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm editarProducto"><i class="fa fa-pencil"></i></a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm suspenderProducto"><i class="fa fa-trash-o"></i></a>';
                    }
                }
            ],
            fnDrawCallback: function() {
                $('.suspenderProducto').click(function() {
                    me.confirmSuspenderProducto($(this).attr('lang'));
                });
                $('.editarProducto').click(function() {
                    me.obtenerProducto($(this).attr('lang'));
                    
                });

            }
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