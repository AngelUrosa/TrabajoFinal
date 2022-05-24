"use strict";
// Basado en documentación de validaciones de Bootstrap
// https://getbootstrap.com/docs/5.1/forms/validation/

window.addEventListener("load", function () {
    fInicializarFormulario(document.forms.altaPersona);
});

function fInicializarFormulario(formulario) {
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

        // Limpia los mensajes de error
        limpiarErrores(formulario);

        // En primer lugar, comprueba si se cumplen las restricciones de formulario. Por ejemplo, 
        // si todos los campos requeridos están incluidos
        formulario.checkValidity(); 

        // Errores que han ocurrido
        let numeroErrores = 0;

        // Obtener todos los campos en el formulario que tienen validacion
        // Y validarlos
        const elementos = document.querySelectorAll("input[validacion]");
        for(const e of elementos) {
                
            // Valida un campo
            numeroErrores += await validarElemento(e);
        }

        // Añade la clase indicando que ya se ha validado
        formulario.classList.add('was-validated');

        // Si no hay errores, envía el formulario
        if(numeroErrores == 0) {
            formulario.alta.value = '1';
            formulario.submit();
        }

    })();
}

async function fValidarCampo(evento) {
    validarElemento(evento.target);
}

/**
 * Valida un campo recibido como argumento y muestra el error que corresponda
 * 
 * @param {*} e 
 */
async function validarElemento(e) {
    
    let numeroErrores = 0;

    try {
        // Elimina el error
        $(e).removeClass('is-invalid');

        // Validación que se aplicaría al campo
        const validacion = e.attributes['validacion'].value;

        // Valor en el campo
        const valor = e.value;

        // Obtengo el resultado de la validación
        await window['validacion_'+validacion](valor);

    } catch(exception) {
         
        // Si no pasa la validación
         mostrarError(e, exception);
         numeroErrores++;
    }
   
    // Retorna el número de errores encontrados
    return numeroErrores;
}

/**
 * Muestra un mensaje de error
 * 
 * @param {*} error 
 */
function mostrarError(elemento, error) {
    $(elemento).addClass('is-invalid');
    $('#'+elemento.id+' + .invalid-feedback').text(error);
}

/**
 * Limpia los errores del formulario
 */
function limpiarErrores(formulario) {
    
    // Marca que el formulario no se ha validado
    formulario.classList.remove('was-validated');

    // Marca todos los elementos como válidos
    formulario.querySelectorAll("input[validacion]").forEach((elemento) => {
        $(elemento).removeClass('is-invalid');
    });        
}

//--------------------------------------------------------------------------
// Validaciones
//--------------------------------------------------------------------------

function validacion_novacio(campo) {
    if (campo.trim() == "") {
        throw "El campo está vacío";
    } else {
        throw "";
    }
    
}

/**
 * Valida un nombre. 
 * 
 * @param {*} v true si el nombre es válido o el mensaje de error.
 */
function validacion_nombre(v) {
    validacion_novacio(v);

    // throw "El nombre no es válido";
}

/**
 * Valida un apellido. 
 * 
 * @param {*} v true si el apellidos es válido o el mensaje de error.
 */
function validacion_apellido1(v) {
    validacion_novacio(v);

    //throw "El apellido no es válido";
}

function validacion_apellido2(v) {
    validacion_novacio(v);

    //throw "El apellido no es válido";
}

/**
 * Valida que el nif es correccto. Para ello comprueba la letra de control
 * @param {*} v 
 */
function validacion_nif(v) {
    validacion_novacio(v);
}

/**
 * Valida que el nif es correccto. Para ello comprueba la letra de control
 * @param {*} v 
 */
function validacion_iban(v) {
    validacion_novacio(v);
}

/**
 * Código postal
 * 
 * @param {*} v 
 */
 function validacion_codigoPostal(v) {
    //throw "El código postal introducido no es correcto";
}

/**
 * móvil
 * 
 * @param {*} v 
 */
function validacion_telefonoMovil(v) {
    return true;
}

/**
 * Valida que el NIF pasado como argumento no existe en la base de datos de clientes.
 * 
 * @param {*} v 
 * @returns 
 */
async function validacion_nifCliente(v) {
    validacion_nif(v);

    // Si el NIF es correcto, valido que el cliente no exista.
    const parametros = {
        nif: v
    };
   
    const respuesta = await fetch('ajax.php?script=validacion_clienteExiste', {
        
        method: 'POST', 
        body: JSON.stringify(parametros), 
        headers:{
            'Content-Type': 'application/json'
        }
    });
    const objeto = await respuesta.json();

    if(objeto.resultado) {
        throw 'El cliente ya existe';
    }
}
