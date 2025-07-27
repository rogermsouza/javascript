const express = require('express');
const route = express.Router();
const homeController = require('./controllers/homeController');
const contatoController = require('./controllers/contatoController');
const sobreController = require('./controllers/sobreController');
const testeController = require('./controllers/testeController')

// Rotas da home
route.get('/', homeController.paginaInicial);
route.post('/', homeController.trataPost);

// Rotas de contato

route.get('/contato', contatoController.paginaInicial);
route.get('/sobre', sobreController.paginaInicial);
route.get('/teste', testeController.paginaInicial);

module.exports = route;