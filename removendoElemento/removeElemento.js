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

    const btn_lixeira=document.createElement("img")
    btn_lixeira.setAttribute("src", "./lixeira.png")
    btn_lixeira.setAttribute("class", "btn_lixeira")
    btn_lixeira.addEventListener("click", (evt)=>{
        // console.log(evt.target)
        caixa1.removeChild(evt.target.parentNode) /*Pegando o parente acima */
    })
    novoElemento.appendChild(btn_lixeira)
    caixa1.appendChild(novoElemento)
})