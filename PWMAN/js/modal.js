"use strict";

const __MODAL_ALERT = `
<div class="modal fade text-black" id="modalAlert" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Aviso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
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
                <h5 class="modal-title" id="modalAddBackdropLabel">Añadir un nuevo registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" name="altaContraseña" id="altaContraseña" method="POST" novalidate>
                    <div class="mx-auto pb-3">
                        <div class="mb-3">
                            <label class="form-label">Nombre del sitio</label>
                            <input name="nombre" type="text" class="form-control has-validation" id="nombre" placeholder="Nombre del sitio" maxlength="30" validacion="nombre" required>
                            <div class="form-text invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cuenta de usuario</label>
                            <input name="usuario" type="text" class="form-control has-validation" id="usuario" placeholder="Cuenta de usuario" maxlength="30" validacion="usuario" required>
                            <div class="form-text invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL</label>
                            <input name="url" type="text" class="form-control has-validation" id="url" placeholder="URL" maxlength="50" validacion="url" required>
                            <div class="form-text invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input name="contraseña" type="password" class="form-control has-validation" id="contraseña" placeholder="Contraseña" maxlength="30" validacion="contraseña" required>
                            <div class="form-text invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Repite tu contraseña</label>
                            <input name="contraseña2" type="password" class="form-control has-validation" id="contraseña2" placeholder="Repite tu contraseña" maxlength="30" validacion="contraseña2" validacion_args="#contraseña" required>
                            <div class="form-text invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notas</label>
                            <textarea stype="text-area" name="notas" class="form-control" rows="3" id="notas" placeholder="Notas"></textarea> 
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

const __MODAL_CONTRASEÑA = `
<div class="modal fade text-black" id="modalContraseña" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Contraseña</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input id="contraseña4" type="password" class="form-control w-75 float-start" readonly>
                <button id="botonMostrar" type="button" class="btn btn-lightgrey bi bi-eye float-end">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
            </div>
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
                <form class="needs-validation" name="editarContraseña" id="editarContraseña" method="POST" novalidate>
                    <div class="mx-auto pb-3">
                        <div class="mb-3">
                            <label class="form-label">Nombre del sitio</label>
                            <input name="nombre2" type="text" class="form-control" id="nombre2" placeholder="Nombre del sitio" maxlength="30" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cuenta de usuario</label>
                            <input name="usuario2" type="text" class="form-control" id="usuario2" placeholder="Cuenta de usuario" maxlength="30" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL</label>
                            <input name="url2" type="text" class="form-control" id="url2" placeholder="URL" maxlength="50" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input name="contraseña3" type="password" class="form-control has-validation" id="contraseña3" placeholder="Contraseña" maxlength="30" validacion="contraseña3" required>
                            <div id="contraseña3" class="form-text invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Repite tu contraseña</label>
                            <input name="contraseña4" type="password" class="form-control has-validation" id="contraseña4" placeholder="Repite tu contraseña" maxlength="30" validacion="contraseña4" validacion_args="#contraseña3" required>
                            <div id="repiteContraseña3" class="form-text invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notas</label>
                            <textarea stype="text-area" name="notas2" class="form-control" rows="3" id="notas2" placeholder="Notas"></textarea> 
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

const __MODAL_ELIMINAR = `
<div class="modal fade" id="modalEliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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

function mostrarModalAdd(accion) {
    if (!$('#modalAdd').length) {
        $('body').append(__MODAL_AÑADIR);
    }

    fInicializarFormulario($("#altaContraseña")[0]);

    $('#modalAdd #botonEnviar').on('click', () => {
        accion();
        $('#modalAdd #botonEnviar').off('click');
        $('#modalAdd').modal('hide');
    });

    $('#modalAdd').modal('show');
}

function mostrarModalContraseña(contraseña) {
    if (!$('#modalContraseña').length) {
        $('body').append(__MODAL_CONTRASEÑA);
    }

    $('#contraseña4').val(contraseña);

    $('#botonMostrar').on('mousedown', mouseDown);
    $('#botonMostrar').on('mouseup', mouseUp);
    
    $('#modalContraseña').modal('show');
}

function mostrarModalEdit(nombre, usuario, url, contraseña, notas, accion) {
    if (!$('#modalEdit').length) {
        $('body').append(__MODAL_EDITAR);
    }

    $('#nombre2').val(nombre);
    $('#usuario2').val(usuario);
    $('#url2').val(url);
    $('#contraseña3').val(contraseña);
    $('#notas2').val(notas);

    fInicializarFormulario($("#editarContraseña")[0]);

    $('#modalEdit #botonEnviar2').on('click', () => {
        accion();
        $('#modalEdit #botonEnviar2').off('click');
        $('#modalEdit').modal('hide');
    });

    $('#modalEdit').modal('show');
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

function mouseDown() {
    $('#contraseña4').prop('type', 'text');
}

function mouseUp() {
    $('#contraseña4').prop('type', 'password');
}