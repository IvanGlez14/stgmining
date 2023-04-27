<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <title>Ejercicio 10</title>
  </head>
  <body>
<div class="form-page">
  <div class="form">
    <input id= "txt1" type="text" placeholder="Ingresa una palabra"/>
    <button id= "botonN" onclick="agregar_txt(document.getElementById('txt1').value)">Agregar palabra 1</button><br></br>
    <button id= "botonP" onclick="mostrar_palabras()">Mostrar lista</button>
  </div>
</div>
  </body>

<script>
let palabras = [];
let palabras_v = [];
let cont = 2;
var n_num = document.getElementById('botonN');

function agregar_txt(palabra) {

n_num.innerHTML = 'Agregar palabra '+cont++;
palabras.push(palabra);
document.getElementById("txt1").value = "";
document.getElementById("txt1").focus();

if (contarVocales(palabra)>0){
palabras_v.push(palabra);
}

}

function contarVocales(cadena) {

var numeroVocales = 0;
numeroVocales = cadena.match(/[aeiou]/gi).length;

return numeroVocales;

}

function mostrar_palabras(){
  alert(palabras_v);
  palabras = [];
  palabras_v = [];
  cont = 1;
  n_num.innerHTML = 'Agregar palabra '+cont++;
}

</script>
</html>