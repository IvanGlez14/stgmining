<?php
$servername = "localhost"; 
$database = "stm"; 
$username = "root"; 
$password = ""; 

// Creamos la conección 
$conn = mysqli_connect($servername, $username, $password, $database); 
// Checamos la conección 
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
} 
echo "Connected successfully"; 

?>