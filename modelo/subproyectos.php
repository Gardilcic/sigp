<?php

require_once('../libs/php/sql_sigp.php');
// isset($_POST['funcion']) && 
if ($_POST['funcion'] == "ListarSubProyectos") {
    //echo "ListarUsuarios";

    $var1 = "";
    $var1 .= "SELECT id, ";
    $var1 .= "       nombre, ";
    $var1 .= "       fecha_inicio, ";
    $var1 .= "       fecha_termino, ";
    $var1 .= "       monto, ";
    $var1 .= "       id_moneda, ";
    $var1 .= "       moneda_nombre, ";
    $var1 .= "       moneda_simbolo, ";    
    $var1 .= "       id_ubicacion, ";
    $var1 .= "       ubicacion_nombre, ";
    $var1 .= "       id_estado, ";
    $var1 .= "       estado_nombre, ";
    $var1 .= "       id_mandante, ";
    $var1 .= "       mandante_nombre, ";
    $var1 .= "       id_empresa, ";
    $var1 .= "       id_proyectos, ";
    $var1 .= "       proyecto_nombre ";
    $var1 .= "FROM   sigp.dbo.vista_subproyectos ";

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


if ($_POST['funcion'] == "ListarSubProyectosPorProyecto") {
    //echo "ListarUsuarios";

    $sql = "SELECT sp.id , ";
    $sql .= "       sp.nombre , ";
    $sql .= "       sp.fecha_inicio , ";
    $sql .= "       sp.fecha_termino , ";
    $sql .= "       sp.monto , ";
    $sql .= "       sp.id_moneda , ";
    $sql .= "       sp.id_proyectos , ";
    $sql .= "       sp.id_ubicacion , ";
    $sql .= "       sp.id_estados , ";
    $sql .= "       sp.id_mandante , ";
    $sql .= "       sp.id_empresas , ";
    $sql .= "       p.nombre  ";
    $sql .= "FROM sigp.dbo.subproyectos sp ";
    $sql .= "INNER JOIN sigp.dbo.proyectos p ON p.id = sp.id_proyectos WHERE p.id = " . $_POST["idproyecto"];

    $a = get_datos_sigp($sql);

    $objeto = "[";
    $con_datos = 0;
    while (odbc_fetch_row($a)) {
        $objeto .= "{";
        $objeto .= "'id':'" . odbc_result($a, "id") . "',";
        $objeto .= "'nombre':'" . odbc_result($a, "nombre") . "'";
        $objeto .= "},";

        $con_datos = 1;
    }
    if ($con_datos == 1)
        $objeto = substr($objeto, 0, -1);
    $objeto .= "]";

    echo $objeto;
}

if ($_POST['funcion'] == "GrabarNuevo") {

    $var1 = "";
    $var1 .= "INSERT INTO sigp.dbo.subproyectos ";
    $var1 .= "            (nombre, ";
    $var1 .= "             fecha_inicio, ";
    $var1 .= "             fecha_termino, ";
    $var1 .= "             monto, ";
    $var1 .= "             id_moneda, ";
    $var1 .= "             id_proyectos, ";
    $var1 .= "             id_ubicacion, ";
    $var1 .= "             id_estados, ";
    $var1 .= "             id_mandante, ";
    $var1 .= "             id_empresas) ";
    $var1 .= "VALUES      ('$_POST[nombre]', ";
    $var1 .= "             '$_POST[fechainicio]', ";
    $var1 .= "             '$_POST[fechafinal]', ";
    $var1 .= "             '$_POST[monto]', ";
    $var1 .= "             '$_POST[idmoneda]', ";
    $var1 .= "             '$_POST[idproyecto]', ";
    $var1 .= "             '$_POST[idubicacion]', ";
    $var1 .= "             '$_POST[idestado]', ";
    $var1 .= "             '$_POST[idmandante]', ";
    $var1 .= "             '$_POST[idempresa]' ) " ;

    $a = get_datos_sigp($var1);
    $cns = "SELECT @@IDENTITY AS ID";
    $b = get_datos_sigp($cns);
    while (odbc_fetch_row($b)) {
        $ultimo_id = odbc_result($b, "ID");
    }
    echo $ultimo_id;
}

if ($_POST['funcion'] == "GrabarSubProyecto") {

    $var1 = "UPDATE sigp.dbo.subproyectos SET  "; 
    $var1 .= "             nombre = '" . $_POST['nombre'] . "',"; 
    $var1 .= "             fecha_inicio = '" . $_POST['fechainicio'] . "',"; 
    $var1 .= "             fecha_termino = '" . $_POST['fechafinal'] . "',"; 
    $var1 .= "             monto = '" . $_POST['monto'] . "',"; 
    $var1 .= "             id_moneda = '" . $_POST['idmoneda'] . "',"; 
    $var1 .= "             id_proyectos = '" . $_POST['idproyecto'] . "',";
    $var1 .= "             id_ubicacion = '" . $_POST['idubicacion'] . "',";
    $var1 .= "             id_estados = '" . $_POST['idestado'] . "',";
    $var1 .= "             id_mandante = '" . $_POST['idmandante'] . "',";
    $var1 .= "             id_empresas = '" . $_POST['idempresa'] . "' ";
    $var1 .= " WHERE id = " . $_POST['id'];

    $a = get_datos_sigp($var1);
    //$a = 1;
    if ($a === true)
        $respuesta = -1;
    else
        $respuesta = 1;

    echo $respuesta;
}

?>
