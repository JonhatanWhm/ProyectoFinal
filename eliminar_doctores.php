<?php
require 'data/basedatos.php';
$id = $_GET['id'];
$eliminar = "DELETE FROM doctores WHERE id = '$id'";
$elimina = $db->query($eliminar);
header("location:doctores.php");
$conecta->close();
?>

