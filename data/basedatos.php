
<?php
$db = new mysqli('localhost','cursos', 'alexis1266', 'hospital');
if(!$db){
    echo 'Error al conectra la Base de datos';
    exit;
}