<?php
session_start();
if(empty($_SESSION['login_user']))
{
header('Location: index.php');
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/form.css">
    <title>Aplicación</title>
  </head>
  <body onload="cargaTabla()"> 
<div class="form-page">
  <div  class="form">
  	<form action="" method="post">
  		<input type="hidden" id= "tarea_id" type="text" placeholder="id"/><br>
  		<input id= "titulo" type="text" placeholder="Nombre de la actividad"/>
  		<input id= "detalles" type="text" placeholder="Descripción"/>
  		<input id= "fecha" type="text" placeholder="Fecha"/>
      	<button id="btni" onclick="insertaTarea()">Guardar</button>
  	</form>
   	<div>
   		<table class="" cellspacing="0" width="60%">
			<thead><caption>Tabla de actividades por usuario</caption>
				<tr>
					<th scope="col">
					<span class="column-sort">
						<a href="#" title="Ascendente" class="sort-up"></a>
						<a href="#" title="Descendente" class="sort-down"></a>
					</span>Titulo
					</th>
					<th scope="col">
					<span class="column-sort">
						<a href="#" title="Ascendente" class="sort-up"></a>
						<a href="#" title="Descendente" class="sort-down"></a>
						</span>Detalles
					</th>
					<th scope="col">
					<span class="column-sort">
						<a href="#" title="Ascendente" class="sort-up"></a>
						<a href="#" title="Descendente" class="sort-down"></a>
					</span>Fecha
					</th>
					<th scope="col">
					<span class="column-sort">
						<a href="#" title="Ascendente" class="sort-up"></a>
						<a href="#" title="Descendente" class="sort-down"></a>
					</span>Usuario
					</th>
					<th scope="col">Editar</th>
					<th scope="col">Eliminar</th>
				</tr>
			</thead>
			<tbody id ="tabla">
					
			</tbody>
		</table>
   	</div>
  </div>
</div>
  </body>
<script src="jquery-3.6.4.min.js"></script>
<script>
function cargaTabla(){
$.ajax({
type: "POST",
url: "consulta_tareas.php",
data:"",
cache: false,
beforeSend: function(){},
success: function(data){
if(data)
{
$("#tabla").html(data);
}
else
{
	//else
}
}
});
}

function insertaTarea(){
var tarea_id=$("#tarea_id").val();
var titulo=$("#titulo").val();
var detalles=$("#detalles").val();
var fecha=$("#fecha").val();
var dataString = 'titulo='+titulo+'&detalles='+detalles+'&fecha='+fecha+'&tarea_id='+tarea_id;
if($.trim(titulo).length>0 && $.trim(detalles).length>0)
{
$.ajax({
type: "POST",
url: "inserta_tarea.php",
data:dataString,
cache: false,
beforeSend: function(){},
success: function(data){
if(data)
{
cargaTabla();
document.getElementById("titulo").focus();
}
else
{
alert("Error!");
}
}
});

}
return false;
aler("Ingrese los datos");
}

function llenaCampos(tarea_id){
//var dataString = 'tarea_id='+tarea_id;
var dataString = {tarea_id: tarea_id};
$.ajax({
url: "getTareas.php",
dataType: 'json',
type: 'POST',
data:dataString,
success: function(data){
if(data)
{
$('#tarea_id').val(data.result.tarea_id);
$('#titulo').val(data.result.titulo);
$('#detalles').val(data.result.detalles);
$('#fecha').val(data.result.fecha);
}
else
{
	//else
}
}
});
}

function elimina(tarea_id){
let text = "Está seguro que desea eliminar esta tarea?";
	if (confirm(text) == true) {
    	var dataString = {tarea_id: tarea_id};
		$.ajax({
		url: "elimina_tarea.php",
		type: 'POST',
		data:dataString,
		success: function(data){
	if(data){
		$('#tarea_id').val("");
		$('#titulo').val("");
		$('#detalles').val("");
		$('#fecha').val("");
		cargaTabla();
	}
	else{}
}
});
}
else {}
}
</script>
</html>