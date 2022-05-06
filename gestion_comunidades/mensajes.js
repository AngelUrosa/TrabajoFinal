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
        monstrarMensajeErrorModal()
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

function monstrarMensajeErrorModal() {
    
}

function monstrarMensajeErrorSelector(mensaje, selector) {
    
    
   const elementos = document.querySelectorAll(selector);

   for (let i of elementos){

    i.innerText = mensaje;
    
   }


}

//monstrarMensajeError('hola',null,MME_ALERT);

monstrarMensajeError('error en un div',null,MME_SELECTOR,'#error');