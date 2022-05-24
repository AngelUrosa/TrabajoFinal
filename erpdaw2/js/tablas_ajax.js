"use strict";

const _plantilla_tabla = 
    {'<>':'tr','html':[
        {'<>':'td','html':'${nombre}'},
        {'<>':'td','html':'${apellido1}'},
        {'<>':'td','html':'${apellido2}'},
        {'<>':'td','html':'${nif}'},
        {'<>':'td','html':'<button class="botonEliminar" value="${id}">Eliminar</button>'}
    ]};

// Innicializa el API
//window.addEventListener('load', inicializarTabla);

/**
 * 
 * @param {*} formulario recibo directamente el objeto formulario
 * @param {*} tabla El elemento HTML
 */
function inicializarTabla(formulario, tabla, url) {
    // Asigna los eventos
    formulario.addEventListener('submit', enviarFormulario);
    formulario.tablaResultado = tabla;
    formulario.url = url;

    // Esto ya no funciona
    enviarFormulario2(formulario, tabla);
}

function enviarFormulario(evento) {
    
    // Cancela el handler por defecto
    evento.preventDefault();

    // Elementos
    const formulario = evento.target;
    const tabla = formulario.tablaResultado;

    // Envía un submit del form
    enviarFormulario2(formulario, tabla);
}

function enviarFormulario2(formulario, tabla) {

    // Calcula el filtro
    let filtroUsuario = formulario.filtro.value.trim();
    if(filtroUsuario.length == 0) {
        filtroUsuario = '%';    
    }

    // Creo un objeto con los parámetros
    const parametros = {
        filtro: filtroUsuario
    };

    enviarFormularioFetch(formulario.url, parametros, tabla);
}

/**  
 * Recibe como argumento el objeto con los parámetros
 * envía petición JSON
 */
function enviarFormularioFetch(url, parametros, tabla) {
  
    fetch(
      url, 
      {
        method: 'POST', // or 'PUT'
        body: JSON.stringify(parametros), // data can be `string` or {object}!
        headers:{
            'Content-Type': 'application/json'
      }
    })
    .then(res => res.json())
    .catch(error => console.error('Error:', error))
    .then(response => mostrarResultado(response, tabla));
}

/** 
 * Muestra el resultado en la página del clietne.
 */
function mostrarResultado(resultado, tabla) {    
    tabla.innerHTML = json2html.render(resultado, _plantilla_tabla);
}