"use strict";

function fValidarFormulario(evento) {

    // No se envía el formulario
    evento.preventDefault();

    (async function () {

        // Formulario
        const formulario = evento.target;

        // Obtener todos los campos en el formulario que tienen validacion
        const elementos = document.querySelectorAll("input[validacion]");

        // Errores que han ocurrido
        let numeroErrores = 0;

        // Limpia los mensajes de error
        limpiarErrores();

        // Validar cada uno de los campos
        for(const e of elementos) {
            
            // Valido un elemento
            const resultado = await validarElemento(e);

            // Compruebo si ha pasado la validación
            if(resultado != true) {           
                mostrarError(e, resultado);
                numeroErrores++;
            }  
        }

        // Si no hay errores, envía el formulario
        if(numeroErrores == 0) {
            formulario.alta.value = '1';
            formulario.submit();
        }

    })();
}

/**
 * Valida un campo recibido como argumento y muestra el error que corresponda
 * 
 * @param {*} e 
 */
function validarElemento(e) {
    
    // Validación que se aplicaría al campo
    const validacion = e.attributes['validacion'].value;

    // Valor en el campo
    const valor = e.value;

    // Obtengo el resultado de la validación
    const resultado = window['validacion_'+validacion](valor);

    return resultado;
}

/**
 * Muestra un mensaje de error
 * 
 * @param {*} error 
 */
function mostrarError(elemento, error) {
    $( elemento ).after( "<p class='error'>"+error+"</p>" );
}

/**
 * Limpia los errores del formulario
 */
function limpiarErrores() {
    $('.error').remove();
}

//--------------------------------------------------------------------------
// Validaciones
//--------------------------------------------------------------------------

function validacion_novacio(v) {
    return true || "El nombre no es válido";
}

/**
 * Valida un nombre. 
 * 
 * @param {*} v true si el nombre es válido o el mensaje de error.
 */
function validacion_nombre(v) {
    return true || "El nombre no es válido";
}

/**
 * Valida un apellido. 
 * 
 * @param {*} v true si el apellidos es válido o el mensaje de error.
 */
function validacion_apellido(v) {
    return true ||  "El apellidos no es válido";
}

/**
 * Valida que el nif es correccto. Para ello comprueba la letra de control
 * @param {*} v 
 */
function validacion_nif(v) {
    return true;
}

/**
 * Valida que el nif es correccto. Para ello comprueba la letra de control
 * @param {*} v 
 */
function validacion_iban(v) {
    return true;
}

/**
 * Código postal
 * 
 * @param {*} v 
 */
 function validacion_codigoPostal(v) {
    return true;
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
    
    let r = validacion_nif(v);
    if(r != true) {
        return r;
    }

    // Si el NIF es correcto, valido que el cliente no exista.
    const parametros = {
        nif: v
    };
   
    const respuesta = await fetch('ajax/validacion_clienteExiste.php', {
        
        method: 'POST', 
        body: JSON.stringify(parametros), 
        headers:{
            'Content-Type': 'application/json'
        }
    });
    const objeto = await respuesta.json();

    if(objeto.resultado) {
        return 'El cliente ya existe';
    }

    return true;
}