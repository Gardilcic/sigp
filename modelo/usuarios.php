<?php
	require_once('../libs/php/sql_sigp.php');
	// isset($_POST['funcion']) && 
	if($_POST['funcion']=="ListarUsuarios"){
		//echo "ListarUsuarios";
		
		$cns = "SELECT usu.id,usu.nombre,usu.apellidos,usu.rut,usu.clave,usu.id_perfil,per.nombre as perfil_nombre," .
				"	est.id as id_estado, est.nombre as estado_nombre " .
				"FROM sigp_usuarios.dbo.usuarios as usu " .
				"	JOIN sigo.dbo.adm_perfil as per ON usu.id_perfil = per.id " .
				"	JOIN sigo.dbo.estados as est ON est.id = usu.id_estados " .
				"WHERE est.id_tipo = 1  ";
				
		$a = get_datos($cns);
		
		$objeto = "[";		
		while(odbc_fetch_row($a))
		{
			$objeto .= "{";
			$objeto .= "'id':'".odbc_result($a,"id")."',";
			$objeto .= "'nombre':'".odbc_result($a,"nombre")."',";
			$objeto .= "'apellidos':'".odbc_result($a,"apellidos")."',";
			$objeto .= "'rut':'".odbc_result($a,"rut")."',";			
			$objeto .= "'clave':'".odbc_result($a,"clave")."',";
			$objeto .= "'id_perfiles':'".odbc_result($a,"id_perfil")."',";
			$objeto .= "'perfil_nombre':'".odbc_result($a,"perfil_nombre")."',";
			$objeto .= "'id_estados':'".odbc_result($a,"id_estado")."',";
			$objeto .= "'estado_nombre':'".odbc_result($a,"estado_nombre")."'";
			$objeto .= "},";
		}
		$objeto = substr($objeto,0,-1);
		$objeto .= "]";
		
		echo $objeto;
	}
	if($_POST['funcion']=="ListarPerfiles"){
		//echo "ListarUsuarios";
		
		$cns = "SELECT per.id,per.nombre, ".
				"	est.id as id_estado, est.nombre as estado_nombre ".
				"FROM sigo.dbo.adm_perfil as per ".
				"	JOIN sigo.dbo.estados as est ON est.id = per.id_estados ".
				"WHERE est.id_tipo = 1 AND est.id = 1  ";
				
		$a = get_datos($cns);
		
		$objeto = "[";		
		while(odbc_fetch_row($a))
		{
			$objeto .= "{";
			$objeto .= "'id':'".odbc_result($a,"id")."',";
			$objeto .= "'nombre':'".odbc_result($a,"nombre")."',";
			$objeto .= "'id_estados':'".odbc_result($a,"id_estado")."',";
			$objeto .= "'estado_nombre':'".odbc_result($a,"estado_nombre")."'";
			$objeto .= "},";
		}
		$objeto = substr($objeto,0,-1);
		$objeto .= "]";
		
		echo $objeto;
	}
	if($_POST['funcion']=="ListarEstados"){
		//echo "ListarUsuarios";
		
		$cns = "SELECT est.id, est.nombre, est.id_tipo ".
				" FROM sigo.dbo.estados as est ".
				" WHERE est.id_tipo = 1 ".
				" ORDER BY est.nombre asc ";
				
		$a = get_datos($cns);
		
		$objeto = "[";		
		while(odbc_fetch_row($a))
		{
			$objeto .= "{";
			$objeto .= "'id':'".odbc_result($a,"id")."',";
			$objeto .= "'nombre':'".odbc_result($a,"nombre")."',";
			$objeto .= "'id_tipo':'".odbc_result($a,"id_tipo")."',";
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
