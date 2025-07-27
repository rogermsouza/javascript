fetch('pessoas.json')
    .then(dados => dados.json())
    .then(json => exibeDados(json));

function exibeDados(json){
    const local = document.querySelector('.teste');
    for(informacao of json){
        const paragrafo = document.createElement('p');
        paragrafo.innerHTML = informacao.nome + ' /Email: ' + informacao.email;
        local.appendChild(paragrafo);
    }
    
}