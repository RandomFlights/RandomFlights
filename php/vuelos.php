<?php
	
	
 	include("funciones.php");
    $bbdd = 'bd_viajes'; 
    $conexion = conexion($bbdd);

    $origen = $_POST['origen'];
    $pvp = $_POST['pvp'];
// echo $pvp."pvpinicial</br>";
    $fecha_salida = $_POST['fecha_salida'];
    $fecha_vuelta = $_POST['fecha_vuelta'];
    $aventureros = $_POST['aventureros'];
    $dias = $_POST['dias'];

    $vuelos_ida = array();
    $vuelos_vuelta = array();
    $hoteles = array();

    $ale = 0;

    $pvp_persona = $pvp / $aventureros;
// echo $pvp_persona."pvp_persona por persona</br>";
    $pvp_paquete =  $pvp_persona / 3; //entre tres que seria el vuelo de ida el de vuelta y el hotel
// echo $pvp_paquete."pvp_paquete entre tres (ida vuelta hotel) para cada persona</br>";
        

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
// echo $ale."Ale de ida</br>";

        $elegido = $vuelos_ida[$ale];
        

        $pvp_ida = explode(" ",$elegido);
        $pvp_ida = $pvp_ida[5]; 
// echo $pvp_ida."pvp ida</br>";
        $resto = $pvp_persona - $pvp_ida; //es lo que nos quedaria despues de haber gastado en el vuelo
// echo $resto."resto: pvp_persona - la ida</br>";
        $resto_paquete = $resto / 2; //entre dos que seria el vuelo de vuelta y el hotel
// echo $resto_paquete."resto_paquete es el resto entre dos vuelta y hotel</br>";

        //Para viajes de vuelta
        $vuelta = explode(" ",$elegido); //Estabamos pillando el $fila['destino'], pero vete tu asaber de donde, pillaba el ultimo, no el elegido del random.
        $vuelta = $vuelta[2]; 

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
// echo $ale."Ale de vuelta</br>";

        $elegido = $vuelos_vuelta[$ale];
        

        $pvp_vuelta = explode(" ",$elegido);
        $pvp_vuelta = $pvp_vuelta[5]; 
// echo $pvp_vuelta."pvp vuelta</br>";
        $resto = $resto - $pvp_vuelta; 
// echo $resto."resto menos pvp vuelta</br>";
        $resto_habitacion = intval($resto / $dias);
// echo $resto_habitacion."resto_paquete entre dias da precio habitacion</br>";
// echo $vuelta."</br>";
        //Para hoteles
        $consulta = mysql_query("SELECT * FROM hoteles WHERE ciudad='$vuelta' AND precio BETWEEN '0' AND '$resto_habitacion'",$conexion);
        while($fila = mysql_fetch_array($consulta)) {
            if($fila == 0) {
                echo "<h3>No hay vuelos disponibles</h3>.";
                mysql_close($conexion);
            } else {
                array_push($hoteles, $fila['nombre']." ".$fila['ciudad']." ".$fila['direccion']." ".$fila['precio']." ".$fila['imagen']);
            }
        }


        $ale = rand(0,count($hoteles)-1);
// echo count($hoteles)."cuenta de hoteles que encuentra<br>";
// echo $ale."aleatorio de hoteles<br>";
// echo print_r($hoteles);
        $hotel = $hoteles[$ale];
// echo $hotel."</br>";
        $habitacion = explode(" ",$hotel);
        $habitacion = $habitacion[3];
// echo $habitacion."pvp habitacion</br>";
        $pvp_habitacion = $habitacion * $dias;
// echo $dias."dias </br>";
// echo $pvp_habitacion."precio de habitacion por los dias que se  quede</br>";

        //precio final del paquete
        $pvp_final = $pvp_ida + $pvp_vuelta + $pvp_habitacion;

        echo "ida: ".$pvp_ida." vuelta: ".$pvp_vuelta." h0tel: ".$pvp_habitacion." final: ".$pvp_final;



?>