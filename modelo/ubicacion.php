<?php

session_start();
require_once('../libs/php/sql_sigp.php');
// isset($_POST['funcion']) && 

if ($_POST['funcion'] == "ListarUbicaciones") {

    $var1 = "";
    $var1 .= "SELECT id, ";
    $var1 .= "       nombre, ";
    $var1 .= "       region, ";
    $var1 .= "       id_regiones, ";
    $var1 .= "       nombre_regiones, ";
    $var1 .= "       simbolo_regiones, ";
    $var1 .= "       id_pais, ";
    $var1 .= "       nombre_pais, ";
    $var1 .= "       codigo_pais ";
    $var1 .= "FROM sigp.dbo.vista_ubicaciones";

    $a = get_datos_sigp($var1);

    $contador = 1;
    while (odbc_fetch_row($a)) {
        for ($contador = 1; $contador <= odbc_num_fields($a); $contador++) {
            $nombre = odbc_field_name($a, $contador);
            $proyectos[$nombre] = odbc_result($a, $contador);
        }
        $objeto[] = $proyectos;
    }
    echo json_encode($objeto);
}
?>
