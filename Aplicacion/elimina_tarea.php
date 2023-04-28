<?php
include("db.php");
session_start();
$username=$_SESSION['login_user'];

$tarea_id=$_POST['tarea_id'];

if(is_null($tarea_id)){
}
else{
	$result=mysqli_query($conn,"DELETE FROM tareas WHERE tarea_id = $tarea_id");
	if($result){
		echo "Delete exitoso";
	}else{
		echo mysqli_error($conn);
	}
}



?>