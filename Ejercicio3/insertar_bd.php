<?php
require('conn_bd.php');
$nombre = utf8_decode($_POST['nombre']);
$direccion = utf8_decode($_POST['direccion']);
$telefono = utf8_decode($_POST['telefono']);

$sql = "INSERT INTO persona (nombre, direccion, telefono) VALUES ('$name', '$direccion', '$telefono')";

mysqli_query($sql);
mysqli_close($conn); 
?>