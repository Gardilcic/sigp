<?php

session_start();
require_once('../libs/php/sql_sigp.php');
// isset($_POST['funcion']) && 
if ($_POST['funcion'] == "ListarItemizadoPMO") {
    //echo "ListarUsuarios";

    $var1 = "SELECT REPLACE(codigo,'.','') as orden,* FROM sigp.dbo.vista_itemizado_pmo ORDER BY orden ASC";

    $a = get_datos_sigp($var1);

    while (odbc_fetch_row($a)) {
        for ($contador = 1; $contador <= odbc_num_fields($a); $contador++) {
            $nombre = odbc_field_name($a, $contador);
            $proyectos[$nombre] = odbc_result($a, $contador);
        }
        $objeto[] = $proyectos;
    }
    echo json_encode($objeto);
}

if ($_POST['funcion'] == "ObtenerCorrelativoPMO") {

    $var1 = "SELECT dbo.fnGetCorrelativoPMO('".$_POST["idpadre"]."') AS codigo";

    $a = get_datos_sigp($var1);

    while (odbc_fetch_row($a)) {
        for ($contador = 1; $contador <= odbc_num_fields($a); $contador++) {
            $nombre = odbc_field_name($a, $contador);
            $proyectos[$nombre] = odbc_result($a, $contador);
        }
        $objeto[] = $proyectos;
    }
    echo json_encode($objeto);
}


if ($_POST['funcion'] == "GrabarNuevo") {

    $var1 = "";
    $var1 .= "INSERT INTO sigp.dbo.itemizado_pmo ";
    $var1 .= "            (codigo, ";
    $var1 .= "             id_padre, ";
    $var1 .= "             descripcion, ";
    $var1 .= "             id_estados, ";
    $var1 .= "             fecha_ingreso, ";
    $var1 .= "             id_version, ";
    $var1 .= "             id_unidad, ";
    $var1 .= "             id_usuario, ";
    $var1 .= "             factor_equivalencia ) ";
    $var1 .= "VALUES      ('$_POST[codigo]', ";
    $var1 .= "             '$_POST[idpadre]', ";
    $var1 .= "             '$_POST[descripcion]', ";
    $var1 .= "             '$_POST[idestado]', ";
    $var1 .= "             '".date('Y-m-d')."', ";
    $var1 .= "             '$_POST[idversion]', ";
    $var1 .= "             '$_POST[idunidad]', ";
    $var1 .= "             '1', ";
    $var1 .= "             $_POST[factor] ) " ;

    $a = get_datos_sigp($var1);
    $cns = "SELECT @@IDENTITY AS ID";
    $b = get_datos_sigp($cns);
    while (odbc_fetch_row($b)) {
        $ultimo_id = odbc_result($b, "ID");
    }
    echo $ultimo_id;
}

if ($_POST['funcion'] == "GrabarItemizadoPMO") {

    $var1 = "";
    $var1 .= "UPDATE sigp.dbo.itemizado_pmo SET ";
    $var1 .= "            descripcion = '$_POST[descripcion]', ";
    $var1 .= "             id_estados = '$_POST[idestado]', ";
    $var1 .= "             id_unidad = '$_POST[idunidad]', ";
    $var1 .= "             factor_equivalencia = '$_POST[factor]' ";
    $var1 .= "WHERE id = '$_POST[id]'";    

    $a = get_datos_sigp($var1);
    
    if ($a === true)
        $respuesta = -1;
    else
        $respuesta = 1;

    echo $respuesta;
}


?>
