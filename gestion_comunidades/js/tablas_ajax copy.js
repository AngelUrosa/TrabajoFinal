"use strict";

const url = 'ajax/getTablaPersonas.php';

const html = "<thead class = 'table text-white bg-success'>"+
"<tr>"+
    " <th scope='col'>Id_Persona</th>"+
     "<th scope='col'>Nif</th>"+
     "<th scope='col'>id_Comunidad</th>"+
     "<th scope='col'>Usuario</th>"+
     "<th scope='col'>Contraseña</th>"+
     "<th scope='col'>Email</th>"+
     "<th scope='col'>Trabajador</th>"+
    " </tr>"+
    " </thead>"
const plantilla = {
    '<>': 'tr','html': [
        {'<>': 'td','html': '${id_persona}'},
        {'<>': 'td','html': '${nif}'},
        {'<>': 'td','html': '${id_comunidad}'},
        {'<>': 'td','html': '${usuario}'},
        {'<>': 'td','html': '${contraseña}'},
        {'<>': 'td','html': '${email}'},
        {'<>': 'td','html': '${trabajador}'},
    ]
};

/**
 * Recibe como argumento el objeto con los parametros
 * envia peticion JSON
 */

//Inicializa el API
window.addEventListener('load', inicializarTabla);

function inicializarTabla() {
    //Asgina los eventos
    document.forms.configuracionTabla.addEventListener('submit', enviarFormulario);
    
    enviarFormulario();
}

//Creo un objeto on los parámetros
function enviarFormulario(evento) {
    //Cancela el handle por defecto
    if (evento) {
        evento.preventDefault();
    }
   
    //Calcula el filtro

    let filtroUsuario = document.forms.configuracionTabla.filtro.value.trim();
    if(filtroUsuario.length == 0){
        filtroUsuario = '%';
    }

    //Crea un objeto con los parámetros
    const parametros = {
        filtro: filtroUsuario
    };
    enviarFormularioFetch(parametros);
}

function enviarFormularioFetch(parametros) {
    fetch(url, {
            method: 'POST',
            body: JSON.stringify(parametros),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .catch(error => console.error('ERROR', error))
        .then(response => mostrarResultado(response));
}

/*
 * Muestra el resultado en la página del cliente.
 */
function mostrarResultado(resultado) {
    document.getElementById('resultado').innerHTML = html +
    json2html.render(resultado, plantilla);
}