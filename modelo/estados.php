<?php
	require_once('../libs/php/sql_sigp.php');
	
	if($_POST['funcion']=="ListarEstados"){
		
		$var1 = "SELECT * FROM sigp.dbo.estados WHERE id_tipo=1" ;	
							
		$a = get_datos_sigp($var1);
		
		while(odbc_fetch_row($a)){
			for($contador=1; $contador<=odbc_num_fields($a); $contador++)
			{
				$nombre = odbc_field_name($a, $contador);
				$proyectos[$nombre]=odbc_result($a,$contador);
			}
			$objeto[]=$proyectos;
		}		
		echo json_encode($objeto);
	}



?>
