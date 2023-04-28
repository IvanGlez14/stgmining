<?php
session_start();
if(!empty($_SESSION['login_user']))
{
header('Location: tareas.php');
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <title>Aplicación</title>
  </head>
  <body>
<div class="form-page">
  <div class="form" id="box">
    <form action="" method="post">
      <input id= "username" type="text" placeholder="Usuario"/>
      <input id= "password" type="text" placeholder="Contraseña"/>
      <input type="submit" class="button" value="Log In" id="login"/>
      <div id="error"></div>
    </form>
  </div>
</div>
  </body>
<script src="jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() 
{

$('#login').click(function()
{
var username=$("#username").val();
var password=$("#password").val();
var dataString = 'username='+username+'&password='+password;
if($.trim(username).length>0 && $.trim(password).length>0)
{
$.ajax({
type: "POST",
url: "ajaxLogin.php",
data: dataString,
cache: false,
beforeSend: function(){ $("#login").val('Connecting...');},
success: function(data){
if(data)
{
//$("body").load("home.php").hide().fadeIn(1500).delay(6000);
//or
window.location.href = "tareas.php";
}
else
{
//Shake animation effect.
$('#box').shake();
$("#login").val('Login')
$("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
}
}
});

}
return false;
});

});
</script>
</html>