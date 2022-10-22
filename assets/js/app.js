// para não ter nenhum conflito de nomes ou de bibliotecas o codigo esta dentro de uma função auto invocavel
(function () {
    const menuToggle = document.querySelector('.menu-toggle');
    //atribuindo ao atributo onclick uma função e essa função sera chamada quando um evento de click acontecer associada a esse botão
    menuToggle.onclick = function (e) {
        const body = document.querySelector('body');
        // a toogle vai alternar uma classe assosciada ao body
        body.classList.toggle('hide-sidebar');
    }
})()


function addOneSecond(horas,minutos,segundos){
    const d = new Date();
    d.setHours(parseInt(horas));
    d.setMinutes(parseInt(minutos));
    d.setSeconds(parseInt(segundos) +1);  

    const h = `${d.getHours()}`.padStart(2,0);
    const m = `${d.getMinutes()}`.padStart(2,0);
    const s = `${d.getSeconds()}`.padStart(2,0);
    return `${h}:${m}:${s}`;
}


function activateClock(){
    const activeClock= document.querySelector('[active-clock]')
    if(!activeClock)return
  
    setInterval(function(){
        const  parts= activeClock.innerHTML.split(':');
         activeClock.innerHTML= addOneSecond(...parts);
    },1000)
}

activateClock()