<?php
	include("funciones.php");
    $bbdd = 'randomflights'; 
    $conexion = conexion($bbdd);


    $consulta = mysql_query("SELECT * FROM reservas",$conexion);
    while($fila = mysql_fetch_array($consulta)) {
        if($fila == 0) {
            echo "<h3>No hay vuelos disponibles</h3>.";
            mysql_close($conexion);
        } else {
        	$id_reserva = $fila['id'];
        	$id_ida = $fila['vuelo_ida'];
        	$id_vuelta = $fila['vuelo_vuelta'];
        	$id_hotel = $fila['hotel'];
        	$pvp_final = $fila['pvp_final'];
        	$email_user = $fila['email_user'];
        }
    }

    //Para el vuelo de ida
    $consulta = mysql_query("SELECT * FROM vuelos WHERE id_vuelo='$id_ida'",$conexion);
    $fila = mysql_fetch_array($consulta);
    echo "<h3>Tu vuelo para la ida es:</h3>
    <p>Vuelo: ".$fila['cia']." con origen en ".$fila['origen']." para el dia ".$fila['fecha']." a las ".$fila['salida']." con un precio de ".$fila['precio']."</p>";
    //Para el vuelo de vuelta
    $consulta = mysql_query("SELECT * FROM vuelos WHERE id_vuelo='$id_vuelta'",$conexion);
    $fila = mysql_fetch_array($consulta);
    echo "<h3>Tu vuelo para la vuelta es:</h3>
    <p>Vuelo: ".$fila['cia']." con origen en ".$fila['origen']." para el dia ".$fila['fecha']." a las ".$fila['salida']." con un precio de ".$fila['precio']."</p>";
    //Para el hotel
    $consulta = mysql_query("SELECT * FROM hoteles WHERE id='$id_hotel'",$conexion);
    $fila = mysql_fetch_array($consulta);
    echo "<h3>Tu hotel:</h3>
    <p>Hotel: ".$fila['nombre']." en ".$fila['ciudad']." direccion ".$fila['direccion']."</p>";

    echo "<h1>Precio final $pvp_final</h1>";
?>