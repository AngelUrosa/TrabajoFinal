"use strict";

// Funcion que inicializa un combo para que en funcion de otro input se refresque
// Asignar los eventos para cuando se modifica la opción seleccionada
// Hacer la llamada al servidor y cargar el combo destino

function inicializarCombo(idElementoOrigen, url, idElementoDestino) {
    // Obtiene las referencias a los elementos
    const elementoOrigen = document.getElementById(idElementoOrigen);
    const elementoDestino = document.getElementById(idElementoDestino);

    // Guarda en el elemento origen los datos que voy a necesitar
    elementoOrigen.elementoDestino = elementoDestino;
    elementoOrigen.url = url;

    // Inicialización
    elementoOrigen.addEventListener('change', onComboEventoRecibido);
    
    // Cargamos el combo
    cargarCombo(elementoOrigen);
}

function onComboEventoRecibido(evento) {
    cargarCombo(evento.target);
}

function cargarCombo(elementoOrigen) {
    const valor = elementoOrigen.value;
    const url = elementoOrigen.url;
    const elementoDestino = elementoOrigen.elementoDestino;

    fetch(url, {
        method: 'POST', 
        body: JSON.stringify({ parametro: valor}), 
        headers:{
            'Content-Type': 'application/json'
        }
    })
    .then(response => { 
        return response.json(); 
    })
    .then(objeto => { 
        const html = json2html.render(objeto, 
            {'<>': 'option', 'value': '${id}','html': '${nombre}'}
        );

        elementoDestino.innerHTML = html;
    });
}