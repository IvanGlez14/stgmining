<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <title>Ejercicio 9</title>
  </head>
  <body>
<div class="form-page">
  <div class="form">
    <input id= "email" type="text" placeholder="Ingresa un correo electronico"/>
    <button onclick="validaEmail(document.getElementById('email').value)">Validar email</button>
  </div>
</div>
  </body>

<script>
function validaEmail(email){
  var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

if( validEmail.test(email) ){
    alert('El correo electronico es valido');
  }else{
    alert('Introduzca una dirección de correo valida');
  }
}
</script>
</html>