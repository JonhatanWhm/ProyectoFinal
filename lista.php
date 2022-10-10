<?php
require "data/basedatos.php";
$sql = "SELECT * FROM listaenfermos";
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
        <h1>Listado de Pacientes</h1>
        <a href="nuevo_paciente.php" class="btn btn-secondary">Nuevo</a>
        <tr>
        <a href="clasificacion.php" class="btn btn-secondary">Clasificacion por Malestar</a>
        <tr> 
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Telefono</th>
                    <th>Num DNI</th>
                    <th>Tipo de problema</th>
                    <th>Nombre del problema</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($listaenfermos = $resultado->fetch_assoc()):
                ?>
                       <tr>
                        <td><?php echo $listaenfermos['id'] ?></td>
                        <td><?php echo $listaenfermos['nombre'] ?></td>
                        <td><?php echo $listaenfermos['apellido'] ?></td>
                        <td><?php echo $listaenfermos['edad'] ?></td>
                        <td><?php echo $listaenfermos['telefono'] ?></td>
                        <td><?php echo $listaenfermos['numero_dni'] ?></td>
                        <td><?php echo $listaenfermos['tipoproblema'] ?></td>
                        <td><?php echo $listaenfermos['nomproblema'] ?></td>
                        <td>
                        <a href="editar_paciente.php?id=<?php echo $listaenfermos['id'] ?>" class="btn btn-primary">Editar</a> 
                        <a href="eliminar.php?id=<?php echo $listaenfermos['nombre'] ?>" class="btn btn-danger">Eliminar</a>
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
