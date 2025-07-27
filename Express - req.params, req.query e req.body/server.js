// Express - req.params, req.query e req.body

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

app.get('/testes/:idUsuarios?/:parametro?', (req, res)=> {
    console.log(req.params);
    console.log(req.query);
    res.send(req.params);
})

app.post('/', (req, res) => {
    res.send('Recebi o formulário');
});


app.listen(3000, ()=>{
    console.log('Acessar http://localhost:3000');
    console.log('Servidor executando na porta 3000');
});