"use strict";


const MME_ALERT = 1;
const MME_MODAL = 2;
const MME_SELECTOR = 3;



function monstrarMensajeError(mensaje, elemento, modo, parametros) {
    

switch (modo) {
    case MME_ALERT:
        monstrarMensajeErrorAlert(mensaje)


        break;

    case MME_MODAL:
        monstrarMensajeErrorModal(mensaje)
        break;

    case MME_SELECTOR:

        monstrarMensajeErrorSelector(mensaje, parametros)
        break;

    default:

        console.log(mensaje);
        break;
}

}


function monstrarMensajeErrorAlert(mensaje) {
    alert (mensaje);
}

function monstrarMensajeErrorModal(mensaje) {
    

    if (!$('#modalMensaje').length){

        // $( "#result" ).load( "ajax/test.html #container" );
        $("#dialogoModal").load( "mensaje.html", () => {

     $('#modalMensaje .modal-title').html("ERROR POR VIA MODAL");

    $('#modalMensaje .modal-body').html(mensaje);

    $('#modalMensaje').show('show');


    });
  }
}

function monstrarMensajeErrorSelector(mensaje, selector) {
    
    
   const elementos = document.querySelectorAll(selector);

   for (let i of elementos){

    i.innerText = mensaje;
    
   }


}

//monstrarMensajeError('hola',null,MME_ALERT);

//monstrarMensajeError('error en un div',null,MME_SELECTOR,'#error');

//monstrarMensajeError('error modal',null,MME_MODAL,'#error');