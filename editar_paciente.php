<?php
require('data/basedatos.php');

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    print_r($_POST);
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $numero_dni = $_POST['numero_dni'];
    $tipoproblema = $_POST['tipoproblema'];
    $nomproblema = $_POST['nomproblema'];

    $sql = "UPDATE listaenfermos SET nombre = '$nombre', 
    apellido = '$apellido', edad = '$edad', telefono = '$telefono',
    numero_dni = '$numero_dni', tipoproblema = '$tipoproblema', 
    nomproblema = '$nomproblema'
     WHERE id = $id";
    $resultado = $db->query($sql);
    if($resultado){
        header('location:lista.php');
    }
    exit;
}



$sql = "SELECT * FROM listaenfermos WHERE id = $id";
$resultado = $db->query($sql);
$listaenfermos = $resultado->fetch_assoc();

$sql = "SELECT * FROM tipo_enfermos";
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
    <title>Editar Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Editar Paciente</h1>
        <form method="POST">
        <div class="mb-3">
                <label for="id" class="form-label">ID:</label>
                <input type="text" name="id" id="id" class="form-control" value="<?php echo $listaenfermos['id'] ?>">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombres:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $listaenfermos['nombre'] ?>">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellidos:</label>
                <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $listaenfermos['apellido'] ?>">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $listaenfermos['telefono'] ?>">
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="text" name="edad" id="edad" class="form-control" value="<?php echo $listaenfermos['edad'] ?>">
            </div>

            <div class="mb-3">
                <label for="numero_dni" class="form-label">Numero DNI:</label>
                <input type="text" name="numero_dni" id="numero_dni" class="form-control" value="<?php echo $listaenfermos['numero_dni'] ?>">
            </div>

            <div class="mb-3">
                <label for="$tipoproblema " class="form-label">Tipo de Malestar:</label>
                <select class="form-control" id="$tipoproblema " name="tipoproblema">
                    <option value="0">--SELECCIONE--</option>
                    <?php
                    foreach($tipo_enfermos as $tipo):
                    ?>
                        <option value="<?php echo $tipo['nombre'] ?>" 
                            <?php echo $tipo['nombre'] === $listaenfermos['tipoproblema'] ? 'selected': ''?>>
                            <?php echo $tipo['nombre'] ?>
                        </option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="nomproblema" class="form-label">Nombre del malestar:</label>
                <input type="text" name="nomproblema" id="nomproblema" 
                    class="form-control" value="<?php echo $listaenfermos['nomproblema'] ?>">
            </div>

            <input type="submit" value="Grabar" class="btn btn-primary">
        </form>
    </div>
</body>

</html>