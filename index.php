<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="form.css">
    <title>Ejercicio 1</title>
  </head>
  <body>
<div class="form-page">
  <div class="form">
      <input id= "num1" type="text" placeholder="Ingresa número a comprobar"/>
      <button onclick="esPar(document.getElementById('num1').value)">OK</button>
  </div>
</div>
  </body>

<script>
  function esPar(numero) 
{ 
if(numero % 2 === 0) {
alert("El número que ingresaste es par");
}
else {
alert("El número que ingresaste es impar");
}
}
</script>
</html>