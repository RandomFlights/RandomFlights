<?php
	include("funciones.php");
    $bbdd = 'randomflights'; 
    $conexion = conexion($bbdd);

    $ida = $_POST['ida'];
    $vuelta = $_POST['vuelta'];
    $hotel = $_POST['hotel'];
    $pvp_final = $_POST['pvp_final'];
    $user = $_POST['user'];

      $consulta = mysql_query("INSERT INTO reservas(vuelo_ida,vuelo_vuelta,hotel,pvp_final,email_user) VALUES
    ('$ida', '$vuelta', '$hotel', '$pvp_final', '$user')",$conexion) or die("Fallo al isertar");

        if(!$consulta) 
            echo "false";
        else 
            echo "true"; 


	mysql_close($conexion);
?>