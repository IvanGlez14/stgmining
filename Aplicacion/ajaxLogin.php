<?php
include("db.php");
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
// username and password sent from Form
$username=mysqli_real_escape_string($conn,$_POST['username']); 
//Here converting passsword into MD5 encryption. 
$password=mysqli_real_escape_string($conn,$_POST['password']); 

$result=mysqli_query($conn,"SELECT usuario_id FROM users WHERE username='$username' and password='$password'");
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
// If result matched $username and $password, table row  must be 1 row
if($count==1)
{
$_SESSION['login_user']=$row['usuario_id']; //Storing user session value.
echo $row['usuario_id'];
}

}
?>