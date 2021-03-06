<?php
	require_once('../libs/php/sql_sigp.php');
	require_once('../libs/php/generales.php');
	require_once('../libs/php/funciones_regiones.php');
	
	// isset($_POST['funcion']) && 
	if($_POST['funcion']=="listar_regiones")
	{
		//echo "ListarUsuarios";
		
		$cns = "select id, nombre, simbolo, id_pais from regiones order by id ASC";
				
		$a = get_datos($cns);
		
		$objeto = "[";		
		while(odbc_fetch_row($a))
		{
			$objeto .= "{";
			$objeto .= "'id':'".odbc_result($a,"id")."',";
			$objeto .= "'nombre':'".str_replace("'","",encoder(odbc_result($a,"nombre")))."',";
			$objeto .= "'simbolo':'".encoder(odbc_result($a,"simbolo"))."',";
			$objeto .= "'pais':'".encoder(get_nombre_pais(odbc_result($a,"id_pais")))."'";
			$objeto .= "},";
		}
		$objeto = substr($objeto,0,-1);
		$objeto .= "]";
		
		echo $objeto;
	}
	
	if($_POST['funcion']=="nueva_region")
	{
		$cns = "insert into regiones (nombre, simbolo, id_pais) values('".$_POST['nombre']."','".$_POST['abb']."',".$_POST['pais'].")";
				
		$a = get_datos($cns);
		
		$cns = "SELECT @@IDENTITY AS ID";
		
		$b = get_datos($cns);
		
		while(odbc_fetch_row($b))
		{
			$ultimo_id = odbc_result($b,"ID");
		}

		echo $ultimo_id;
		//echo $cns;
	}
	
	if($_POST['funcion']=="updt_region"){
		//echo "ListarUsuarios";

		$cns = "update regiones set nombre='".decoder($_POST['nombre'])."', simbolo ='".decoder($_POST['abb'])."', id_pais=".$_POST['pais']." where id=".$_POST['id'];
				
		$a = get_datos($cns);
	}
	
	if($_POST['funcion']=="listar_paises"){
		//echo "ListarUsuarios";
		
		$cns = "select id, nombre from pais order by nombre ASC";
				
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

	if($_POST['funcion']=="obter_id_pais"){
		//echo "ListarUsuarios";
		
		$cns = "SELECT id from paises where id =".$_POST['id'];
				
		$a = get_datos($cns);
		
		$objeto = "[";		
		while(odbc_fetch_row($a))
		{
			$objeto .= "{";
			$objeto .= "'id':'".odbc_result($a,"id")."'";
			$objeto .= "},";
		}
		$objeto = substr($objeto,0,-1);
		$objeto .= "]";
		
		echo $objeto;
	}
	
	if($_POST['funcion']=="GrabarNuevoUsuario"){
		//echo "ListarUsuarios";
		$ultimo_id = 0; 
		
		$cns = "INSERT INTO sigp_usuarios.dbo.usuarios (nombre,apellidos,rut,clave,id_estados,id_perfil) VALUES ".
           		"('".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['rut']."','".$_POST['clave']."','".$_POST['idEstado']."','".$_POST['idPerfil']."')";
           				
		$a = get_datos($cns);
		
		$cns = "SELECT @@IDENTITY AS ID";
		
		$b = get_datos($cns);
		
		while(odbc_fetch_row($b))
		{
			$ultimo_id = odbc_result($b,"ID");
		}

		echo $ultimo_id;
	}
	
	if($_POST['funcion']=="GrabarUsuario"){
		//echo "ListarUsuarios";
		
		$cns = "UPDATE sigp_usuarios.dbo.usuarios SET nombre = "."'".$_POST['nombre']."',".
					"apellidos = "."'".$_POST['apellidos']."',".
					"rut = "."'".$_POST['rut']."',".
					"id_estados = "."'".$_POST['idEstado']."',".
					"id_perfil = "."'".$_POST['idPerfil']."' ".
				" WHERE id = ".$_POST['id'];
					           				
		$a = get_datos($cns);
		//$a = 1;
		if($a===true)
			$respuesta = -1;
		else
			$respuesta = 1;

		echo $respuesta;
	}

?>
