<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta content="es-pe" http-equiv="Content-Language">
        <meta charset="utf-8">
        <title>Gardilcic :: SIGP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="">
        <link rel="icon" type="image/png" href="libs/img/logo.png" />
        <link href="libs/css/bootstrap.css" rel="stylesheet">
        <link href="libs/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="libs/css/jquery.tablesorter.pager.css" rel="stylesheet">
        <link href="libs/css/theme.bootstrap.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->	

    </head>

    <body>

        <?php include('./libs/php/encabezado.php'); ?>

        <div class="container">
            <legend>Mantenedor de Usuarios</legend>

            <p style="text-align:right;"><a class='btn btn-success' href='#dlgAgregar' data-toggle='modal'><i class='icon-file icon-white'></i>Nuevo Usuario</a></p>

            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>R.U.T.</th>
                        <th>Perfil</th>
                        <th>Estado</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody id="tabla_body">
                </tbody>
                <tfoot>
                    <tr>
                        <th data-column="0">Nombre</th>
                        <th data-column="1">Apellidos</th>
                        <th data-column="2">R.U.T.</th>
                        <th data-column="3">Perfil</th>
                        <th data-column="4">Estado</th>
                        <th data-column="5">Operaciones</th>
                    </tr>
                    <tr>
                        <th colspan="7" class="pager form-horizontal tablesorter-pager" data-column="0" style="">
                            <button class="btn first disabled"><i class="icon-step-backward"></i></button>
                            <button class="btn prev disabled"><i class="icon-arrow-left"></i></button>
                            <span class="pagedisplay">1 - 10 / 29 (50)</span> <!-- this can be any element, including an input -->
                            <button class="btn next"><i class="icon-arrow-right"></i></button>
                            <button class="btn last"><i class="icon-step-forward"></i></button>
                            <select class="pagesize input-mini" title="Select page size">
                                <option selected="selected" value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                            </select>
                            <select class="pagenum input-mini" title="Select page number"><option>1</option><option>2</option><option>3</option></select>
                        </th>
                    </tr>
                </tfoot>

            </table>

            <!-- DIALOGO MODAL : NUEVO USUARIO -->
            <div id="dlgAgregar" class="modal hide fade" tabindex="-1" role="dialog">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Nuevo Usuario</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="form_nuevo">  
                        <div class="alert mensajes" style="display:none;">
                            <button type="button" class="close" onclick="$('.alert').hide()">&times;</button>
                            <strong>Warning!</strong><span id="mensaje"></span>
                        </div>
                        <fieldset>  
                            <div class="control-group">  
                                <label class="control-label" for="perfiles">Perfil</label>  
                                <div class="controls">  
                                    <select id="perfiles">  
                                    </select>	            
                                </div>  
                            </div>
                            <div class="control-group">  
                                <label class="control-label" for="NuevoNombre">Nombre</label>  
                                <div class="controls">  
                                    <input type="text" class="input-xlarge" id="NuevoNombre" placeholder="Ingrese su Nombre"><br/><br/>   
                                    <input type="text" class="input-xlarge" id="NuevoApellido" placeholder="Ingrese su Apellido">  
                                    <!--p class="help-block"></p-->  
                                </div>  
                            </div>
                            <div class="control-group">  
                                <label class="control-label" for="NuevoRut">R.U.T.</label>  
                                <div class="controls">  
                                    <input type="text" class="input-large" id="NuevoRut" placeholder="Ingrese su RUT 12345678-9" required="required">   
                                </div>  
                            </div>
                            <div class="control-group">  
                                <label class="control-label" for="NuevoClave">Clave</label>  
                                <div class="controls">  
                                    <input type="password" class="input-large" id="NuevoClave" placeholder="Ingrese su Clave">   
                                </div>  
                            </div>
                            <div class="control-group">  
                                <label class="control-label" for="select01">Estado</label>  
                                <div class="controls">  
                                    <select id="estados">  
                                    </select>	            
                                </div>  
                            </div>
                        </fieldset>  
                    </form>  
                </div>
                <div class="modal-footer">
                    <button id="btnNuevoCancelar" class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button id="btnNuevoAceptar" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            <!-- FIN DIALOGO MODAL : NUEVO USUARIO -->

            <!-- DIALOGO MODAL : MODIFICAR USUARIO -->
            <div id="dlgModificar" class="modal hide fade" tabindex="-1" role="dialog">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Editar Usuario</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="form_nuevo">  
                        <div class="alert mmensajes" style="display:none;">
                            <button type="button" class="close" onclick="$('.alert').hide()">&times;</button>
                            <strong>Warning!</strong><span id="mmensaje"></span>
                        </div>
                        <fieldset>  
                            <div class="control-group">  
                                <label class="control-label" for="mperfiles">Perfil</label>  
                                <div class="controls">  
                                    <input type="hidden" class="input-xlarge" id="IdRegistro">
                                    <select id="mperfiles">  
                                    </select>	            
                                </div>  
                            </div>
                            <div class="control-group">  
                                <label class="control-label" for="EditarNombre">Nombre</label>  
                                <div class="controls">  
                                    <input type="text" class="input-xlarge" id="EditarNombre" placeholder="Ingrese su Nombre"><br/><br/>   
                                    <input type="text" class="input-xlarge" id="EditarApellido" placeholder="Ingrese su Apellido">  
                                    <!--p class="help-block"></p-->  
                                </div>  
                            </div>
                            <div class="control-group">  
                                <label class="control-label" for="EditarRut">R.U.T.</label>  
                                <div class="controls">  
                                    <input type="text" class="input-large" id="EditarRut" placeholder="Ingrese su RUT 12345678-9" required="required">   
                                </div>  
                            </div>
                            <div class="control-group">  
                                <label class="control-label" for="EditarClave">Clave</label>  
                                <div class="controls">  
                                    <input type="password" class="input-large" id="EditarClave" placeholder="Ingrese su Clave">   
                                </div>  
                            </div>
                            <div class="control-group">  
                                <label class="control-label" for="mestados">Estado</label>  
                                <div class="controls">  
                                    <select id="mestados">  
                                    </select>	            
                                </div>  
                            </div>
                        </fieldset>  
                    </form>  
                </div>
                <div class="modal-footer">
                    <button id="btnEditarCancelar" class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button id="btnEditarAceptar" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            <!-- FIN DIALOGO MODAL : MODIFICAR USUARIO -->

            <!-- DIALOGO MODAL : ELIMINAR USUARIO -->
            <div id="dlgEliminar" class="modal hide fade" tabindex="-1" role="dialog">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Confirmacion : Eliminar Usuario</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="form_nuevo">  
                        <div class="alert mmensajes" style="display:none;">
                            <button type="button" class="close" onclick="$('.alert').hide()">&times;</button>
                            <strong>Warning!</strong><span id="mmensaje"></span>
                        </div>
                        <p>Esta seguro que desea borrar este registro del sistema ?</p>		        
                    </form>  
                </div>
                <div class="modal-footer">
                    <button id="btnEliminarCancelar" class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button id="btnEliminarAceptar" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
            <!-- FIN DIALOGO MODAL : ELIMINAR USUARIO -->

        </div> <!-- /container -->

        <?php include('libs/php/piepagina.php'); ?> 
        <script type="text/javascript" src="controlador/usuarios.js"></script>

    </body></html>