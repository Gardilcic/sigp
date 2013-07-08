<?php
	require_once('../libs/php/sql_sigp.php');
	require_once('../libs/php/generales.php');
	require_once('../libs/php/funciones_regiones.php');
	
	// isset($_POST['funcion']) && 
	if($_POST['funcion']=="listar_perfiles")
	{
		//echo "ListarUsuarios";
		
		$cns = "select id,nombre,nombre_estado from dbo.vista_usuarios_perfil order by nombre ASC";
				
		$a = get_datos($cns);
		$contador=0;
		$objeto = "[";		
		while(odbc_fetch_row($a))
		{
			$objeto .= "{";
			$objeto .= "'id':'".odbc_result($a,"id")."',";
			$objeto .= "'nombre':'".str_replace("'","",encoder(odbc_result($a,"nombre")))."',";
			$objeto .= "'estado':'".encoder(odbc_result($a,"nombre_estado"))."'";
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
	
	if($_POST['funcion']=="nuevo_perfil")
	{
		$cns = "EXEC [dbo].[crea_perfil_usuarios] @nombre = N'".decoder($_POST['nombre'])."', @estado = ".$_POST['estado'];
				
		$a = get_datos($cns);
		
		/*$cns = "SELECT @@IDENTITY AS ID";
		
		$b = get_datos($cns);*/
		
		while(odbc_fetch_row($a))
		{
			$respuesta = odbc_result($a,"respuesta");
		}

		echo $respuesta;
		//echo $cns;
	}
	
	if($_POST['funcion']=="updt_perfil")
	{
		//echo "ListarUsuarios";

		$cns = "EXEC [dbo].[actualiza_perfil_usuarios] @nombre = N'".decoder($_POST['nombre'])."', @estado = ".$_POST['estado'].", @id = ".$_POST['id'];
				
		$a = get_datos($cns);
		while(odbc_fetch_row($a))
		{
			$respuesta = odbc_result($a,'respuesta');
		}
		echo $respuesta;
	}
	
	if($_POST['funcion']=="listar_estados"){
		//echo "ListarUsuarios";
		
		$cns = "select id, nombre from vista_usuarios_estados order by nombre ASC";
				
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

?>