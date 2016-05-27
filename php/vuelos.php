<?php
	
	
 	include("funciones.php");
    $bbdd = 'randomflights'; 
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
            	array_push($vuelos_ida, $fila['cia']." ".$fila['origen']." ".$fila['destino']." ".$fila['fecha']." ".$fila['salida']." ".$fila['precio']." ".$fila['imagen']." ".$fila['id_vuelo']);
            }
        }
        
        $ale = rand(0,count($vuelos_ida)-1);
// echo $ale."Ale de ida</br>";

        $elegido = $vuelos_ida[$ale];
        

        $fila_ida = explode(" ",$elegido);
        $pvp_ida = $fila_ida[5]; 
        $imagen_ida = $fila_ida[6]; 
        $id_ida = $fila_ida[7]; 
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
                array_push($vuelos_vuelta, $fila['cia']." ".$fila['origen']." ".$fila['destino']." ".$fila['fecha']." ".$fila['salida']." ".$fila['precio']." ".$fila['imagen']." ".$fila['id_vuelo']);
                
            }
        }
        
        $ale = rand(0,count($vuelos_vuelta)-1);
// echo $ale."Ale de vuelta</br>";

        $elegido = $vuelos_vuelta[$ale];
        

        $fila_vuelta = explode(" ",$elegido);
        $pvp_vuelta = $fila_vuelta[5]; 
        $imagen_vuelta = $fila_vuelta[6];
        $id_vuelta = $fila_vuelta[7];
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
                array_push($hoteles, $fila['nombre']." ".$fila['ciudad']." ".$fila['direccion']." ".$fila['precio']." ".$fila['imagen']." ".$fila['id']);
            }
        }


        $ale = rand(0,count($hoteles)-1);
// echo count($hoteles)."cuenta de hoteles que encuentra<br>";
// echo $ale."aleatorio de hoteles<br>";
// echo print_r($hoteles);
        $hotel = $hoteles[$ale];
// echo $hotel."</br>";
        $fila_habitacion = explode(" ",$hotel);
        $habitacion = $fila_habitacion[3];
        $imagen_hotel = $fila_habitacion[4];
        $nombre_hotel = $fila_habitacion[0];
        $direccion_hotel = $fila_habitacion[2];
        $id_hotel = $fila_habitacion[5];
// echo $habitacion."pvp habitacion</br>";
        $pvp_habitacion = $habitacion * $dias;
// echo $dias."dias </br>";
// echo $pvp_habitacion."precio de habitacion por los dias que se  quede</br>";

        //precio final del paquete
        $pvp_final = $pvp_ida + $pvp_vuelta + $pvp_habitacion;


        echo "
            <div class='row'>
              <div class='col-md-12'>Imagen del destino</div>
            </div>
            <div class='row'>
              <div class='col-md-10'>Vuelo ida</div><div class='col-md-2'>".$imagen_ida."</div>
            </div>
            <div class='row'>
              <div class='col-md-10'>".$nombre_hotel."</br>".$direccion_hotel."</div><div class='col-md-2'>".$imagen_hotel."</div>
            </div>
            <div class='row'>
              <div class='col-md-10'>Vuelo vuelta</div><div class='col-md-2'>".$imagen_vuelta."</div>
            </div>
            <div class='row'>
              <div class='col-md-10'><button type='button' id='reserva' onclick='reservar()' class='btn btn-success btn-lg'>Resérvalo ya!</button></div><div class='col-md-2'>".$pvp_final."</div>
            </div>
            <input type='hidden' id='ida' name='ida' value='".$id_ida."'>
            <input type='hidden' id='vuelta' name='vuelta' value='".$id_vuelta."'>
            <input type='hidden' id='hotel' name='hotel' value='".$id_hotel."'>
            <input type='hidden' id='pvp_final' name='pvp_final' value='".$pvp_final."'>
        ";

?>