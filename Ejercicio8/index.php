<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <title>Ejercicio 8</title>
  </head>
  <body>
<div class="form-page">
  <div class="form">
    <input id= "txt1" type="text" placeholder="Ingresa una palabra"/>
    <button id= "botonN" onclick="agregar_txt(document.getElementById('txt1').value)">Agregar palabra 1</button><br></br>
    <button id= "botonP" onclick="palabra_mas_larga()">OK</button>
  </div>
</div>
  </body>

<script>
let palabras = [];
let cont = 2;
var n_num = document.getElementById('botonN');

  function agregar_txt(palabra) {

n_num.innerHTML = 'Agregar palabra '+cont++;
palabras.push(palabra);
document.getElementById("txt1").value = "";
document.getElementById("txt1").focus();
//alert(numeros);
}

function stringMasLarga(strings) {
  let candidata = strings[0]; 
  for (let i = 1; i < strings.length; i++) {
       if (strings[i].length > candidata.length) {
           candidata = strings[i];
       }
   }
   return candidata;

}



function palabra_mas_larga(){

  var txt = stringMasLarga(palabras);
  alert("La palabra mas larga es: "+txt);
  palabras = [];
  cont = 1;
  n_num.innerHTML = 'Agregar palabra '+cont++;
}


</script>
</html>