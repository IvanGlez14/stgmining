<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <title>Ejercicio 5</title>
  </head>
  <body>
<div class="form-page">
  <div class="form">
      <input id= "texto" type="text" placeholder="Ingresa el texto"/>
      <button onclick="codificar(document.getElementById('texto').value)">Codificar</button><br></br>
      <button onclick="descodificar(document.getElementById('texto').value)">Descodificar</button>
  </div>
</div>
  </body>

<script>
  function codificar(texto) 
{ 
var codificado = btoa(texto);
alert("La cadena codificada es: "+codificado);
}
  function descodificar(texto) 
{ 
var descodificado = atob(texto);
alert("La cadena descodificada es: "+descodificado);
}
</script>
</html>