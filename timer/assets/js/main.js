function relogio(){
    function criaHoraDosSegundos(segundos){
        const data = new Date(segundos * 1000);
        return data.toLocaleTimeString('pr-BR', {
            hour12: false,
            timeZone: 'UTC'
        });
    }
    
    
    const relogio = document.querySelector('.relogio');
    /* para poucos botões, selecionando cada um:
    const iniciar = document.querySelector('.iniciar');
    const pausar = document.querySelector('.pausar');
    const zerar = document.querySelector('.zerar');*/
    let segundos = 0;
    let timer;
    
    function iniciaRelogio(){
        timer = setInterval(function(){
            segundos++;
            relogio.innerHTML = criaHoraDosSegundos(segundos);
        }, 1000);
    }
    
    document.addEventListener('click', function(e){
        const el = e.target;
    
        if(el.classList.contains('zerar')){
            relogio.classList.remove('pausado');
            clearInterval(timer);
            relogio.innerHTML = '00:00:00';
            segundos = 0;
        }
    
        if(el.classList.contains('pausar')){
            relogio.classList.add('pausado');
            clearInterval(timer);
        }
    
        if(el.classList.contains('iniciar')){
            relogio.classList.remove('pausado');
            clearInterval(timer);
            iniciaRelogio();
        }
    }); 
    
    /* para poucos botões 
    
    iniciar.addEventListener('click', function(event){
        relogio.classList.remove('pausado');
        clearInterval(timer);
        iniciaRelogio();
    });
    pausar.addEventListener('click', function(event){
        relogio.classList.add('pausado');
        clearInterval(timer);
    });
    zerar.addEventListener('click', function(event){
        relogio.classList.remove('pausado');
        clearInterval(timer);
        relogio.innerHTML = '00:00:00';
        segundos = 0;
    });
    */
}

relogio();