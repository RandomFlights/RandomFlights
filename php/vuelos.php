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
        
//recogida de datos del vuelo de ida elegido
        $fila_ida = explode(" ",$elegido);
        $compania_ida = $fila_ida[0];
        $destino = $fila_ida[2];
        $salida_ida = $fila_ida[4];
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
        
//recogida de datos para el vuelo de vuelta elegido
        $fila_vuelta = explode(" ",$elegido);
        $compania_vuelta = $fila_vuelta[0];
        $salida_vuelta = $fila_vuelta[4];
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
        $nombre_hotel = $fila_habitacion[0];
        $ciudad_hotel = $fila_habitacion[1];
        $direccion_hotel = $fila_habitacion[2];
        $habitacion = $fila_habitacion[3];
        $imagen_hotel = $fila_habitacion[4];
        $id_hotel = $fila_habitacion[5];
// echo $habitacion."pvp habitacion</br>";
        $pvp_habitacion = $habitacion * $dias;
// echo $dias."dias </br>";
// echo $pvp_habitacion."precio de habitacion por los dias que se  quede</br>";

        //precio final del paquete
        $pvp_final = $pvp_ida + $pvp_vuelta + $pvp_habitacion;

        $fotoDestino = "";
        switch ($destino) {
            case "Barcelona":
                $fotoDestino = "./media/img/destinos/Barcelona.png";
                break;
            case "Berlin":
                $fotoDestino = "./media/img/destinos/Berlin.png";
                break;
            case "Londres":
                $fotoDestino = "./media/img/destinos/Londres.png";
                break;
            case "Madrid":
                $fotoDestino = "./media/img/destinos/Madrid.png";
                break;
            case "Paris":
                $fotoDestino = "./media/img/destinos/Paris.png";
                break;
        }


        echo "
            <div class='row'>
              <div class='col-md-12'><img src='".$fotoDestino."' alt='fotoDestino' class='imagenDestino'></div>
            </div>

            <div class='row'>
              <div class='col-md-9 anchoResVuelos'>
                <p>Pones rumbo a <span class='bolditalic'>".$destino."</span> con <span class='bolditalic'>".$compania_ida."</span></p>
                <p></p>
              </div>
              <div class='col-md-1'></div>
              <div class='col-md-2 bordeNaranja anchoResVuelos'><img src='".$imagen_ida."' alt='imagen_ida' class='imgResultVuelos'></div>
            </div>

            <div class='row'>
              <div class='col-md-9 anchoResVuelos'>
                <p>Tu estancia será en <span class='bolditalic'>".$nombre_hotel."</span></br>".$direccion_hotel."</p>
                <p></p>
              </div>
              <div class='col-md-1'>
              </div><div class='col-md-2 bordeNaranja anchoResVuelos'>".$imagen_hotel."</div>
            </div>

            <div class='row'>
              <div class='col-md-9 anchoResVuelos'>
                <p>Te vuelves a <span class='bolditalic'>".$origen."</span> con <span class='bolditalic'>".$compania_vuelta."</span></p>
                <p></p>
              </div>
              <div class='col-md-1'></div>
              <div class='col-md-2 bordeNaranja anchoResVuelos'><img src='".$imagen_vuelta."' alt='imagen_vuelta' class='imgResultVuelos'></div>
            </div>

            <div class='row'>
              <div class='col-md-9 bordeNaranja'></div><div class='col-md-2'></div>
            </div>

            <div class='row'>
              <div class='col-md-8'><button type='button' id='reserva' onclick='reservar()' class='btn btn-success btn-lg'>Resérvalo ya!</button></div>
              <div class='col-md-2 pvpFinal'>".$pvp_final."</div><div class='col-md-2'></div>
            </div>
            <input type='hidden' id='ida' name='ida' value='".$id_ida."'>
            <input type='hidden' id='vuelta' name='vuelta' value='".$id_vuelta."'>
            <input type='hidden' id='hotel' name='hotel' value='".$id_hotel."'>
            <input type='hidden' id='pvp_final' name='pvp_final' value='".$pvp_final."'>
        ";

?>