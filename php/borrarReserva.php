<?php

    header("Content-Type: text/html;charset=utf-8");
	include("funciones.php");
    $bbdd = 'randomflights'; 
    $conexion = conexion($bbdd);
    mysql_query("SET NAMES 'utf8'");

     $id = @$_POST['id'];
    $borrado = mysql_query("DELETE FROM reservas WHERE id='$id'",$conexion);


   ?>



