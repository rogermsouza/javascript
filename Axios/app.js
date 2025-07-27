const path = require('path');
const axios = require('axios');

const mode1 = require('./mode1');
const falaNome = mode1.falaNome;

console.log(falaNome());

axios('https://pokeapi.co/api/v2/pokemon?limit=10')
    .then(response => console.log(response.data))
    .catch(e => console.log(e));