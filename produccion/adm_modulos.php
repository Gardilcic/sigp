<?php
session_start();
if(!isset($_SESSION['status']))
{
	$_SESSION['nombre']='Gonzalo Grupe Arias.';
	//header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta content="es-pe" http-equiv="Content-Language">
    <meta charset="utf-8">
    <title>Gardilcic :: SIGP Usuario: <?php echo $_SESSION['nombre'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
	<link rel="icon" type="image/png" href="libs/img/logo.png" />
    <link href="libs/css/bootstrap.css" rel="stylesheet">
    <link href="libs/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="libs/css/jquery.tablesorter.pager.css" rel="stylesheet">
    <link href="libs/css/theme.bootstrap.css" rel="stylesheet">
    <!--[if lt IE 9]>
		<script src="libs/js/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body>
	
	<?php include('libs/php/encabezado.php'); ?>

    <div class="container">
    	<legend>Mantenedor de M&oacute;dulos</legend>
    	
    	<p style="text-align:right;">
    		<a class='btn btn-success' href='#dlgAgregar' data-toggle='modal'>
    			<i class='icon-file icon-white'></i>Agregar M&oacute;dulo
    		</a>
    	</p>
    	<!--TABLA DE BUSCADORES-->
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Estado</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody id="tabla_body">
			</tbody>
			<tfoot>
				<tr>
					<th data-column="0">Nombre</th>
					<th data-column="1">Estado</th>
					<th data-column="3">Acciones</th>
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
		<!--FIN BUSCADORES-->
		
		<!-- DIALOGO MODAL : NUEVO -->
		<div id="dlgAgregar" class="modal hide fade" tabindex="-1" role="dialog">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">Nuevo m&oacute;dulo</h3>
		  </div>
		  <div class="modal-body">
		    <form class="form-horizontal" id="form_nuevo">  
			    <div class="alert mensajes" style="display:none;">
				  <button type="button" class="close" onclick="$('.alert').hide()">&times;</button>
				  <strong>CUIDADO!</strong><span id="mensaje"></span>
				</div>
		        <fieldset>  
		          <div class="control-group">  
		            <label class="control-label" for="perfiles">Nombre</label>  
		            <div class="controls">  
		                <input type="text" class="input-xlarge" id="Nuevo_nombre" placeholder="Nuevo Módulo">	            
		            </div>  
		          </div>
		          <div class="control-group">  
		            <label class="control-label" for="NuevoNombre">Estado.</label>  
		            <div class="controls">
		              <select id="Nuevo_estado"></select>
		              <!--p class="help-block"></p-->  
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
		<!-- FIN DIALOGO MODAL : NUEVO-->
		
		<!-- DIALOGO MODAL : MODIFICAR-->
		<div id="dlgModificar" class="modal hide fade" tabindex="-1" role="dialog">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">Modificar m&oacute;dulo</h3>
		  </div>
		  <div class="modal-body">
		    <form class="form-horizontal" id="form_nuevo">  
			    <div class="alert mmensajes" style="display:none;">
				  <button type="button" class="close" onclick="$('.alert').hide()">&times;</button>
				  <strong>Warning!</strong><span id="mmensaje"></span>
				</div>
		        <fieldset>
		        	<div class="control-group">  
		            <label class="control-label" for="perfiles">Nombre</label>  
		            <div class="controls">  
		            <input type="hidden" id="mid">
		                <input type="text" class="input-xlarge" id="mNuevo_nombre" placeholder="Nuevo Módulo">	            
		            </div>  
		          </div>
		          <div class="control-group">  
		            <label class="control-label" for="NuevoNombre">Estado.</label>  
		            <div class="controls">
		              <select id="mNuevo_estado"></select>
		              <!--p class="help-block"></p-->  
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
	<script type="text/javascript" src="controlador/modulos.js"></script>
	
</body></html>