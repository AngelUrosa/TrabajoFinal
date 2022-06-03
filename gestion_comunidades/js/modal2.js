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
const __MODAL_AÑADIR = `
<div class="modal fade text-black" id="modalAdd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddBackdropLabel">Añadir una nueva Persona</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" name="altaPersona" id="altaPersona" method="POST" novalidate>
                    <div class="mx-auto pb-3">
                        <div class="mb-3">
                            <label class="form-label">NIF</label>
                            <input name="nif" type="text" class="form-control has-validation" id="nif" placeholder="nif"  required>
                            <div class="form-text invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID Comunidad</label>
                            <input name="idComunidad" type="text" class="form-control has-validation" id="idComunidad" placeholder="ID COMUNIDAD"" required>
                            <div class="form-text invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Usuario</label>
                            <input name="usuario" type="text" class="form-control has-validation" id="usuario" placeholder="usuario" required>
                            <div class="form-text invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input name="contraseña" type="password" class="form-control has-validation" id="contraseña" placeholder="Contraseña" required>
                            <div class="form-text invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control has-validation" id="email" placeholder="email"  required>
                            <div class="form-text invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Trabajador</label>
                            <input name="trabajador" type="text" class="form-control has-validation" id="trabajador" placeholder="trabajador"  required>
                            <div class="form-text invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="botonCancelar" type="button" class="btn btn-lightgrey" data-bs-dismiss="modal">Cancelar</button>
                    <button id="botonEnviar" type="button" class="btn btn-primary botonEnviar">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>
`;
const __MODAL_EDITAR = `
<div class="modal fade text-black" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditBackdropLabel">Editar un registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" name="editarPersona" id="editarPersona" method="POST" novalidate>
                <div class="mx-auto pb-3">
                <div class="mb-3">
                    <label class="form-label">ID PERSONA</label>
                    <input name="idPersona2" type="text" class="form-control has-validation" id="idPersona2" placeholder="ID PERSONA" required disabled>
                    <div class="form-text invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">NIF</label>
                    <input name="nif2" type="text" class="form-control has-validation" id="nif2" placeholder="nif"  required>
                    <div class="form-text invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Comunidad</label>
                    <input name="idComunidad2" type="text" class="form-control has-validation" id="idComunidad2" placeholder="ID COMUNIDAD"" required>
                    <div class="form-text invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input name="usuario2" type="text" class="form-control has-validation" id="usuario2" placeholder="usuario" required>
                    <div class="form-text invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input name="contraseña2" type="password" class="form-control has-validation" id="contraseña2" placeholder="Contraseña" required>
                    <div class="form-text invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email2" type="email" class="form-control has-validation" id="email2" placeholder="email"  required>
                    <div class="form-text invalid-feedback"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Trabajador</label>
                    <input name="trabajador2" type="text" class="form-control has-validation" id="trabajador2" placeholder="trabajador"  required>
                    <div class="form-text invalid-feedback"></div>
                </div>
            </div>
        </div>
                <div class="modal-footer">
                    <button id="botonCancelar2" type="button" class="btn btn-lightgrey" data-bs-dismiss="modal">Cancelar</button>
                    <button id="botonEnviar2" type="button" class="btn btn-primary botonEnviar2">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
`;

// function mostrarAlert(texto) {
//   // Si no tengo insertado el alert lo inserto en el cuerpo
//   if (!$('#modalAlert').length) {
//     $('body').append(__MODAL_ALERT);
//   }

//   // Asigno el texto recibido como argumento
//   $('#modalAlert .modal-body').html(texto);

//   // Muestro el alert
//   $('#modalAlert').modal('show');
// }

// function mostrarModalEliminar(texto, accion) {
//   // Si no tengo insertado el alert lo inserto en el cuerpo
//   if (!$('#modalEliminar').length) {
//     $('body').append(__MODAL_ELIMINAR);
//   }

//   // Asigno el texto recibido como argumento
//   $('#modalEliminar .modal-body').html(texto);

//   // Asigno el evento
//   $('#modalEliminar #botonBorrar').on('click', (evento) => {
//     // Llama a la función pasada como argumento en acción
//     accion();

//     // Desactiva el gestor de eventos. Tendremos que añadirlo la próxima vez
//     $('#modalEliminar #botonBorrar').off('click');

