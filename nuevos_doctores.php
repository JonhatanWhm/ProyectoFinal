<?php 
require 'data/basedatos.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];    
    $gmail = $_POST['gmail'];
    $direccion = $_POST['direccion'];
    $estadocivil = $_POST['estadocivil'];
    $especialidad = $_POST['especialidad'];    
    $horario = $_POST['horario'];
    $sueldo = $_POST['sueldo'];

    $sql = "INSERT INTO doctores (id,nombre,apellido,
                edad,telefono,gmail,direccion,estadocivil,
                especialidad,horario, sueldo) 
            VALUES ('$id','$nombre','$apellido','$edad','$telefono',
            '$gmail','$direccion','$estadocivil','$especialidad','$horario','$sueldo')";
    $resultado = $db->query($sql);
    if($resultado){
        header('location:doctores.php');
    }
    exit;
}

$sql = "SELECT * FROM tipo_especialidades";
$resultado = $db->query($sql);
$tipo_enfermos = [];
while($tipo = $resultado->fetch_assoc()){
    $tipo_enfermos[] = $tipo;
}

$sql = "SELECT * FROM tipo_documento";
$resultado = $db->query($sql);
$tipos_documento = [];
while($tipo = $resultado->fetch_assoc()){
    $tipos_documento[] = $tipo;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Nuevo Cliente</h1>
        <form method="POST">

        <div class="mb-3">
                <label for="id" class="form-label">ID:</label>
                <input type="text" name="id" id="id" class="form-control">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombres:</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellidos:</label>
                <input type="text" name="apellido" id="apellido" class="form-control">
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="text" name="edad" id="edad" class="form-control">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control">
            </div>

            <div class="mb-3">
                <label for="gmail" class="form-label">Correo</label>
                <input type="text" name="gmail" id="gmail" class="form-control">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">direccion:</label>
                <input type="text" name="direccion" id="direccion" class="form-control">
            </div>

            <div class="mb-3">
                <label for="estadocivil" class="form-label">Estado Civil</label>
                <input type="text" name="estadocivil" id="estadocivil" class="form-control">
            </div>

            <div class="mb-3">
                <label for="especialidad" class="form-label">Tipo de Especialidad:</label>
                <select class="form-control" id="especialidad" name="especialidad">
                    <option value="0">--SELECCIONE--</option>
                    <?php
                    foreach ($tipo_enfermos as $tipo) :
                    ?>
                        <option value="<?php echo $tipo['nombre'] ?>">
                            <?php echo $tipo['nombre'] ?>
                        </option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="horario" class="form-label">Horarios</label>
                <input type="text" name="horario" id="horario" class="form-control">
            </div>

            <div class="mb-3">
                <label for="sueldo" class="form-label">Sueldo</label>
                <input type="text" name="sueldo" id="sueldo" class="form-control">
            </div>


            <input type="submit" value="Grabar" class="btn btn-primary">
        </form>

    </div>
</body>

</html>