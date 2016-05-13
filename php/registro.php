<?php
	include("funciones.php");
    $bbdd = 'randomflights'; 
    $conexion = conexion($bbdd);

    //RECOGER VARIABLES
    
    $usuarioReg = $_POST['usuarioReg'];
    $passwdReg = $_POST['passwdReg'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fechaNac = $_POST['fechaNac'];

    //INSERCION DE DATOS
    $consulta = mysql_query("INSERT INTO registro (nombre, password, email, telefono, fechaNac) VALUES('$usuarioReg','$passwdReg','$email','$telefono','$fechaNac');",$conexion) or die('No se ha podido realizar la consulta');

    if($consulta)
        echo "True";
    else
        echo "False";

    mysql_close($conexion);

?>
