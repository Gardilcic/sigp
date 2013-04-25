<?php

function get_datos($cns)
{
	// Se define la cadena de conexión
	$dsn = "Driver={SQL Server};Server=GARDILCIC-014;Database=sigp_documentacion;Integrated Security=SSPI;Persist Security Info=False;";
	// Se realiza la conexón con los datos especificados anteriormente
	$conn = odbc_connect( $dsn, 'gestiondocs', '1q2w3e4r5t6y' );
	//$conn = odbc_connect( $dsn, 'indumotora', '' );
	if (!$conn)
	{
		exit( "Error al conectar: " . $conn);
	}
	// Se define la consulta que va a ejecutarse, como en sql
	//$sql = "select nombre, descripcion from estacion";
	// Se ejecuta la consulta y se guardan los resultados en el recordset rs
	$rs = odbc_exec( $conn, $cns );
	if ( !$rs )
	{
		exit( "Error en la consulta SQL ".$cns  );
	}
	// Se muestran los resultados
	/*while ( odbc_fetch_row($rs) ) 
	{
		$resultado=odbc_result($rs,"nombre");
		echo $resultado;
		$resultado=odbc_result($rs,"descripcion");
		echo $resultado;
	}*/
	// Se cierra la conexión
	//odbc_close( $conn );
	return $rs;
	odbc_close( $conn );
}

function cierra_conn()
{
	//odbc_close( $conn );
	$a="";
}

function set_datos($cns)
{
	// Se define la cadena de conexión
	$dsn = "Driver={SQL Server};Server=GARDILCIC-014;Database=sigp_documentacion;Integrated Security=SSPI;Persist Security Info=False;";
	// Se realiza la conexón con los datos especificados anteriormente
	$conn = odbc_connect( $dsn, 'sigp_documentacion', '1q2w3e4r5t6y' );
	//$conn = odbc_connect( $dsn, 'indumotora', '' );
	if (!$conn)
	{
		exit( "Error al conectar: " . $conn);
	}
	// Se define la consulta que va a ejecutarse, como en sql
	//$sql = "select nombre, descripcion from estacion";
	// Se ejecuta la consulta y se guardan los resultados en el recordset rs
	$rs = odbc_exec( $conn, $cns );
	// Se cierra la conexión
	odbc_close( $conn );
}
?>