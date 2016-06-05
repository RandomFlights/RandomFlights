<?php
	include("funciones.php");
    $bbdd = 'randomflights'; 
    $conexion = conexion($bbdd);

    $ida = $_POST['ida'];
    $vuelta = $_POST['vuelta'];
    $hotel = $_POST['hotel'];
    $direccion_hotel = $_POST['direccion_hotel'];
    $pvp_final = $_POST['pvp_final'];
    $fecha_salida = $_POST['fecha_salida'];
    $fecha_vuelta = $_POST['fecha_vuelta'];
    $salida_ida = $_POST['salida_ida'];
    $salida_vuelta = $_POST['salida_vuelta'];
    $user = $_POST['user'];

      $consulta = mysql_query("INSERT INTO reservas(vuelo_ida,vuelo_vuelta,hotel,direccion_hotel,pvp_final,email_user,salida,llegada,hora_salida,hora_llegada,pagado) VALUES
    ('$ida', '$vuelta', '$hotel', '$direccion_hotel', '$pvp_final', '$user', '$fecha_salida', '$fecha_vuelta', '$salida_ida', '$salida_vuelta', 'No')",$conexion) or die("Fallo al isertar");

        if(!$consulta) 
            echo "false";
        else 
            echo "true"; 


	mysql_close($conexion);
?>