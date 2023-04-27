<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <title>Ejercicio 7</title>
  </head>
  <body>
<div class="form-page">
  <div class="form">
    <input id= "num1" type="text" placeholder="Ingresa el número"/>
    <button id= "botonN" onclick="agregar_num(document.getElementById('num1').value)">Agregar número 1</button><br></br>
    <button id= "botonP" onclick="promediar()">Promediar</button>
  </div>
</div>
  </body>

<script>
let numeros = [];
let cont = 2;
var n_num = document.getElementById('botonN');

  function agregar_num(numero) {

n_num.innerHTML = 'Agregar número '+cont++;
numeros.push(numero);
document.getElementById("num1").value = "";
document.getElementById("num1").focus();
//alert(numeros);
}

function ArrayAvg(myArray) {
  var i = 0, summ = 0, ArrayLen, result;
  ArrayLen = myArray.length;
    while (i < ArrayLen) {
        summ = parseInt(summ) + parseInt(myArray[i]);
    i++;
}

result = summ / ArrayLen;
    return result;
}

function promediar(){
  var prom = ArrayAvg(numeros);
  alert("El promedio de los números es: "+prom);
  numeros = [];
  cont = 1;
  n_num.innerHTML = 'Agregar número '+cont++;
}

</script>
</html>