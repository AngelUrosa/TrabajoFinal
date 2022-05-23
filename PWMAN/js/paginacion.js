"use strict";

function avanzarPagina() {
    const valor1 = $('#numeroPagina1')[0].innerHTML;
    const valor2 = $('#numeroPagina2')[0].innerHTML;
    const valor3 = $('#numeroPagina3')[0].innerHTML;

    $('#numeroPagina1')[0].innerHTML = Number (valor1) + 3;
    $('#numeroPagina2')[0].innerHTML = Number (valor2) + 3;
    $('#numeroPagina3')[0].innerHTML = Number (valor3) + 3;

    eliminarBotonesActivos();
}

function retrocederPagina() {
    const valor1 = $('#numeroPagina1')[0].innerHTML;
    const valor2 = $('#numeroPagina2')[0].innerHTML;
    const valor3 = $('#numeroPagina3')[0].innerHTML;

    if ($('#numeroPagina1')[0].innerHTML != 1) {
        $('#numeroPagina1')[0].innerHTML = Number (valor1) - 3;
        $('#numeroPagina2')[0].innerHTML = Number (valor2) - 3;
        $('#numeroPagina3')[0].innerHTML = Number (valor3) - 3;

        eliminarBotonesActivos();
    }
}

function mostrarPagina(evento) {
    if (evento.target.value == 1) {
        eliminarBotonesActivos();
        $('#numeroPagina1')[0].parentElement.className += ' active';
        const valor = $('#numeroPagina1')[0].innerHTML;
        mostrarTabla(valor);
    } else if (evento.target.value == 2) {
        eliminarBotonesActivos();
        $('#numeroPagina2')[0].parentElement.className += ' active';
        const valor = $('#numeroPagina2')[0].innerHTML;
        mostrarTabla(valor);
    } else if (evento.target.value = 3) {
        eliminarBotonesActivos();
        $('#numeroPagina3')[0].parentElement.className += ' active';
        const valor = $('#numeroPagina3')[0].innerHTML;
        mostrarTabla(valor);
    }
}

function mostrarTabla(valor) {
    valor = Number (valor) * 10;

    inicializarTabla(
        $('#configuracionTabla2')[0],
        $('#resultado2')[0],
        'ajax.php?script=getTablaRegistros',
        
        {'<>': 'tr','html': [
        {'<>': 'th','html': '${cuando}'},
        {'<>': 'th','html': '${nombre}'},
        ]},

        $('#filtroSelect2')[0],
        $('#filtro2')[0],
        valor
    );
}

function eliminarBotonesActivos() {
    $('#numeroPagina1')[0].parentElement.className = $('#numeroPagina1')[0].parentElement.className.replace(' active', '' );
    $('#numeroPagina2')[0].parentElement.className = $('#numeroPagina3')[0].parentElement.className.replace(' active', '' );
    $('#numeroPagina3')[0].parentElement.className = $('#numeroPagina3')[0].parentElement.className.replace(' active', '' );
}