"use strict";

function inicializarTabla(formulario, tabla, url, plantillaTabla, filtroSelect, filtro, valor) {
    //Asigna los eventos
    formulario.addEventListener('submit', enviarFormulario);

    // Guarda los objetos que necesita para llevar a cabo las operaciones con la tabla
    formulario.tablaResultado = tabla;
    formulario.url = url;
    formulario.plantillaTabla = plantillaTabla;
    formulario._filtroSelect = filtroSelect;
    formulario._filtro = filtro;
    formulario._valor = valor;

    enviarFormulario2(formulario, tabla, valor);
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
    let filtroUsuario = formulario._filtro.value.trim();
    let filtroSelect = (formulario._filtroSelect)? formulario._filtroSelect.value:undefined;
    let valor = formulario._valor;

    if (filtroUsuario.length == 0) {
        filtroUsuario = '%';    
    }

    // Creo un objeto con los parámetros
    const parametros = {
        filtro: filtroUsuario,
        valor: valor
    };

    if (filtroSelect) {
        parametros.filtroSelect = filtroSelect;
    }

    enviarFormularioFetch(formulario.url, parametros, tabla, formulario.plantillaTabla);
}

/**  
 * Recibe como argumento el objeto con los parámetros
 * envía petición JSON
 */
function enviarFormularioFetch(url, parametros, tabla, plantillaTabla) {
    fetch(
        url, {
            method: 'POST',
            body: JSON.stringify(parametros),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .catch(error => console.error('ERROR', error))
        .then(response => mostrarResultado(response, tabla, plantillaTabla));
    }

/*
 * Muestra el resultado en la página del cliente.
 */
function mostrarResultado(resultado, tabla, plantillaTabla) {
    tabla.innerHTML = json2html.render(resultado, plantillaTabla);
}
