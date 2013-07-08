<?php
	require_once('../libs/php/sql_sigp.php');
	require_once('../libs/php/generales.php');
	require_once('../libs/php/funciones_regiones.php');
	
	// isset($_POST['funcion']) && 
	if($_POST['funcion']=="listar_empresas")
	{
		//echo "ListarUsuarios";
		
		$cns = "select id, nombre, rut, direccion, representante_legal, giro, estado from vista_empresas order by nombre ASC";
				
		$a = get_datos($cns);
		$contador=0;
		$objeto = "[";		
		while(odbc_fetch_row($a))
		{
			$objeto .= "{";
			$objeto .= "'id':'".odbc_result($a,"id")."',";
			$objeto .= "'nombre':'".str_replace("'","",encoder(odbc_result($a,"nombre")))."',";
			$objeto .= "'rut':'".str_replace("'","",encoder(odbc_result($a,"rut")))."',";
			$objeto .= "'direccion':'".str_replace("'","",encoder(odbc_result($a,"direccion")))."',";
			$objeto .= "'representante':'".str_replace("'","",encoder(odbc_result($a,"representante_legal")))."',";
			$objeto .= "'giro':'".str_replace("'","",encoder(odbc_result($a,"giro")))."',";
			$objeto .= "'estado':'".encoder(odbc_result($a,"estado"))."',";
			$objeto .= "'holding':'".get_tipo_empresa(odbc_result($a,"id"), 'holding')."',";
			$objeto .= "'mandante':'".get_tipo_empresa(odbc_result($a,"id"), 'mandantes')."',";
			$objeto .= "'ito':'".get_tipo_empresa(odbc_result($a,"id"), 'ito')."'";
			$objeto .= "},";
			$contador=1;
		}
		if($contador>=1)
		{
			$objeto = substr($objeto,0,-1);
		}
		$objeto .= "]";
		
		echo $objeto;
	}
	
	if($_POST['funcion']=="nueva_empresa")
	{
		$cns = "EXEC [dbo].[crea_empresa] @nombre = N'".decoder($_POST['nombre'])."',@rut='".decoder($_POST['rut'])."',@direccion='".decoder($_POST['direccion'])."',@representante='".decoder($_POST['representante'])."',@giro='".decoder($_POST['giro'])."',@estado = ".$_POST['estado'].",@ito=".decoder($_POST['ito']).",@holding=".decoder($_POST['holding']).",@mandante=".decoder($_POST['mandante']);
		
		$a = get_datos($cns);
		
		while(odbc_fetch_row($a))
		{
			$respuesta = odbc_result($a,"respuesta");
		}
		echo $respuesta;
	}
	
	if($_POST['funcion']=="updt_empresa")
	{
		$cns = "EXEC [dbo].[actualiza_empresa] @nombre = N'".decoder($_POST['nombre'])."',@rut='".decoder($_POST['rut'])."',@direccion='".decoder($_POST['direccion'])."',@representante='".decoder($_POST['representante'])."',@giro='".decoder($_POST['giro'])."',@estado = ".$_POST['estado'].",@ito=".decoder($_POST['ito']).",@holding=".decoder($_POST['holding']).",@mandante=".decoder($_POST['mandante']).", @id = ".$_POST['id'];

		$a = get_datos($cns);
		while(odbc_fetch_row($a))
		{
			$respuesta = odbc_result($a,'respuesta');
		}
		echo $respuesta;
		//echo $cns;
	}
	
	if($_POST['funcion']=="listar_estados")
	{
		$cns = "select id, nombre from estados where id_tipo =1 order by nombre ASC";

		$a = get_datos($cns);
		
		$objeto = "[";		
		while(odbc_fetch_row($a))
		{
			$objeto .= "{";
			$objeto .= "'id':'".odbc_result($a,"id")."',";
			$objeto .= "'nombre':'".encoder(odbc_result($a,"nombre"))."'";
			$objeto .= "},";
		}
		$objeto = substr($objeto,0,-1);
		$objeto .= "]";
		
		echo $objeto;
	}

function get_tipo_empresa($id, $tabla)
{
	$cns = "select COUNT(id_empresa) as cant from empresas_".$tabla." where id_empresa =".$id;
	$a = get_datos($cns);
	while(odbc_fetch_row($a))
	{
		$respuesta = odbc_result($a,'cant');
	}
	if($respuesta == 1)
	{
		$respuesta = "SI";
	}
	else
	{
		$respuesta = "NO";
	}
	return $respuesta;
}


?>