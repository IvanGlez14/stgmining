<?php
include("db.php");
session_start();
$username=$_SESSION['login_user'];

$tarea_id=$_POST['tarea_id'];
$titulo=$_POST['titulo']; 
$detalles=$_POST['detalles']; 
$fecha=$_POST['fecha']; 

if(is_null($tarea_id)){
	$result=mysqli_query($conn,"INSERT INTO tareas (usuario_id, titulo, detalles, fecha) VALUES ('$username', '$titulo', '$detalles', '$fecha')");
	if($result){
		echo "Registro exitoso";
	}else{
		echo mysqli_error($conn);
	}
}
else{
	$result=mysqli_query($conn,"UPDATE tareas SET titulo = '$titulo', detalles = '$detalles', fecha = '$fecha' WHERE tarea_id = $tarea_id");
	if($result){
		echo "Registro exitoso";
	}else{
		echo mysqli_error($conn);
	}
}



?>