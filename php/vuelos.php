<?php
	
	
 	include("funciones.php");
    $bbdd = 'bd_viajes'; 
    $conexion = conexion($bbdd);

    $origen = $_POST['origen'];
    $pvp = $_POST['pvp'];
    $fecha_salida = $_POST['fecha_salida'];
    $fecha_vuelta = $_POST['fecha_vuelta'];
    $aventureros = $_POST['aventureros'];
    $otro = $_POST['otro'];
    $dias = $_POST['dias'];

    $vuelos_ida = array();
    $vuelos_vuelta = array();
    $hoteles = array();

    $ale = 0;

    $pvp_persona = $pvp / $aventureros;
    $pvp_paquete =  $pvp_persona / 3; //entre tres que seria el vuelo de ida el de vuelta y el hotel

    if($otro == 0) {    

        //Para los viajes de ida
        $consulta = mysql_query("SELECT * FROM vuelos WHERE origen='$origen' AND precio BETWEEN '0' AND '$pvp_paquete'",$conexion);
        while($fila = mysql_fetch_array($consulta)) {
            if($fila == 0) {
                echo "<h3>No hay vuelos disponibles</h3>.";
                mysql_close($conexion);
            } else {
            	array_push($vuelos_ida, $fila['cia']." ".$fila['origen']." ".$fila['destino']." ".$fila['fecha']." ".$fila['salida']." ".$fila['precio']." ".$fila['imagen']);
            }
        }
        
        $ale = rand(0,count($vuelos_ida)-1);
        echo $ale;

        $elegido = $vuelos_ida[$ale];
        

        $pvp_ida = explode(" ",$elegido);
        $pvp_ida = $pvp_ida[5]; 

        $resto = $pvp_persona - $pvp_ida; //es lo que nos quedaria despues de haber gastado en el vuelo
        $resto_paquete = $resto / 2; //entre dos que seria el vuelo de vuelta y el hotel


        //Para viajes de vuelta
        
        $vuelta = $fila['destino'];
        $consulta = mysql_query("SELECT * FROM vuelos WHERE origen='$vuelta' AND destino='$origen' AND precio BETWEEN '0' AND '$resto_paquete'",$conexion);
        while($fila = mysql_fetch_array($consulta)) {
            if($fila == 0) {
                echo "<h3>No hay vuelos disponibles</h3>.";
                mysql_close($conexion);
            } else {
                array_push($vuelos_vuelta, $fila['cia']." ".$fila['origen']." ".$fila['destino']." ".$fila['fecha']." ".$fila['salida']." ".$fila['precio']." ".$fila['imagen']);
                
            }
        }
        
        $ale = rand(0,count($vuelos_vuelta)-1);
        echo $ale;

        $elegido = $vuelos_vuelta[$ale];
        

        $pvp_vuelta = explode(" ",$elegido);
        $pvp_vuelta = $pvp_vuelta[5]; 

        $resto = $resto - $pvp_vuelta;

        $resto_habitacion = $resto / $dias;


        //Para hoteles
        $k=0;
        $consulta = mysql_query("SELECT * FROM hoteles WHERE ciudad='$destino' AND precio BETWEEN '0' AND '$resto_habitacion'",$conexion);
        while($fila = mysql_fetch_array($consulta)) {
            if($fila == 0) {
                echo "<h3>No hay vuelos disponibles</h3>.";
                mysql_close($conexion);
            } else {
                array_push($hoteles, $fila['nombre']." ".$fila['ciudad']." ".$fila['direccion']." ".$fila['precio']." ".$fila['imagen']);
                $k++;
            }
        }
        $k--;
        $ale = rand(0,$k);

        $hoteles[$ale];

        $pvp_habitacion = explode(" ",$hoteles);
        $pvp_habitacion = $pvp_vuelta[3];
        $pvp_habitacion = $pvp_habitacion + $dias;

        //precio final del paquete
        $pvp_final = $pvp_ida + $pvp_vuelta + $pvp_habitacion;

        echo "ida: ".$pvp_ida." vuelta: ".$pvp_vuelta." htel: ".$pvp_habitacion." final: ".$pvp_final;



    } else {

        $k=-1;
        $i=0;

        //Para los viajes de ida
        $consulta = mysql_query("SELECT * FROM vuelos WHERE origen='$origen' AND precio BETWEEN '0' AND '$pvp' ORDER BY precio ASC",$conexion);

        while($fila = mysql_fetch_array($consulta)) {
            if($fila == 0) {
                echo "<h3>No hay vuelos disponibles</h3>.";
                mysql_close($conexion);
            } else {
                array_push($vuelos, $fila['cia']." ".$fila['origen']." ".$fila['salida']." ".$fila['destino']." ".$fila['precio']);
                $k++;
            }
        }
        $ale = rand(0,$k);
        echo "<table class='vuelos'>
              <tr>
                <td colspan='5'>".$vuelos[$ale]."</td>
              </tr>
            </table>";


        //Para los viajes de vuelta
        $vuelta = $fila['destino'];
        $consulta = mysql_query("SELECT * FROM vuelos WHERE origen='$vuelta' AND destino='$origen' AND precio BETWEEN '0' AND '$pvp'",$conexion);
        while($fila = mysql_fetch_array($consulta)) {
            if($fila == 0) {
                echo "<h3>No hay vuelos disponibles</h3>.";
                mysql_close($conexion);
            } else {
                array_push($vuelos, $fila['cia']." ".$fila['origen']." ".$fila['salida']." ".$fila['destino']." ".$fila['precio']);
                $k++;
            }
        }
        $ale = rand(0,$k);
        echo "<table class='vuelos'>
              <tr>
                <td colspan='5'>".$vuelos[$ale]."</td>
              </tr>
            </table>";
    }
?>