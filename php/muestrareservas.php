<?php
    header("Content-Type: text/html;charset=utf-8");
	include("funciones.php");
    $bbdd = 'randomflights'; 
    $conexion = conexion($bbdd);
    mysql_query("SET NAMES 'utf8'");

    $user = $_POST['user'];
    $hoy = date('Y-m-d');
    $con = 0;
    $consulta = mysql_query("SELECT * FROM reservas WHERE email_user='$user' AND salida>='$hoy'",$conexion);
    echo "<div class='row'>";
    while($fila = mysql_fetch_array($consulta)) {
        if($fila == 0) {
            echo "<h3>No hay vuelos disponibles</h3>.";
            mysql_close($conexion);
        } else {
        	
        	$ida = $fila['vuelo_ida'];
        	$vuelta = $fila['vuelo_vuelta'];
        	$hotel = $fila['hotel'];
        	$pvp_final = $fila['pvp_final'];
        	$email_user = $fila['email_user'];
            $fecha_salida = $fila['salida'];
            $fecha_llegada = $fila['llegada'];
            $hora_llegada = $fila['hora_llegada'];
            $hora_salida = $fila['hora_salida'];
            $con++;

            if ($con<4){
                echo "
              <div class='col-md-4'>dsadsad</div>
                ";
            }else{
                echo "</div><div class='row'><div class='col-md-4'>dsdsada</div>";
                $con=1;
            }
            

        }
    }
    echo "</div>"

    
?>