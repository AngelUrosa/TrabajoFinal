"use strict";

/**
 * Inicializa todos los que tienen la clase botonEliminar
 */
function caInicializarBotonesEliminar(id_padre, url) {
    const tabla = encontrarPadre(document.getElementById(id_padre), 'TABLE');
    
    tabla.addEventListener('click', caOnClick);
    tabla.url = url;
}


function caOnClick(evento) {
   
    // Paramos la propagación
    evento.stopPropagation();

    // Quitamos la acción por defecto
    evento.preventDefault();

    // Elemento que ha recibido el evento
    const elemento = evento.target;

    // Compruebo la clase
    if(elemento.classList.contains('botonEliminar')) {
        // Pregunta si se quiere eliminar el registro
        if (window.confirm("¿Está seguro de que quiere eliminar el registro?")) {
            caEliminarRegistro(elemento);
        }
    }
}

/**
 * Elimina un registro
 * 
 * @param {
 * } elemento 
 */
function caEliminarRegistro(elemento) {

    const tabla = encontrarPadre(elemento, 'TABLE');

    // Tabla con los parámetros
    const parametros = {
        id: elemento.value
    };

    fetch(
        tabla.url, 
        {
          method: 'POST', 
          body: JSON.stringify(parametros), 
          headers:{
              'Content-Type': 'application/json'
          }
    })
      .then(res => res.json())
      .catch(error => console.error('Error:', error))
      .then(response => caProcesarRespuestaEliminar(elemento, response));
}


function caProcesarRespuestaEliminar(elemento, respuesta) {
    if (respuesta.resultado == 1) {
        // Obtengo el TR que contiene el botón tr -> rd -> elemento
        const tr = encontrarPadre(elemento, 'TR');

        // Elimino el elemento de la tabla
        tr.remove();
    } else {
        alert("No se ha podido eliminar el registro");
    }
}

function encontrarPadre(elemento, tipoPadre) {

    // Elemento padre
    let e = elemento.parentNode;

    // Busca el padre que es del tipo indicado
    while(e.tagName != tipoPadre){
        e = e.parentNode;
    }

    return e;
}

/**
 * Elimina un registro
 * 
 * @param {
 * } elemento 
 */
function caEliminarRegistroAjax(url, id, onOk, onError) {

    // const tabla = encontrarPadre(elemento, 'TABLE');

    // Tabla con los parámetros
    const parametros = {
        id: id
    };

    fetch(
        url, 
        {
          method: 'POST', 
          body: JSON.stringify(parametros), 
          headers:{
              'Content-Type': 'application/json'
          }
    })
      .then(res => res.json())
      .catch(error => console.error('Error:', error))
      .then(response => {
          if (response) {
              onOk();
          } else {
            onError();
          }
      });
}