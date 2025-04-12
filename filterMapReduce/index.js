/*
Retorne a soma do dobro de todos os pares
Filtrar pares
Sobrar Valores
Resuzir (somar tudo)
-------------------------------------------------------------------
const numeros = [5, 50, 80, 1, 2, 3, 5, 8, 7, 11, 15, 22, 27];

const pares = numeros.filter(function(valor){
    return valor % 2 === 0;
}).map(function(valor){
    return valor * 2;
}).reduce(function(acumulador, valor){
    return acumulador + valor;
});

console.log(pares)
*/

// Funcções convertidas em arrow.
const numeros = [5, 50, 80, 1, 2, 3, 5, 8, 7, 11, 15, 22, 27];

const pares = numeros.filter(valor => valor % 2 === 0)
.map(valor => valor * 2)
.reduce((acumulador, valor) => acumulador + valor);

console.log(pares)