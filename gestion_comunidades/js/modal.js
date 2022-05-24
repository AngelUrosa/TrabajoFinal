"use strict";

const __MODAL_ALERT = `
<div class="modal fade" id="modalAlert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Advertencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-darkgreen" data-bs-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
`;

const __MODAL_ELIMINAR = `
<div class="modal fade" id="modalEliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEliminarBackdropLabel">Advertencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Contenido
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lightgrey" data-bs-dismiss="modal">Cancelar</button>
        <button id="botonBorrar" type="button" class="btn btn-danger">Borrar</button>
      </div>
    </div>
  </div>
</div>
`;

function mostrarAlert(texto) {
    // Si no tengo insertado el alert lo inserto en el cuerpo
    if (!$('#modalAlert').length) {
        $('body').append(__MODAL_ALERT);
    }

    // Asigno el texto recibido como argumento
    $('#modalAlert .modal-body').html(texto);

    // Muestro el alert
    $('#modalAlert').modal('show');
}

function mostrarModalEliminar(texto, accion) {
  // Si no tengo insertado el alert lo inserto en el cuerpo
  if (!$('#modalEliminar').length) {
    $('body').append(__MODAL_ELIMINAR);
  }

  // Asigno el texto recibido como argumento
  $('#modalEliminar .modal-body').html(texto);

  // Asigno el evento
  $('#modalEliminar #botonBorrar').on('click', (evento) => {
    // Llama a la función pasada como argumento en acción
    accion();

    // Desactiva el gestor de eventos. Tendremos que añadirlo la próxima vez
    $('#modalEliminar #botonBorrar').off('click');

    // Oculto el modal
    $('#modalEliminar').modal('hide');
  });

  // Muestro el modal
  $('#modalEliminar').modal('show');
}
