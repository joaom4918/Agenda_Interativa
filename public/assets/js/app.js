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

