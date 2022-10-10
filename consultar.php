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
    
    <tr>
    <center><h1>LISTA GRUPO3</h1></center>
</tr>
<center>
  <input type="submit" value="Consultar" class="btn btn-success" name="btn1">
</center>

<?php

if(isset($_POST['btn1']))
{
    include("abrir_conexion.php");

    $resultado = mysqli_query($conexion, "SELECT * FROM $table_db1");
    while($consulta = mysqli_fetch_array($resultados))
    {
     echo $consulta['id'];
     echo "<br>";
    }

    include("cerrar_conexion.php");
}






