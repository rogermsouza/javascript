function meuScript(){
    const formulario = document.querySelector('#formulario');
    const resultado = document.querySelector('.resultado');
    let msgCalculo;

    function calcula(evento){
        evento.preventDefault();
        let peso = document.querySelector('#peso');
        let altura = document.querySelector('#altura');
        const soma = peso.value / (altura.value **2);
        console.log(soma)
        
        if(soma < 18.5){
            msgCalculo = 'Abaixo do peso';
        }else if(soma > 18.5 && soma < 24.99){
            msgCalculo = 'peso normal';
        }else if(soma > 25 && soma < 29.9){
            msgCalculo = 'Sobrepeso'
        }else if(soma > 30 && soma < 34.9){
            msgCalculo = 'Obesidade grau 1';
        }else if(soma > 35 && soma < 39.9){
            msgCalculo = 'Obesidade grau 2';
        }else if(soma > 40){
            msgCalculo = 'Obesidade grau 3'
        }else {
            msgCalculo = 'Aguardando'
        }

        resultado.innerHTML = msgCalculo;
        
    }
    formulario.addEventListener('submit', calcula);
}

meuScript();

