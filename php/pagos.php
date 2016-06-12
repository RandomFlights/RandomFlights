<?php
	header("Content-Type: text/html;charset=utf-8");
	include("funciones.php");
    $bbdd = 'randomflights'; 
    $conexion = conexion($bbdd);
    mysql_query("SET NAMES 'utf8'");

    $destino = @$_POST['destino'];
    $ida = @$_POST['ida'];
    $vuelta = @$_POST['vuelta'];
    $hotel = @$_POST['hotel'];
    $direccion_hotel = @$_POST['direccion_hotel'];
    $pvp_final = @$_POST['pvp_final'];
    $fecha_salida = @$_POST['fecha_salida'];
    $fecha_vuelta = @$_POST['fecha_vuelta'];
    $salida_ida = @$_POST['salida_ida'];
    $salida_vuelta = @$_POST['salida_vuelta'];
    $user = @$_POST['user'];
    $id = @$_POST['id'];
    
    if($id=="") {
    	$reserva = mysql_query("SELECT id FROM reservas WHERE destino='$destino' AND vuelo_ida='$ida' AND vuelo_vuelta='$vuelta' AND 
    	hotel='$hotel' AND direccion_hotel='$direccion_hotel' AND pvp_final='$pvp_final' AND salida='$fecha_salida' 
    	AND llegada='$fecha_vuelta' AND hora_salida='$salida_ida' AND hora_llegada='$salida_vuelta' 
    	AND email_user='$user'",$conexion);
		while($fila = mysql_fetch_array($reserva)) {
			$num = $fila['id'];
		}
        $num = $fila['id'];
    	$consulta = mysql_query("UPDATE reservas SET pagado='Si' WHERE id='$num'",$conexion);
    	if($consulta)
    		echo "Si";
    	else
    		echo "No";
    } else {
    	$consulta = mysql_query("UPDATE reservas SET pagado='Si' WHERE id='$id'",$conexion);
    	if($consulta)
    		echo "Si";
    	else
    		echo "No";
    }


?>