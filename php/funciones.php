<?php
    function conexion($bbdd) {
        $conexion = mysql_connect('localhost', 'root', '')or die("Problemas con la conexion");
        mysql_select_db($bbdd) or die('No se pudo seleccionar la base de datos');
        return $conexion;
    }
?>