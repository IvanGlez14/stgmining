<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <title>Ejercicio 2</title>
  </head>
  <body>
<div class="form-page">
  <div class="form">
      <input id= "texto" type="text" placeholder="Ingresa el texto"/>
      <button onclick="esPar(document.getElementById('texto').value)">OK</button>
  </div>
</div>
  </body>

<script>
  function esPar(texto) 
{ 
var c = texto.split(' ').length; 
alert("La cadena consta de " + c + " palabras.");
}
</script>
</html>