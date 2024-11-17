const numero = Number(prompt("Digite um valor"))
const valor = document.getElementById("valor")
valor.innerHTML = numero;

let raiz = numero ** 0.5
const valorRaiz = document.getElementById("raiz")
valorRaiz.innerHTML = raiz

const eNan = Number.isNaN(numero)
const mensagemNan = document.getElementById("enan")
mensagemNan.innerHTML = eNan

const arreBaixo = Math.floor(numero)
const msgArre = document.getElementById("arredondaBaixo")
msgArre.innerHTML = arreBaixo

const arreAcima = Math.ceil(numero)
const msgAcima = document.getElementById("arredondaAcima")
msgAcima.innerHTML = arreAcima

const casas = numero.toFixed(2)
const msgCasas = document.getElementById("casas")
msgCasas.innerHTML = casas