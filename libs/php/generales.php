<?php

function encoder($texto)
{
	return utf8_encode($texto);
}

function decoder($texto)
{
	return utf8_decode($texto);
}

function alert($texto)
{
	echo "<script type='text/javascript'>alert('".$texto."');</script>";
}


?>