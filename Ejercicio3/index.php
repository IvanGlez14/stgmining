<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <script type="text/javascript" src="../js/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.min.js"></script>
    <title>Ejercicio 3</title>
  </head>
  <body>
<div class="form-page">
  <div class="form" id="register_form">
    <form name="register" method="post" action="">
      <input id= "nombre" type="text" placeholder="Nombre"/>
      <input id= "direccion" type="text" placeholder="Dirección"/>
      <input id= "telefono" type="text" placeholder="Telefono"/>
      <input name="submit" type="submit" value="enviar" id="enviar-btn" class="boton"/>
    </form>
  </div>
</div>
  </body>

<script>
$(document).ready(function() {

  $("#enviar-btn").click(function() {
    var nombre = $("input#nombre").val();
    var dir = $("input#direccion").val();
    var tel = $("input#telefono").val();

var dataString = 'nombre=' + nombre + '&direccion=' + dir+ '&telefono=' + tel;

    $.ajax({
      type: "POST",
      url: "insertar_bd.php",
      data: dataString,
      success: function() {
          $('#register_form').html("<div id='message'></div>");
            $('#message').html("<h2>Tus datos han sido guardados correctamente!</h2>")
            .hide()
            .fadeIn(1500, function() {
          $('#message');
            });
        }
    });
    return false;
  });
});
</script>
</html>