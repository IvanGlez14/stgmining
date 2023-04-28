<?php
include("db.php");
session_start();
$username=$_SESSION['login_user'];

$result=mysqli_query($conn,"SELECT * FROM tareas WHERE usuario_id='$username'");
$count=mysqli_num_rows($result);
//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

while ($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<th>".$row['titulo']."</th>";
	echo "<th>".$row['detalles']."</th>";
	echo "<th>".$row['fecha']."</th>";
	echo "<th>".$row['usuario_id']."</th>";

	echo "<th><a href=\"javascript:void(0);\" onclick=\"llenaCampos(".$row['tarea_id'].");\" title=\"Editar\"><img src=\"pencil.png\" width=\"16\" height=\"16\"></a></th>";

	echo "<th><a href=\"javascript:void(0);\" onclick=\"elimina(".$row['tarea_id'].");\" title=\"Eliminar\"><img src=\"delete.png\" width=\"16\" height=\"16\"></a></th>";
	echo "</tr>";
}

?>