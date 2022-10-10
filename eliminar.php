<?php
require 'data/basedatos.php';
$id = $_GET['id'];
$eliminar = "DELETE FROM listaenfermos WHERE id = '$id'";
$elimina = $db->query($eliminar);
header("location:lista.php");
$conecta->close();
?>

