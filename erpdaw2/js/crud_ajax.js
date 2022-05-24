"use strict";

const _URL_CRUD_DELETE_CLIENTE = 'ajax/crudDeleteCliente.php';

/**
 * Inicializa todos los que tienen la clase botonEliminar
 */
function caInicializarBotonesEliminar(id_padre, id_tabla) {
    const tabla = document.getElementById(id_padre);
    
    tabla.addEventListener('click', caOnClick);
    tabla.id_tabla_servidor = id_tabla;
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
    const id_tabla_servidor = tabla.id_tabla_servidor;

    // Tabla con los parámetros
    const parametros = {
        tabla: id_tabla_servidor,
        id: elemento.value
    };

    fetch(
        _URL_CRUD_DELETE_CLIENTE, 
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
    // Obtengo el TR que contiene el botón tr -> rd -> elemento
    const tr = encontrarPadre(elemento, 'TR');

    // Elimino el elemento de la tabla
    tr.remove();
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