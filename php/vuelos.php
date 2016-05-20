<?php
	
	
 	include("funciones.php");
    $bbdd = 'bd_viajes'; 
    $conexion = conexion($bbdd);

    $origen = $_POST['origen'];
    $pvp = $_POST['pvp'];

    $vuelos = array();
    $k=0;
    $i=0;

    //Para los viajes de ida
    $consulta = mysql_query("SELECT * FROM vuelos WHERE origen='$origen' AND precio BETWEEN '0' AND '$pvp' ORDER BY precio ASC",$conexion);
    echo "<table class='vuelos'>
            <tr class='trDatos'>
                <td>Cia</td>
                <td>Origen</td>
                <td>Salida</td>
                <td>Destino</td>
                <td>Precio</td>
            </tr>";
    while($fila = mysql_fetch_array($consulta)) {
        if($fila == 0) {
            echo "<h3>No hay vuelos disponibles</h3>.";
            mysql_close($conexion);
        } else {
        	$vuelos = array_merge($vuelos, array("vuelo_$k"=>$fila['cia']." ".$fila['origen']." ".$fila['salida']." ".$fila['destino']." ".$fila['precio']));
            $k++;
        }
    }
    echo "<tr>
    		<td colspan='5'>".$vuelos['vuelo_0']."</td>
    	  </tr>
    	  <tr>
    	  	<td colspan='5'><button type='button' name='otrovuelo' id='otrovuelo' value='0' class='btn btn-default'>Quiero otro!</button></td>
    	  </tr>
    	</table>";
?>