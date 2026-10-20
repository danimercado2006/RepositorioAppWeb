<?php
    /*Incluir la informacion de archivo conexion.php*/
    include("conexion.php");
    $conexion=conectar();
    $sql="SELECT * FROM alumno";

    $query=mysqli_query($conexion,$sql);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>
<body>

    <h1 > Tabla Alumnos</h1>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
            <th>Acciones</th>
        </tr>   
        </thead>

        <tbody>
         <?php
         
            while($row=mysqli_fetch_array($query)){
                ?>
                <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellido_p']; ?></td>
                <td><?php echo $row['apellido_m']; ?></td>
                <td><?php echo $row['edad']; ?></td>
                <td>
                    <a href="eliminar.php?id=<?php echo $row['id']; ?>">
                    
                    Eliminar
                    </a>

                    <br>

                    <a href="editar.php?id=<?php echo $row['id']; ?>">
                    Editar
                    </a>
                </td>
            </tr>
            <?php
            }
         ?>
           
            
        </tbody>


        

    </table>
   
    <form action="insertar.php" method="post">
        Ingrese su matricula:
        <input type="text" name="matricula"  placeholder="Matricula"required>
        Ingrese su nombre:
        <input type="text" name="nombre" placeholder="Nombre" required> 
        Ingrese su apellido paterno:
        <input type="text" name="ap" placeholder="Apellido Paterno" required>  
        Ingrese su apellido materno:
        <input type="text" name="am" placeholder="Apellido Materno" required> 
        Ingrese su edad:
        <input type="text" name="edad" placeholder="Edad" required> 
        <input type="submit" value="Insertar">
        
    </form>
    
 

    


    
</body>
</html>