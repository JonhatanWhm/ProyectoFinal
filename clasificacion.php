<?php
require_once('data/basedatos.php');
//VARIABLES
$listado_tipos = [];
$listado_pacientes = [];
$cantidad_pacientes = 0;
$tipoenfermos = null;
$tipo = 0;

$sql = "SELECT * FROM tipo_enfermos";
$resultado = $db->query($sql);
$numero_filas = $resultado->num_rows;
for ($idx=0; $idx < $numero_filas; $idx++){
    $row = $resultado->fetch_assoc();
    $listado_tipos[] = $row;
}

if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $tipo = $_POST['cboTipo'];
    $sql = "SELECT * FROM tipo_enfermos WHERE id = $tipo";
    $resultado = $db->query($sql);
    if($resultado->num_rows > 0){
       $tipoenfermos = $resultado->fetch_object();
    }

    $sql = "SELECT id, nombre AS NombrePaciente, apellido as Apellido , 
    edad as edad, telefono as telefono, 
    numero_dni as numeroDNI, tipoproblema, nomproblema 
    from listaenfermos
    where tipoproblema = '$tipo';";
    var_dump($sql);
        $resultado = $db->query($sql);
        if($resultado->num_rows > 0){
            $cantidad_pacientes = $resultado->num_rows;
            while($row = $resultado->fetch_assoc()):
                $listado_pacientes [] = $row;
            endwhile;
        }
}

?>
<!DOCTYPE html>
<html langa="en">

<head>
        <meta charset="UTP-8">
        <meta http-equiv="X-UA-Compatible" content="it=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <title>Consulta</title>
</head>

<body>
    <div class="container">
        <h1>Consulta de Paciente</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="cboTipo" class="form-label">Tipo de cliente</label>
                <select name="cboTipo" id="cboTipo" class="form-control">
                    <option value="0">--SELECCIONE--</option>
                    <?php
                    if(count($listado_tipos) > 0){
                          foreach ($listado_tipos as $tipo):
                        ?>
                        <option value="<?php echo $tipo['id']?>"><?php echo $tipo['nombre'] ?></option>
                        <?php
                        endforeach;                        
                    }
                    ?>
                </select>
          </div>

          <input type="submit" value="Consultar" class="btn btn-primary">
        </form>
        <?php
        if(isset($tipoenfermos)):
            ?>
             <h3> Resultados de la consulta para el tipo: <?php echo $tipoenfermos->nombre; ?></h3>    
             <?php
                  if(count($listado_pacientes) > 0):
                    ?>
                       <table class="table">
                        <thead>
                            <tr>
                                <th>Codgio</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Edad</th>
                                <th>Telefono</th>
                                <th>Num DNI</th>
                                <th>Tipo de Problema</th>
                                <th>Nombre de problema</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php
                 foreach ($listado_pacientes as $paciente):
                ?> 
                    <tr>
                         <td><?php echo $paciente['id'] ?></td>
                         <td><?php echo $paciente['nombre'] ?></td>
                         <td><?php echo $paciente['apelldo'] ?></td>
                         <td><?php echo $paciente['edad'] ?></td>
                         <td><?php echo $paciente['telefono'] ?></td>
                         <td><?php echo $paciente['tipoproblema'] ?></td>
                         <td><?php echo $paciente['nomproblema'] ?></td>
                         <td><a href="#" class="btn btn-primary"> Ver detalles </a></td>
                          </tr>
                 <?php
                 endforeach;
                 ?>
                  </tbody>
                   <tr>
                       <th colspan="s">Cantidad de registros: <?php echo $cantidad_pacientes ?></th>
                  </tr>
                    <?php
              endif;
              ?>

             <table class="">

           </table>
           <?php
        endif;
        ?>
         </div>
    </body>

</html>




