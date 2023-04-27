<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <title>Ejercicio 4</title>
  </head>
  <body>
<div class="form-page">
  <div class="form">
      <input id= "num1" type="text" placeholder="Ingresa el número a convertir"/>
      <button onclick="esPar(document.getElementById('num1').value)">OK</button>
  </div>
</div>
  </body>

<script>
  function esPar(numero) { 
var num = numero;
var binario = (num % 2).toString();
    for (; num > 1; ) {
        num = parseInt(num / 2);
        binario =  (num % 2) + (binario);
    }
alert("El binario del número escrito es: "+binario);
}
</script>
</html>