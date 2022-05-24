"use strict";

const __URL_AJAX_CARRITO = 'ajax.php?script=carrito';

function actualizarContadorCarrito(unidades) {
    let contadorCarrito = Number($('.contadorCarrito').first().text().trim());

    contadorCarrito += unidades;
    $('.contadorCarrito').text(contadorCarrito);
}

function añadirProductoCarrito(id_producto, unidades, onOK, onError) {
    // Objeto
    const parametros = {
        id_producto: id_producto,
        unidades: unidades
    };

    fetch(
        __URL_AJAX_CARRITO, 
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
          // Gestionar la respuesta
      });
}