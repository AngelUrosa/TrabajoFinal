abreToastInicial();

setTimeout(
    function() {
        // elementos = document.querySelectorAll(".mensaje-temporal");
        // for (let j = 0; j < elementos.length; j++) {
        //      elementos[j].style.display = "none";
        //  }
        new bootstrap.Toast(document.querySelector('#toast-errors')).hide();
    }
    , 5000);

function abreToastInicial() {
    new bootstrap.Toast(document.querySelector('#toast-errors')).show();
}


