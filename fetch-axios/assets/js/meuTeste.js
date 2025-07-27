fetch('pessoas.json')
    .then(pegou => pegou.json())
    .then(json => minhaFuncao(json));

function minhaFuncao(json){
    const lugar = document.querySelector('.teste');
    for(fulano of json){
        const paragrafo = document.createElement('p');
        paragrafo.innerText = fulano.nome;
        lugar.appendChild(paragrafo);
    }
}