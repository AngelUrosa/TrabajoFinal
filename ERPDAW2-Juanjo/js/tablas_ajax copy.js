"use strict";

const url = 'ajax/getTablaClientes.php';

const html = "<thead class = 'table text-white bg-success'>"+
"<tr>"+
    " <th scope='col'>Id_Cliente</th>"+
     "<th scope='col'>id_Usuario</th>"+
     "<th scope='col'>Nombre</th>"+
     "<th scope='col'>Primer Apellido</th>"+
     "<th scope='col'>Segundo Apellido</th>"+
     "<th scope='col'>NIF</th>"+
     "<th scope='col'>Nº cuenta</th>"+
     "<th scope='col'>Conocio</th>"+
     "<th scope='col'>Activo</th>"+
    " </tr>"+
    " </thead>"
const plantilla = {
    '<>': 'tr','html': [
        {'<>': 'td','html': '${id_cliente}'},
        {'<>': 'td','html': '${id_usuario}'},
        {'<>': 'td','html': '${nombre}'},
        {'<>': 'td','html': '${apellido1}'},
        {'<>': 'td','html': '${apellido2}'},
        {'<>': 'td','html': '${nif}'},
        {'<>': 'td','html': '${numcta}'},
        {'<>': 'td','html': '${como_nos_conocio}'},
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