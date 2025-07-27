axios('pessoas.json')
	.then(resposta => carregaDados(resposta.data));


function carregaDados(json){
    const local = document.querySelector('.teste');

    for(const pessoa of json){
        const nomeCompleto = pessoa.nome + ' / E-mail:  ' + pessoa.email;
        const paragrafo = document.createElement('p');
        paragrafo.innerHTML = nomeCompleto;
        local.appendChild(paragrafo);
        
    }
    
}
