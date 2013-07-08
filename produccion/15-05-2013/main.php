<?php
session_start();
if(!isset($_SESSION['status']))
{
	header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta content="es-pe" http-equiv="Content-Language">
    <meta charset="utf-8">
    <title>Gardilcic :: SIGP Usuario: <?php echo $_SESSION['nombre'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
	<link rel="icon" type="image/png" href="libs/img/logo.png" />
    <link href="libs/css/bootstrap.css" rel="stylesheet">
    <link href="libs/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="libs/css/jquery.tablesorter.pager.css" rel="stylesheet">
    <link href="libs/css/theme.bootstrap.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="libs/js/html5shiv.js"></script>
    <![endif]-->	

  </head>

  <body>
	
	<?php include('libs/php/encabezado.php'); ?>
<br /><br /><br /><br />

<a href="adm_monedas.php">Administrar divisas.</a>
<br /><br />
<a href="adm_pais.php">Administrar paises.</a>
   
	
</body>
</html>