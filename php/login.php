<?php
	include("funciones.php");
    $bbdd = 'randomflights'; 
    $conexion = conexion($bbdd);

    //RECOGER VARIABLES
    $user = $_POST['user'];
    $passwd = $_POST['passwd'];
    
	$consulta = mysql_query("SELECT * FROM registro WHERE nombre='$user' AND password='$passwd'",$conexion);
    while($fila = mysql_fetch_array($consulta)) {
        if($fila == 0) 
            echo "false";
        else 
            echo "true";
    }

    mysql_close($conexion);

?>