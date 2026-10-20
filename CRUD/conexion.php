<?php
    function conectar()
    {
        /*Información de la base de datos*/
        $host="localhost";
        $user="root";
        $password="";
        $db="aw221";
        /*Conexion a la base de datos*/

        $conexion=mysqli_connect($host,$user,$password);
        mysqli_select_db($conexion,$db);
        return $conexion;



    }


?>