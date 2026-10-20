<?php
include("conexion.php");
    $conexion=conectar();

    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['ap'];
    $apellidoMaterno = $_POST['am'];
    $edad = $_POST['edad'];


    $sql="INSERT INTO alumno (matricula, nombre, apellido_p, apellido_m, edad) VALUES ('$matricula', '$nombre', '$apellidoPaterno', '$apellidoMaterno', $edad)";

    $query=mysqli_query($conexion,$sql);
    if($query)
        {
            header("Location: alumnos.php");
        }
    else
        {
            echo "Error al insertar el registro: " . mysqli_error($conexion);
        }
?>