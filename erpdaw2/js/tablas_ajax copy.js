"use strict";

const _url_tabla_json = 'ajax/getTablaClientes.php';
const _plantilla_tabla = 
    {'<>':'tr','html':[
        {'<>':'td','html':'${nombre}'},
        {'<>':'td','html':'${apellido1}'},
        {'<>':'td','html':'${apellido2}'},
        {'<>':'td','html':'${nif}'}
    ]};

// Innicializa el API
window.addEventListener('load', inicializarTabla);


function inicializarTabla() {
    // Asigna los eventos
    document.forms.configuracionTabla.addEventListener('submit', enviarFormulario);

    enviarFormulario();
}

function enviarFormulario(evento) {
    
    // Cancela el handler por defecto
    if(evento) {
        evento.preventDefault();
    }
    
    // Calcula el filtro
    let filtroUsuario = document.forms.configuracionTabla.filtro.value.trim();
    if(filtroUsuario.length == 0) {
        filtroUsuario = '%';    
    }

    // Creo un objeto con los parámetros
    const parametros = {
        filtro: filtroUsuario
    };

    enviarFormularioFetch(parametros);
}

/**  
 * Recibe como argumento el objeto con los parámetros
 * envía petición JSON
 */
function enviarFormularioFetch(parametros) {
  
    fetch(_url_tabla_json, {
      method: 'POST', // or 'PUT'
      body: JSON.stringify(parametros), // data can be `string` or {object}!
      headers:{
        'Content-Type': 'application/json'
      }
    })
    .then(res => res.json())
    .catch(error => console.error('Error:', error))
    .then(response => mostrarResultado(response));
}

/** 
 * Muestra el resultado en la página del clietne.
 */
function mostrarResultado(resultado) {    
    document.getElementById('resultado').innerHTML =
        json2html.render(resultado, _plantilla_tabla);
}