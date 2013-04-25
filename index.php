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

    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->	

  </head>

  <body>
	
	<?php include('encabezado.php'); ?>

    <div class="container">
    
		<script type="text/javascript" src="libs/js/generales.js"></script>

		<script type="text/javascript">
		
		function crea_itemizado()
		{
			var codigo = document.getElementById('codigo_pmo').value;
			var descripcion= document.getElementById('nombre_pmo').value;
			var padre= document.getElementById('dependencia').value;
			var usuario = 1;
			var estado = document.getElementById('estado').value;
			var unidad_medida = document.getElementById('unidad_medida').value;
			if(valida_campo(codigo,0)== true && valida_campo(descripcion,0) == true)
			{
				$.post("libs/php/jquery/crea_itemizado.php", { codigo:codigo, descripcion:descripcion, padre:padre,usuario:usuario, estado:estado, unidad_medida:unidad_medida},
				function(data)
				{
					alert('Realizado');
					location.reload();
				}
				);
			}
		}
		
		function actualiza_itemizado()
		{
			var codigo = document.getElementById('codigo_pmo').value;
			var descripcion= document.getElementById('nombre_pmo').value;
			var padre= document.getElementById('dependencia').value;
			var usuario = 1;
			var estado = document.getElementById('estado').value;
			var unidad_medida = document.getElementById('unidad_medida').value;
			var id= document.getElementById('itemizado_id').value;
			if(valida_campo(id,0)== true)
			{
				$.post("libs/php/jquery/actualiza_itemizado.php", { codigo:codigo, descripcion:descripcion, padre:padre,usuario:usuario, estado:estado, unidad_medida:unidad_medida, id:id},
				function(data)
				{
					//alert(data);
					//document.getElementById('resultado').innerHTML=data;
					alert('Realizado');
					location.reload();
				}
				);
			}
		}
		
		function muestra_itemizado()
		{
			var itemizado_id=document.getElementById('itemizado_lista').value;
			if(itemizado_id!=0)
			{
				$.post("libs/php/jquery/get_datos_itemizado.php", { itemizado_id:itemizado_id},
				function(data)
				{
					datos = data.split('&&');
					document.getElementById('codigo_pmo').value=datos[0];
					document.getElementById('nombre_pmo').value=datos[2];
					document.getElementById('dependencia').value=datos[1];
					document.getElementById('estado').value=datos[3];
					document.getElementById('unidad_medida').value=datos[4];
					document.getElementById('itemizado_id').value=datos[5];
				}
				);
			}
			else
			{
				alert('Debe elegir un Itemizado válido');
			}
		}
		
		function recarga()
		{
			location.reload();
		}
		</script>
		<div name="capa_mantenedor" style="margin-top:5px; margin-left:5px; position:absolute;">
			<form name="frm_mantenedor_itemizado" method="post">
				<table border="0">
					<tr>
						<td>
							Versi&oacute;n:
						</td>
						<td>
							<select name="version" id="version">
							
							</select>
						</td>
						<td>
							Lista de itemizado existente:
						</td>
						<td>
							<select name="itemizado_lista" id="itemizado_lista">
								<option value="0">Elija</option>
													</select>
						</td>
						<td>
							<input type="button" name="btn_ver_itemizado" id="btn_ver_itemizado" value="Mostrar" onclick="muestra_itemizado();" />
						</td>
					</tr>
				</table>
				<hr />
				<br/>
				<table border="0">
					<tr>
						<td>
							C&oacute;digo:
						</td>
						<td>
							<input type="text" name="codigo_pmo" id="codigo_pmo" size="13" />
						</td>
						<td>
							&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							Nombre / descripci&oacute;n:
						</td>
						<td>
							<input type="text" name="nombre_pmo" id="nombre_pmo" size="13" maxlength="1024" />
						</td>
						<td>
							&nbsp;&nbsp;&nbsp;
						</td>
					</tr>
					<tr>
						<td>
							Estado:
						</td>
						<td>
							<select name="estado" id="estado" style="width:120px; border:0px;">
								<option value='1'>Activo</option><option value='2'>Inactivo</option>					</select>
						</td>
						<td>
							&nbsp;&nbsp;&nbsp;
						</td>
						<td>
							Unidad de medida:
						</td>
						<td>
							<select name="unidad_medida" id="unidad_medida" style="width:120px; border:0px;">
								<option value='4'>M2</option><option value='3'>M3</option><option value='1'>No aplica</option><option value='2'>Unidad</option>					</select>
						</td>
						<td>
							<input type="hidden" name="itemizado_id" id="itemizado_id" />
						</td>
					</tr>
					<tr>
						<td>
							Dependencia:
						</td>
						<td>
							<select name="dependencia" id="dependencia" style="width:140px; border:0px;">
								<option value="0">No tiene</option>
													</select>
						</td>
					</tr>
					<tr>
						<td>
							<input type="button" name="btn_agregar" id="btn_agregar" value="Agregar" onclick="crea_itemizado();" />
						</td>
						<td></td>
						<td>
							<input type="button" name="btn_actualiza" id="btn_actualiza" value="Actualizar" onclick="actualiza_itemizado();" />
						</td>
						<td></td>
						<td>
							<input type="button" name="btn_refresh" id="btn_refresh" value="Recargar" onclick="recarga();"/>
						</td>
					</tr>
				</table>
			</form>
			<div id="resultado" name="resultado"></div>
		</div>

    </div> <!-- /container -->
    
	<?php include('piepagina.php'); ?>  

</body></html>