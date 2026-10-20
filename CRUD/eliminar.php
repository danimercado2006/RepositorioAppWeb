<?php
    include("conexion.php");
    $conexion = conectar();

    $id = $_GET['id'];

    $sql = "DELETE FROM alumno WHERE id = $id";
    $query = mysqli_query($conexion, $sql);

    if ($query) {
        header("Location: alumnos.php");
    } else {
        echo "Error al eliminar" . mysqli_error($conexion);
    }
?>