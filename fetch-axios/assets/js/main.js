/* meu conteúdo
fetch('pessoas.json')
  .then(resposta => resposta.json())
  .then(json => CarregaElementos(json));

  function CarregaElementos(json){
    const div = document.createElement('div')
    for(pessoa of json){
      const paragrafo = document.createElement('p');
      paragrafo.innerText = pessoa.nome + "," + " idade: " + pessoa.idade;
      div.appendChild(paragrafo);
    }
    const exibe = document.querySelector('.conteudo');
    exibe.appendChild(div);
  }

*/
  
  fetch('pessoas.json')
  .then(resposta => resposta.json())
  .then(json => carregaElementosNaPagina(json));



  function carregaElementosNaPagina(json){
    const table = document.createElement('table');
    for(let pessoa of json){
      const tr = document.createElement('tr');     
      
      let td = document.createElement('td');     
      td.innerHTML = pessoa.nome;
      tr.appendChild(td);
      
      td = document.createElement('td');     
      td.innerHTML = pessoa.idade;
      tr.appendChild(td);
      
      td = document.createElement('td');     
      td.innerHTML = pessoa.salario;
      tr.appendChild(td);

      table.appendChild(tr);
    }

    const resultado = document.querySelector('.resultado');
    resultado.appendChild(table);

    
  }
