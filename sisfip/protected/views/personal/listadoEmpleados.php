<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Modulo de Personal';
// Titulo del modulo
$this->moduleTitle="Modulo de Personal";
// Subtitulo del modulo
$this->moduleSubTitle="Personal";
// Breadcrumbs
$this->breadcrumbs=array(
	'Personal',
);?>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-user"></i> Listado de Empleados</h3>
                </div>
                <div class="box-body">
                  <table  id="listaEmpleados" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!--th style="vertical-align: middle;">#</th-->
                        <th style="vertical-align: middle;" >Empleado</th>
                        <th style="vertical-align: middle;" >DNI</th>
                        <th style="vertical-align: middle;">Teléfono</th>
                        <th style="vertical-align: middle;">Correo Electrónico</th>
                        <th style="vertical-align: middle;">&nbsp;</th>
                      </tr>
                    </thead>                 
                  </table>


                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

        <!-- Modal -->
        

        <!-- Modal -->
        <div class="modal fade" id="myModalNuevoEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalNuevoEmpleadoLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#myModalNuevoEmpleado').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalNuevoEmpleadoLabel">Nuevo Empleado<img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              <!-- /Cabecera -->
              <div class="modal-body">
                <form id="newEmpleadoForm" method="post"  class="form-horizontal" onclick="EmpCore.validarNuevoEmpleado();" target="empleadoPG" >
                  
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Nombres:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="add_desNombres" name="add_desNombres" placeholder="Nombres"  >
                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Apellido Paterno:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="add_apePaterno" name="add_apePaterno" placeholder="Apellido Paterno"  >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Apellido Materno:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="add_apeMaterno" name="add_apeMaterno" placeholder="Apellido Materno"  >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">DNI:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control inputNumero" id="add_desDocumento" name="add_desDocumento" maxlength="8" placeholder="Documento"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Fecha de Nacimiento:</label>
                    <div class="col-lg-7">
                      <!--input type="text" class="form-control" id="desNombres"  name="desNombres" placeholder="Fecha de Nacimiento"/-->
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input name="add_fecNacimiento" id="add_fecNacimiento" type="date" class="form-control" />
                      </div><!-- /.input group -->
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-lg-4 control-label">Teléfono:</label>
                    <div class="col-lg-7">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                        <input type="tel" name="add_desTelefono" id="add_desTelefono"  class="form-control inputNumero" maxlength="9" data-inputmask='"mask": "(99) 302-5902"' data-mask/>
                      </div><!-- /.input group -->
                      <!--input type="text" class="form-control" id="desApPaterno"  name="desApPaterno" placeholder="Tel&eacute;fono"/-->
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Correo electrónico:</label>
                    <div class="col-lg-7">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="add_desCorreo" id="add_desCorreo" class="form-control" placeholder="Correo electronico" data-error="El correo ingresado es invalido">
                      </div>
                      <!--input type="text" class="form-control" id="desEmail" name="desEmail" placeholder="Correo electr&oacute;nico"/-->
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Sueldo:</label>
                    <div class="col-lg-7">
                      <div class="input-group">
                        <span class="input-group-addon">S/.</span>
                        <input type="text" name="add_Sueldo" id="add_Sueldo" class="form-control inputNumero" placeholder="" data-error="El correo ingresado es invalido">
                      </div>
                      <!--input type="text" class="form-control" id="desEmail" name="desEmail" placeholder="Correo electr&oacute;nico"/-->
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Sexo:</label>
                    <div class="col-lg-7">
                      <div  class="controls">
                        <div class="btn-group" data-toggle="buttons" id="options"  >
                          <label class="btn btn-primary btn-success EstCiv EstCivM">
                            <input type="radio" name="add_idsexo"  id="add_idsexo" value="M" > Masculino
                          </label>
                          <label class="btn btn-primary btn-success EstCiv EstCivF">
                            <input type="radio" name="add_idsexo"  id="add_idsexo" value="F" > Femenino
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Estado civil:</label>
                    <div class="col-lg-7">
                      <select class="form-control" name="add_selEstadoCivil" id="add_selEstadoCivil">
                        <option value="">Seleccione Estado Civil</option>
                        <option value="1">Soltero(a)</option>
                        <option value="2">Casado(a)</option>
                        <option value="3">Viudo(a)</option>
                        <option value="4">Conviviente</option>
                        <option value="5">Divorciado(a)</option>
                        <option value="6">Separado</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-lg-4 control-label" for="estado_emp">Estado:</label>
                  <div class="col-lg-7">
                  <div class="checkbox">
                  <label>
                  <input type="checkbox" name="add_estado_emp" id="add_estado_emp"><span id="add_textEstado"></span>
                  </label>
                  </div>
                  </div>
                  </div>

                  <input type="hidden" id="idSegusuario" name="idSegusuario" >
                  <div role="alert" hidden="false" id="mensaje-succes-usuario-div">
                    <span id="mensaje-succes-usuario"></span>
                  </div>

                  <div class="form-group">
                    <div class="col-md-5 col-md-offset-3">
                      <button type="submit" class="btn btn-primary grabarEmpleado">Registrar</button>
                      <button   id="cerrarmodal" class="btn btn-danger" data-dismiss="modal" rel="tooltip" title="Cerrar"
                      >Cerrar</button>
                    </div>
                  </div>
                </form><!-- /# usuarioForm -->

                <iframe name="empleadoPG" style="display: none;"></iframe>

              </div><!-- /.modal-body -->

              <div class="alert alert-dismissable alert-danger" id="message_save_usuario" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" >x</button>
                <strong></strong>
              </div>

            </div><!-- /. modal-content -->
          </div><!-- /. modal-dialog-->

          <iframe name="saveGp" style="display: none;"></iframe>
        </div><!-- /#myModalNuevorEmpleado -->

        <div class="modal fade" id="myModalEditarEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalEditarEmpleadoLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#myModalEditarEmpleado').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalEditarEmpleadoLabel">Editar Empleado<img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              <!-- /Cabecera -->
              <div class="modal-body">
                <form id="update_EmpleadoForm" method="post"  class="form-horizontal" onclick="EmpCore.validar();" target="empleadoPG" >
                  
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Nombres:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="desNombres" name="desNombres" placeholder="Nombres"  >
                      <input type="hidden" class="form-control" id="ide_persona" name="ide_persona"  >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Apellido Paterno:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="apePaterno" name="apePaterno" placeholder="Apellido Paterno"  >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Apellido Materno:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="apeMaterno" name="apeMaterno" placeholder="Apellido Materno"  >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">DNI:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control inputNumero" id="desDocumento" name="desDocumento" maxlength="8" placeholder="Documento"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Fecha de Nacimiento:</label>
                    <div class="col-lg-7">
                      <!--input type="text" class="form-control" id="desNombres"  name="desNombres" placeholder="Fecha de Nacimiento"/-->
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input name="fecNacimiento" id="fecNacimiento" type="date" class="form-control" />
                      </div><!-- /.input group -->
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-lg-4 control-label">Teléfono:</label>
                    <div class="col-lg-7">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                        <input type="tel" name="desTelefono" id="desTelefono"  class="form-control inputNumero" maxlength="9" data-inputmask='"mask": "(99) 302-5902"' data-mask/>
                      </div><!-- /.input group -->
                      <!--input type="text" class="form-control" id="desApPaterno"  name="desApPaterno" placeholder="Tel&eacute;fono"/-->
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Correo electrónico:</label>
                    <div class="col-lg-7">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="desCorreo" id="desCorreo" class="form-control" placeholder="Correo electronico" data-error="El correo ingresado es invalido">
                      </div>
                      <!--input type="text" class="form-control" id="desEmail" name="desEmail" placeholder="Correo electr&oacute;nico"/-->
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Sueldo:</label>
                    <div class="col-lg-7">
                      <div class="input-group">
                        <span class="input-group-addon">S/.</span>
                        <input type="text" name="Sueldo" id="Sueldo" class="form-control inputNumero" placeholder="" data-error="El correo ingresado es invalido">
                      </div>
                      <!--input type="text" class="form-control" id="desEmail" name="desEmail" placeholder="Correo electr&oacute;nico"/-->
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Sexo:</label>
                    <div class="col-lg-7">
                      <div  class="controls">
                        <div class="btn-group" data-toggle="buttons" id="options"  >
                          <label class="btn btn-primary btn-success EstCiv EstCivM">
                            <input type="radio" name="idsexo"  id="idsexo" value="M" > Masculino
                          </label>
                          <label class="btn btn-primary btn-success EstCiv EstCivF">
                            <input type="radio" name="idsexo"  id="idsexo" value="F" > Femenino
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Estado civil:</label>
                    <div class="col-lg-7">
                      <select class="form-control" name="selEstadoCivil" id="selEstadoCivil">
                        <option value="">Seleccione Estado Civil</option>
                        <option value="1">Soltero(a)</option>
                        <option value="2">Casado(a)</option>
                        <option value="3">Viudo(a)</option>
                        <option value="4">Conviviente</option>
                        <option value="5">Divorciado(a)</option>
                        <option value="6">Separado</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-lg-4 control-label" for="estado_emp">Estado:</label>
                  <div class="col-lg-7">
                  <div class="checkbox">
                  <label>
                  <input type="checkbox" name="estado_emp" id="estado_emp"><span id="edit_textEstado"></span>
                  </label>
                  </div>
                  </div>
                  </div>

                  <input type="hidden" id="idSegusuario" name="idSegusuario" >
                  <div role="alert" hidden="false" id="mensaje-succes-usuario-div">
                    <span id="mensaje-succes-usuario"></span>
                  </div>

                  <div class="form-group">
                    <div class="col-md-5 col-md-offset-3">
                      <button type="submit" class="btn btn-primary grabarEmpleado">Actualizar</button>
                      <button   id="cerrarmodal" class="btn btn-danger" data-dismiss="modal" rel="tooltip" title="Cerrar"
                      >Cerrar</button>
                    </div>
                  </div>
                </form><!-- /# usuarioForm -->

                <iframe name="empleadoPG" style="display: none;"></iframe>

              </div><!-- /.modal-body -->

              <div class="alert alert-dismissable alert-danger" id="message_save_usuario" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" >x</button>
                <strong></strong>
              </div>

            </div><!-- /. modal-content -->
          </div><!-- /. modal-dialog-->

          <iframe name="saveGp" style="display: none;"></iframe>
        </div><!-- /#myModalEditarEmpleado -->


        <!--div class="modal fade" id="dialogUsuarioModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Eliminar Usuario</h4>
              </div>
              <div class="modal-body">
                <p>Estas seguro de eliminar el usuario?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary btnEliminar" id="btneliminar" value="" lang=""
                onclick="javascript:coreFn.confirmEliminarUsuario(this);">Si</button>
              </div>
            </div>
            <!-- /.modal-content --
          </div>
          <!-- /.modal-dialog --
        </div-->
        <!-- /.modal -->

<script>
    window.onload=function(){
        EmpCore.initListadoEmpleados();
    };
</script>