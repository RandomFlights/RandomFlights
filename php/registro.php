<?php
	include("funciones.php");
    $bbdd = 'RandomFlights'; 
    $conexion = conexion($bbdd);

    //RECOGER VARIABLES
    if(isset($_POST['usuarioReg']) && isset($_POST['passwdReg']) && isset($_POST['email']) && isset($_POST['telefono']) && isset($_POST['fechaNac'])) {
        $usuarioReg = $_POST['usuarioReg'];
        $passwdReg = $_POST['passwdReg'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $fechaNac = $_POST['fechaNac'];

        //INSERCION DE DATOS
        $consulta = mysql_query("INSERT INTO registro VALUES('$usuarioReg','$passwdReg','$email','$telefono','$fechaNac');",$conexion);

        mysql_query("COMMIT;",$conexion);

        if(!$consulta) 
            echo "false";
        else 
            echo "true"; 

    } else
        echo "false";

    mysql_close($conexion);

?>
