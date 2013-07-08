<?php 
    session_start();
    //print_r($_SESSION['usuario']); 
?>
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
        
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->	

        <style>
            #permiso_usuario { width: 320px; height: 126px; margin: 30px 30px; background-image: url('libs/img/icono_modelo.png'); background-repeat: no-repeat; background-position: center top; }
            #permiso_usuario > p { margin-left: 40%; padding: 45px 20px; text-align: center; width: 120px; }
            #menu_usuario { width: 1200px; height: 35px; padding: 0.5em; }
            #menu_usuario > div { float: left; }
        </style>
        
    </head>

    <body>

        <?php include('./libs/php/encabezado.php'); ?>

        <div class="container">
            
            <legend>Bienvenido</legend>
            <br />
            
            <div id="menu_usuario">
            </div>

            <!-- DIALOGO MODAL : ASIGNAR PERMISO A PERFIL -->
            <div id="dlgAsignar" class="modal hide fade" tabindex="-1" role="dialog">                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Acceso Directo</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="form_nuevo">  
                        <input type="hidden" id="idUsuario" value="<?php echo $_SESSION['usuario']['usuario']; ?>" />
                        <div class="alert mensajes" style="display:none;">
                            <button type="button" class="close" onclick="$('.alert').hide()">&times;</button>
                            <strong>Aviso!</strong><span id="mensaje"></span>
                        </div>
                        <fieldset>
                            <div class="control-group">  
                                <label class="control-label" for="modulos">Modulos</label>  
                                <div class="controls">
                                    <select id="modulos"></select>
                                </div>
                            </div>                            
                            <div class="control-group">  
                                <label class="control-label" for="permisos">Permisos</label>  
                                <div class="controls">
                                    <select id="permisos"></select>
                                </div>
                            </div>
                        </fieldset>
                    </form>  
                </div>
                <div class="modal-footer">
                    <button id="btnAsignarCancelar" class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button id="btnAsignarAceptar" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            <!-- FIN DIALOGO MODAL : ASIGNAR PERMISO A PERFIL -->   

            
        </div> <!-- /container -->

        <?php include('libs/php/piepagina.php'); ?> 
        <script type="text/javascript" src="controlador/usuarios.js"></script>

    </body></html>