<?php
session_start();
if(isset($_SESSION['status']))
{
	header('Location: main.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="icon" type="image/png" href="libs/img/logo.png" />
<link href="libs/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link href="libs/css/normalize.css" rel="stylesheet" media="screen"/>
<title>SIGP - Inicio</title>
<script type="text/javascript">

function clear_box(caja)
{
	document.getElementById(caja).value='';
}

</script>
</head>
<body>
<?php
	require_once('libs/php/encabezado_login.php');
?>
<div style="margin:0 auto 0 auto; width:300px; margin-top:75px;">
	<form name="login" method="post">
		<table border="0">
			<tr>
				<td>
					<img alt="" src="libs/img/i_logo.png" />
				</td>
			</tr>
			<tr>
				<td>
					<span class="text-left"><h5>Nombre de usuario</h5></span>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="nombre_usuario" id="nombre_usuario" size="13" value="12345678-9" onclick="clear_box('nombre_usuario');"/>
				</td>
			</tr>
			<tr>
				<td>
					<span class="text-left"><h5>Contrase&ntilde;a</h5></span>
				</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="clave_usuario" id="clave_usuario" size="13" value="Usuario" onclick="clear_box('clave_usuario');"/>
				</td>
			</tr>
			<tr>
				<td>
					<center>
						<input type="submit" name="btn_entrar" id="btn_entrar" value="Ingresar" class="btn" />
					</center>
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
<?php
if(isset($_POST['btn_entrar']))
{
	require_once('libs/php/generales.php');
	require_once('libs/php/valida_login.php');
	
	$usuario=$_POST['nombre_usuario'];
	$clave=$_POST['clave_usuario'];
	if(valida_datos_login($usuario, $clave)>0)
	{
		$_SESSION['status']=1;
		$_SESSION['nombre']=get_nombre_apellidos($usuario);
		$_SESSION['id_usuario']=get_id_usuario($usuario);
		alert('Bienvenido '.$_SESSION['nombre']);
		header('Location: main.php');
	}
	else
	{
		print_error(1000);//ERROR DE USUARIO INVALIDO
	}
}
?>