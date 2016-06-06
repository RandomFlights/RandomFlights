<?php

    header("Content-Type: text/html;charset=utf-8");
	include("funciones.php");
    $bbdd = 'randomflights'; 
    $conexion = conexion($bbdd);
    mysql_query("SET NAMES 'utf8'");

    $user = $_POST['user'];
    $hoy = date('Y-m-d');
    $con = 0;
    $id = 0;
    $consulta = mysql_query("SELECT * FROM reservas WHERE email_user='$user' AND salida>='$hoy'",$conexion);
    echo "<div class='row'>";
    while($fila = mysql_fetch_array($consulta)) {
        if($fila == 0) {
            echo "<h3>No hay reservas disponibles</h3>.";
            mysql_close($conexion);
        } else {
        	
            $ida = $fila['vuelo_ida'];
        	$vuelta = $fila['vuelo_vuelta'];
            $destino = $fila['destino'];
            $hotel = $fila['hotel'];
        	$direccion_hotel = $fila['direccion_hotel'];
        	$pvp_final = $fila['pvp_final'];
        	$email_user = $fila['email_user'];
            $fecha_salida = $fila['salida'];
            $fecha_llegada = $fila['llegada'];
            $hora_salida = $fila['hora_salida'];
            $hora_llegada = $fila['hora_llegada'];
            $pagado = $fila['pagado'];
            $con++;
            

            if ($con<4){
                echo "<div class='col-md-4'>";
                if($pagado == "Si") 
                    echo "<div class='green reserva centered'>";
                else 
                    echo "<div class='red reserva centered'>";
                           
                      echo "<h1>".$destino."</h1>
                            <h2>".$pvp_final." €</h2>
                            <a href='#' onclick='masInfo(".$id.")'>Más información</a>
                            <div id='masinfo_".$id."' class='centered oculto'>
                                <p><i class='fa fa-plane' aria-hidden='true'></i> Ida: ".$ida."</p>
                                <p><i class='fa fa-plane' aria-hidden='true'></i> Vuelta: ".$vuelta."</p>
                                <p><i class='fa fa-home' aria-hidden='true'></i> ".$hotel."</p>
                                <p><i class='fa fa-building-o' aria-hidden='true'></i> ".$direccion_hotel."</p>
                                <p><i class='fa fa-calendar' aria-hidden='true'></i> ".$fecha_salida." <i class='fa fa-clock-o' aria-hidden='true'></i> ".$hora_salida."</h4></p>
                                <p><i class='fa fa-calendar' aria-hidden='true'></i> ".$fecha_llegada." <i class='fa fa-clock-o' aria-hidden='true'></i> ".$hora_llegada."</h4></p>
                                <p><i class='fa fa-credit-card' aria-hidden='true'></i> ¿Pagado?".$pagado."</p>
                            </div>
                          </div>
                      </div>";
                      $id++;
            }else{
                echo "</div><div class='row'>
                        <div class='col-md-4'>";
                if($pagado == "Si") 
                    echo "<div class='green reserva centered'>";
                else 
                    echo "<div class='red reserva centered'>";

                      echo "<h1>".$destino."</h1>
                            <h2>".$pvp_final." €</h2>
                           <a href='#' onclick='masInfo(".$id.")'>Más información</a>
                            <div id='masinfo_".$id."' class='centered oculto'>
                                <p><i class='fa fa-plane' aria-hidden='true'></i> Ida: ".$ida."</p>
                                <p><i class='fa fa-plane' aria-hidden='true'></i> Vuelta: ".$vuelta."</p>
                                <p><i class='fa fa-home' aria-hidden='true'></i> ".$hotel."</p>
                                <p><i class='fa fa-building-o' aria-hidden='true'></i> ".$direccion_hotel."</p>
                                <p><i class='fa fa-calendar' aria-hidden='true'></i> ".$fecha_salida." <i class='fa fa-clock-o' aria-hidden='true'></i> ".$hora_salida."</h4></p>
                                <p><i class='fa fa-calendar' aria-hidden='true'></i> ".$fecha_llegada." <i class='fa fa-clock-o' aria-hidden='true'></i> ".$hora_llegada."</h4></p>
                                <p><i class='fa fa-credit-card' aria-hidden='true'></i> ¿Pagado?".$pagado."</p>
                            </div>

                          </div>
                        </div>";
                $con=1;
                $id++;
            }
            

        }
    }
    echo "</div>"

    
?>