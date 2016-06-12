<?php

    header("Content-Type: text/html;charset=utf-8");
	include("funciones.php");
    $bbdd = 'randomflights'; 
    $conexion = conexion($bbdd);
    mysql_query("SET NAMES 'utf8'");

    $user = $_POST['user'];
    if($user == "")
        echo "<h3>Tienes que iniciar sesión para ver tus reservas. <a href='./login.html'>Inicia sesión.</a></h3>.";
    else {
        $hoy = date('Y-m-d');
        $con = 0;
        $consulta = mysql_query("SELECT * FROM reservas WHERE email_user='$user'",$conexion);
        echo "<div class='row'>";

        if(mysql_num_rows($consulta) == 0) {
            echo "<h3>Aún no has reservado nada. ¡Date prisa! Empieza tu aventura <a href='../index.html'>aquí.</a></h3>.";
            mysql_close($conexion);
        } else {
            while($fila = mysql_fetch_array($consulta)) {
            	$id = $fila['id'];
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
                        echo "<div class='reserva centered'>";
                    else 
                        echo "<div class='bordeorange reserva centered'>";
                               
                          echo "<i onclick='borrarReserva(".$id.")' class='fa fa-trash-o fa-2x' aria-hidden='true'></i>
                          <h1 class='kglifeSimple'>".$destino."</h1>
                                <h2 class='orange'>".$pvp_final." €</h2>
                                <a href='#' onclick='masInfo(".$id.")' class='enlace'>Más información </a> ";

                                if($pagado == "No") 
                                    echo " <i class='fa fa-exclamation-triangle fa-2x' aria-hidden='true'></i>";

                                echo "<div id='masinfo_".$id."' class='centered oculto masinfo'>
                                    <p><i class='fa fa-plane' aria-hidden='true'></i> Salida: ".$ida."</p>
                                    <p><i class='fa fa-calendar' aria-hidden='true'></i> ".$fecha_salida." <i class='fa fa-clock-o' aria-hidden='true'></i> ".$hora_salida."</p>
                                    
                                    <p><i class='fa fa-plane' aria-hidden='true'></i> Llegada: ".$vuelta."</p>
                                    <p><i class='fa fa-calendar' aria-hidden='true'></i> ".$fecha_llegada." <i class='fa fa-clock-o' aria-hidden='true'></i> ".$hora_llegada."</p>
                                    <hr>
                                    <p><i class='fa fa-home' aria-hidden='true'></i> ".$hotel."</p>
                                    <p><i class='fa fa-building-o' aria-hidden='true'></i> ".$direccion_hotel."</p>
                                    <hr>";
                                    if($pagado == "No") 
                                        echo "<a href='pago.html' target='blank'><button type='button' onclick='sesionID(".$id.")' class='btn btn-warning'>Comprar <i class='fa fa-credit-card' aria-hidden='true'></i></button></a>";
                            echo "</div>
                              </div>
                          </div>";

                }else{
                    echo "</div><div class='row'>
                            <div class='col-md-4'>";
                    if($pagado == "Si") 
                        echo "<div class='reserva centered'>";
                    else 
                        echo "<div class='bordeorange reserva centered'>";
                               
                          echo "<i onclick='borrarReserva(".$id.")' class='fa fa-trash-o fa-2x' aria-hidden='true'></i>
                          <h1 class='kglifeSimple'>".$destino."</h1>
                                <h2 class='orange'>".$pvp_final." €</h2>
                                <a href='#' onclick='masInfo(".$id.")' class='enlace'>Más información </a> ";

                                if($pagado == "No") 
                                    echo " <i class='fa fa-exclamation-triangle fa-2x' aria-hidden='true'></i>";

                                echo "<div id='masinfo_".$id."' class='centered oculto masinfo'>
                                    <p><i class='fa fa-plane' aria-hidden='true'></i> Salida: ".$ida."</p>
                                    <p><i class='fa fa-calendar' aria-hidden='true'></i> ".$fecha_salida." <i class='fa fa-clock-o' aria-hidden='true'></i> ".$hora_salida."</p>
                                    
                                    <p><i class='fa fa-plane' aria-hidden='true'></i> Llegada: ".$vuelta."</p>
                                    <p><i class='fa fa-calendar' aria-hidden='true'></i> ".$fecha_llegada." <i class='fa fa-clock-o' aria-hidden='true'></i> ".$hora_llegada."</p>
                                    <hr>
                                    <p><i class='fa fa-home' aria-hidden='true'></i> ".$hotel."</p>
                                    <p><i class='fa fa-building-o' aria-hidden='true'></i> ".$direccion_hotel."</p>
                                    <hr>";
                                    if($pagado == "No") 
                                        echo "<a href='pago.html' target='blank'><button type='button' onclick='sesionID(".$id.")' class='btn btn-warning'>Comprar <i class='fa fa-credit-card' aria-hidden='true'></i></button></a>";
                            echo "</div>
                              </div>
                          </div>";
                    $con=1;

                }
                

            }
        }
        echo "</div>
        <div class='row'>
          <div id='RESULTADOCOMPRA'></div>
        </div>";
    } //Fin del else de comprobacion de usuario==""

    
?>