//     // Oculto el modal
//     $('#modalEliminar').modal('hide');
//   });

//   // Muestro el modal
//   $('#modalEliminar').modal('show');
// }

// function mostrarModalAdd(accion) {
//   if (!$('#modalAdd').length) {
//     $('body').append(__MODAL_AÑADIR);
//   }

//   // fInicializarFormulario($("#altaPersona")[0]);

//   $('#modalAdd #botonEnviar').on('click', () => {
//     accion();
//     $('#modalAdd #botonEnviar').off('click');
//     $('#modalAdd').modal('hide');
//   });

//   $('#modalAdd').modal('show');
// }

// function mostrarModalEdit(idPersona, nif, idComunidad, usuario, contraseña, email, trabajador, accion) {
//   if (!$('#modalEdit').length) {
//     $('body').append(__MODAL_EDITAR);
//   }

//   document.getElementById('idPersona2').value=idPersona;
//   document.getElementById('nif2').value=nif;
//   document.getElementById('idComunidad2').value=idComunidad;
//   document.getElementById('usuario2').value=usuario;
//   document.getElementById('contraseña2').value=contraseña;
//   document.getElementById('email2').value=email;
//   document.getElementById('trabajador2').value=trabajador;

//   // fInicializarFormulario($("#editarPersona")[0]);

//   $('#modalEdit #botonEnviar2').on('click', () => {
//     accion();
//     $('#modalEdit #botonEnviar2').off('click');
//     $('#modalEdit').modal('hide');
//   });

//   $('#modalEdit').modal('show');
// }
function mostrarAlert(texto) {
  // Si no tengo insertado el alert lo inserto en el cuerpo
  if (!document.getElementById('modalAlert').length) {
    document.getElementById('body').append(__MODAL_ALERT);
  }

  // Asigno el texto recibido como argumento
  $document.getElementById('modalAlert .modal-body').html(texto);

  // Muestro el alert
  document.getElementById('modalAlert').modal('show');
}

function mostrarModalEliminar(texto, accion) {
    // Si no tengo insertado el alert lo inserto en el cuerpo
    if (!document.getElementById('modalEliminar').length) {
        document.getElementById('body').append(__MODAL_ELIMINAR);
    }

    // Asigno el texto recibido como argumento
    document.getElementById('modalEliminar .modal-body').html(texto);

    // Asigno el evento
    document.getElementById('modalEliminar botonBorrar').addEventListener('click', (evento) => {
        // Llama a la función pasada como argumento en acción
        accion();

        // Desactiva el gestor de eventos. Tendremos que añadirlo la próxima vez
        document.getElementById('modalEliminar botonBorrar').off('click');

        // Oculto el modal
        document.getElementById('modalEliminar').modal('hide');
    });

    // Muestro el modal
    document.getElementById('modalEliminar').modal('show');
}

function mostrarModalAdd(accion) {
    if (!document.getElementById('modalAdd').length) {
        document.getElementById('body').append(__MODAL_AÑADIR);
    }

    //fInicializarFormulario($("#altaPersona")[0]);

    document.getElementById('modalAdd botonEnviar').addEventListener('click', () => {
        accion();
        document.getElementById('modalAdd botonEnviar').off('click');
        document.getElementById('modalAdd').modal('hide');
    });

    document.getElementById('modalAdd').modal('show');
}

function mostrarModalEdit(nif, usuario, contraseña, email, accion) {
  if (!document.getElementById('modalEdit').length) {
    document.getElementById('body').append(__MODAL_EDITAR);
  }

   document.getElementById('idPersona2').value=idPersona;
   document.getElementById('nif2').value=nif;
   document.getElementById('idComunidad2').value=idComunidad;
   document.getElementById('usuario2').value=usuario;
   document.getElementById('contraseña2').value=contraseña;
   document.getElementById('email2').value=email;
   document.getElementById('trabajador2').value=trabajador;

  // fInicializarFormulario($("#editarPersona")[0]);

  document.getElementById('modalEdit botonEnviar2').addEventListener('click', () => {
    accion();
    document.getElementById('modalEdit botonEnviar2').off('click');
    document.getElementById('modalEdit').modal('hide');
  });

  document.getElementById('modalEdit').modal('show');
}