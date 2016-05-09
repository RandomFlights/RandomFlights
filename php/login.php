<?php
	include("funciones.php");
    $bbdd = 'RandomFlights'; 
    $conexion = conexion($bbdd);

    //RECOGER VARIABLES
    $usuario = $_REQUEST['usuario'];
    $passwd = $_REQUEST['passwd'];
    
	$consulta = mysql_query("SELECT * FROM registro WHERE usuario='$usuario' AND passwd='$passwd'",$conexion);
    while($fila = mysql_fetch_array($consulta)) {
        if($fila == 0) 
            echo "false";
        else 
            echo "true";
    }

    mysql_close($conexion);

?>