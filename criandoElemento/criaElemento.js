const caixa1=document.querySelector("#caixa1")
const todosCursos=[...document.querySelectorAll(".curso")]
const c1_2=[...document.querySelectorAll("#c1_2")]
const cursos=["HTML", "CSS", "JavaScript", "PHP", "React", "MySQL", "ReactNative"]

cursos.map((el, chave)=>{
    chave +=1
    const novoElemento=document.createElement("div")
    novoElemento.setAttribute("id","c"+chave)
    novoElemento.setAttribute("class","curso c1")
    novoElemento.innerHTML=el
    caixa1.appendChild(novoElemento)
})

// const novoElemento=document.createElement("div");
// novoElemento.setAttribute("id","c7")
// novoElewmento.setAttribute("class","curso c1")
// novoElemento.innerHTML="ReactNative";

// caixa1.appendChild(novoElewmento);