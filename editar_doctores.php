<?php
require('data/basedatos.php');

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    print_r($_POST);
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

    $sql = "UPDATE doctores SET nombre = '$nombre', 
    apellido = '$apellido', edad = '$edad', telefono = '$telefono',
    gmail = '$gmail', direccion = '$direccion', estadocivil = '$estadocivil', 
    especialidad = '$especialidad', horario = '$horario', sueldo = '$sueldo'
     WHERE id = $id";
    $resultado = $db->query($sql);
    if($resultado){
        header('location:doctores.php');
    }
    exit;
}



$sql = "SELECT * FROM doctores WHERE id = $id";
$resultado = $db->query($sql);
$doctores = $resultado->fetch_assoc();

$sql = "SELECT * FROM tipo_especialidades";
$resultado = $db->query($sql);
$tipo_especialidades = [];
while($tipo = $resultado->fetch_assoc()){
    $tipo_especialidades[] = $tipo;
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
    <title>Editar Doctores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Editar Doctores</h1>
        <form method="POST">
        <div class="mb-3">
                <label for="id" class="form-label">ID:</label>
                <input type="text" name="id" id="id" class="form-control" value="<?php echo $doctores['id'] ?>">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombres:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $doctores['nombre'] ?>">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellidos:</label>
                <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $doctores['apellido'] ?>">
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="text" name="edad" id="edad" class="form-control" value="<?php echo $doctores['edad'] ?>">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $doctores['telefono'] ?>">
            </div>        

            <div class="mb-3">
                <label for="gmail" class="form-label">Correo</label>
                <input type="text" name="gmail" id="gmail" class="form-control" value="<?php echo $doctores['gmail'] ?>">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">direccion:</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $doctores['direccion'] ?>">
            </div>

            <div class="mb-3">
                <label for="estadocivil" class="form-label">Estado Civil</label>
                <input type="text" name="estadocivil" id="estadocivil" class="form-control"value="<?php echo $doctores['estadocivil'] ?>">
            </div>

            <div class="mb-3">
                <label for="$especialidad " class="form-label">Tipo de Especialidad:</label>
                <select class="form-control" id="$especialidad " name="especialidad" value="<?php echo $doctores['especialidad'] ?>">
                    <option value="0">--SELECCIONE--</option>
                    <?php
                    foreach($tipo_especialidades as $tipo):
                    ?>
                        <option value="<?php echo $tipo['nombre'] ?>" 
                            <?php echo $tipo['nombre'] === $doctores['especialidad'] ? 'selected': ''?>>
                            <?php echo $tipo['nombre'] ?>
                        </option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="horario" class="form-label">Horarios</label>
                <input type="text" name="horario" id="horario" class="form-control" value="<?php echo $doctores['horario'] ?>">
            </div>

            <div class="mb-3">
                <label for="sueldo" class="form-label">Sueldo</label>
                <input type="text" name="sueldo" id="sueldo" class="form-control" value="<?php echo $doctores['sueldo'] ?>">
            </div>

            <input type="submit" value="Grabar" class="btn btn-primary">
        </form>
    </div>
</body>

</html>