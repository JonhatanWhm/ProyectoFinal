<?php
require "data/basedatos.php";
$sql = "SELECT * FROM doctores";
$resultado = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista de enfermos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
        crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Listado de Doctores</h1>
        <a href="nuevos_doctores.php" class="btn btn-secondary">Nuevo</a>
        <tr>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Telefono</th>
                    <th>GmailI</th>
                    <th>direccion</th>
                    <th>Estado Civil</th>
                    <th>especialidad</th>
                    <th>horario</th>
                    <th>sueldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($doctores = $resultado->fetch_assoc()):
                ?>
                       <tr>
                        <td><?php echo $doctores['id'] ?></td>
                        <td><?php echo $doctores['nombre'] ?></td>
                        <td><?php echo $doctores['apellido'] ?></td>
                        <td><?php echo $doctores['edad'] ?></td>
                        <td><?php echo $doctores['telefono'] ?></td>
                        <td><?php echo $doctores['gmail'] ?></td>
                        <td><?php echo $doctores['direccion'] ?></td>
                        <td><?php echo $doctores['estadocivil'] ?></td>
                        <td><?php echo $doctores['especialidad'] ?></td>
                        <td><?php echo $doctores['horario'] ?></td>
                        <td><?php echo $doctores['sueldo'] ?></td>
                        <td>
                        <a href="editar_doctores.php?id=<?php echo $doctores['id'] ?>" class="btn btn-primary">Editar</a> 
                        <a href="eliminar_doctores.php?id=<?php echo $doctores['id'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                        </tr>
                <?php
                    endwhile;
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>