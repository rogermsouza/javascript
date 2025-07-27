// Express + Nodemon

const express = require('express');
const app = express();
//carregamos o express aqui, mas sem usar.

// OPERAÇÕES PARA API / VAMOS LER NESTE MOMENTO
// CRUD -> CREATE, READ, UPDATE, DELETE
//         POST    GET   PUT     DELETE


app.get('/', (req, res) => {
    res.send(`
    <form action="/" method="POST">
    Nome: <input type="text" nome="nome">
        <button>Olá Mundo! Teste</button>
    </form>
    `);
});

app.post('/', (req, res) => {
    res.send('Recebi o formulário');
});

// Nova rota
app.get('/contato', (req, res) => {
    res.send('Obrigado por entrar em contato com a gente');
});

app.listen(3000, ()=>{
    console.log('Acessar http://localhost:3000');
    console.log('Servidor executando na porta 3000');
});