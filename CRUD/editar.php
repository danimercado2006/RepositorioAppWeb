
<?php
include("conexion.php");
$conexion = conectar();

if (isset($_POST['actualizar'])) {

    $id = $_POST['id'];
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $ap = $_POST['ap'];
    $am = $_POST['am'];
    $edad = $_POST['edad'];

    $sql = "UPDATE alumno SET
            matricula='$matricula',
            nombre='$nombre',
            apellido_p='$ap',
            apellido_m='$am',
            edad=$edad
            WHERE id=$id";

    mysqli_query($conexion, $sql);

    header("Location: alumnos.php");
    exit();

}

$id = $_GET['id'] ?? $_POST['id'];

$sql = "SELECT * FROM alumno WHERE id=$id";
$query = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($query);
?>

<form action="editar.php" method="POST">

    <input type="hidden" name="id"
           value="<?php echo $row['id']; ?>">

    Matrícula:
    <input type="text" name="matricula"
           value="<?php echo $row['matricula']; ?>"><br>

    Nombre:
    <input type="text" name="nombre"
           value="<?php echo $row['nombre']; ?>"><br>

    Apellido paterno:
    <input type="text" name="ap"
           value="<?php echo $row['apellido_p']; ?>"><br>

    Apellido materno:
    <input type="text" name="am"
           value="<?php echo $row['apellido_m']; ?>"><br>

    Edad:
    <input type="number" name="edad"
           value="<?php echo $row['edad']; ?>"><br>

    <input type="submit" name="actualizar"
           value="Actualizar">

</form>
<style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            font-family: Arial, sans-serif;
            padding: 10px ;
            
        }
        h1
        {
            font-family: Arial, sans-serif;
        }
        form {
        margin-top: 50px;
        font-family: Arial, sans-serif;
        
       
        

        }   
        input[type="text"] {
            width: 100px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #dcdcdc;
            border-radius: 10px;
        }
        input[type="number"] {
            width: 100px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #dcdcdc;
            border-radius: 10px;
        }

    </style>