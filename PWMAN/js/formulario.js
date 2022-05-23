"use strict";

function fInicializarFormulario(formulario) {
    // Limpia los mensajes de error
    limpiarErrores(formulario);
    formulario.addEventListener("submit", fValidarFormulario);
    formulario.querySelectorAll("#"+formulario.id+" [validacion]").forEach((c) => {
        fInicializarElemento(c);
    });
}

function fInicializarElemento(elemento) {
    elemento.addEventListener("blur", fValidarCampo);
}

function fValidarFormulario(evento) {
    // No se envía el formulario
    evento.preventDefault();

    (async function () {

        // Formulario
        const formulario = evento.target;

        // En primer lugar, comprueba si se cumplen las restricciones de formulario
        formulario.checkValidity();

        // Errores que han ocurrido
        let numeroErrores = 0;

        // Obtener todos los campos en el formulario que tienen validacion
        const elementos = document.querySelectorAll("input[validacion]");
        for(const e of elementos) {
            // Valida un campo
            numeroErrores += await validarElemento(e);
        }

        // Añade la clase indicando que ya se ha validado
        formulario.classList.add('was-validated');

        // Si no hay errores, envía el formulario
        if (numeroErrores != 0) {
            formulario.alta.value = '1';
            formulario.submit();
        } else {
            console.log('Hay errores');
        }
    })();
}

async function fValidarCampo(evento) {
    validarElemento(evento.target);
}

async function validarElemento(e) {
    let numeroErrores = 0;

    try {
        // Validación que se aplicaría al campo
        const validacion = e.attributes['validacion'].value;

        // Valor en el campo
        const valor = e.value;

        if(e.attributes['validacion_args']) {
            var validacion_args = e.attributes['validacion_args'].value;
        }

        // Obtengo el resultado de la validación
        await window['validacion_'+ validacion](valor, validacion_args, e);

        // Elimina el error
        $(e).removeClass('is-invalid');
    } catch(exception) {
        // Si no pasa la validación
         mostrarError(e, exception);
         numeroErrores++;
    }
   
    // Retorna el número de errores encontrados
    return numeroErrores;
}

function mostrarError(elemento, error) {
    $(elemento).addClass('is-invalid');
    $('#'+elemento.id+' + .invalid-feedback').text(error);
}

function limpiarErrores(formulario) {
    // Marca que el formulario no se ha validado
    formulario.classList.remove('was-validated');

    // Marca todos los elementos como válidos
    formulario.querySelectorAll("input[validacion]").forEach((elemento) => {
        $(elemento).removeClass('is-invalid');
    });        
}

function campoVacio(v) {
    if (v.toString().trim() == "") {
        throw "El campo está vacío";
    } 
}

function validarContraseña(v, contraseñaOriginal) {
    if ($(contraseñaOriginal)[0].value != v) {
        throw 'Las contraseñas no coinciden';
    }
}

function validacion_nombre(v) {
    campoVacio(v);
}

function validacion_usuario(v) {
    campoVacio(v);
}

function validacion_url(v) {
    campoVacio(v);
    if (v.toString().slice(0, 5) != 'https') {
        throw 'La URL debe empezar por https';
    }
}

function validacion_contraseña(v) {
    campoVacio(v);
}

function validacion_contraseña2(v, contraseñaOriginal) {
    campoVacio(v);
    validarContraseña(v, contraseñaOriginal);
}

function validacion_contraseña4(v, contraseñaOriginal) {
    campoVacio(v);
    validarContraseña(v, contraseñaOriginal);
}