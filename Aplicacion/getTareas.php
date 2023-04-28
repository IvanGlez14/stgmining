<?php
include("db.php");
session_start();
$username=$_SESSION['login_user'];
$data = array();

$tarea_id=$_POST['tarea_id']; 
$result=mysqli_query($conn,"SELECT * FROM tareas WHERE tarea_id='$tarea_id'");
$count=mysqli_num_rows($result);
//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 if($result->num_rows > 0){
        $userData = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $data['status'] = 'ok';
        $data['result'] = $userData;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    
    //returns data as JSON format
    echo json_encode($data);

?>