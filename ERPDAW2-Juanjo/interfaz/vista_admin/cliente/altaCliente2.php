<!--
    Implementa las validaciones de formulario basánsose en el API de valiidaciones de html
    junto con las posibilidades de bootstrap.
-->
<script src="js/formulario-bootstrap.js" defer></script>
<script src="js/combo_ajax.js" defer></script>
<script>
    window.addEventListener("load", function () {

        // Asigna los eventos a los elementos en el formulario.
        fInicializarFormulario(document.forms.altaCliente);

        // Carga Combo. Versión jQuery+HTML. 
        
        // Inicialización
        $.post(
                "ajax.php?script=comboPoblacionesHTML", 
                { provincia: $('#provincia').val() }, function(data) {
                    $("#poblacion").html(data);
                }
        );			

        // Cuando se selecciona la provincia
        $("#provincia").on('change', function () {
            $("#provincia option:selected").each(function () {
                
                // Hace referencia al elemento actual
                provincia = $(this).val();
                
                // Llamada AJAX a nuesro combo
                $.post("ajax.php?script=comboPoblacionesHTML", { provincia: provincia }, function(data) {
                    $("#poblacion").html(data);
                });			
            });
        });        


        // Carga Combo. Versión fetch
        // Inicialización
        fetch('ajax.php?script=comboPoblacionesHTML&provincia='+$('#provincia2').val())
            .then(response => { return response.text(); })
            .then(html => { $("#poblacion2").html(html); });

        // Carga cuando cambia el selecto
        document.getElementById("provincia2").addEventListener('change', function (evento) {
            
            let provincia = evento.target.value;

            fetch('ajax.php?script=comboPoblacionesHTML&provincia='+provincia)
                .then(response => { return response.text(); })
                .then(html => { $("#poblacion2").html(html); });
        });
        

        /*// Carga Combo. Versión FETCH+JSON

        // Inicialización
        let provincia = document.getElementById('provincia3').value;
        fetch('ajax.php?script=comboPoblacionesJSON', {
            method: 'POST', 
            body: JSON.stringify({ provincia: provincia}), 
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

            document.getElementById("poblacion3").innerHTML = html;
        });


        // Carga cuando cambia el selecto
        document.getElementById("provincia3").addEventListener('change', function (evento) {
            
            let provincia = evento.target.value;

            fetch('ajax.php?script=comboPoblacionesJSON', {
                method: 'POST', 
                body: JSON.stringify({ provincia: provincia}), 
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

                document.getElementById("poblacion3").innerHTML = html;
            });
        });*/

        inicializarCombo('provincia3', 'ajax.php?script=comboPoblacionesJSON', 'poblacion3')

    });
    
</script>

<h1>Alta de un nuevo Cliente</h1>

<!-- 
    needs-validation indica que este formulario se va a validar
    novalidate desactiva el feedback por defecto del navegador. Se usará el feedback de bootstrap
-->
<form id="formAltaCliente" class="container needs-validation" name="altaCliente" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaCliente.php" novalidate>

    <div class="mx-auto">
        
            <!-- Nombre y apellidos. Pongo las propiedades para que esté en la misma 
                línea o uno encima de otro si no caben -->
        <div class="row">
            <!-- col-md-4 ocupa cuatro posiciones de 12 y en el breakpoint md pasa de apilado a horizontal -->
            <div class="col-md-4 mb-1">
                <label for="nombre" class="form-label">Nombre</label>
                <input id="nombre" name="nombre" type="text" class="form-control bg-darkgrey text-lightgrey" id="nombre" placeholder="Nombre" maxlength="15" validacion="nombre" required>
                <div id="Name" class="form-text"></div>
            </div>

            <div class="col-md-4 mb-1">
                <label for="apellido1" class="form-label">Primer apellido</label>
                <input id="apellido1" name="apellido1" type="text" class="form-control bg-darkgrey text-lightgrey" id="apellido1" placeholder="Primer apellido"
                    maxlength="20" validacion="apellido" required>
                <div id="ape1" class="form-text"></div>
            </div>

            <div class="col-md-4 mb-1">
                <label for="apellido2" class="form-label">Segundo apellido</label>
                <input id="apellido2" name="apellido2" type="text" class="form-control bg-darkgrey text-lightgrey" id="apellido2" placeholder="Segundo apellido"
                    maxlength="20" validacion="apellido" required>
                <div id="ape2" class="form-text"></div>
            </div>
        </div>

        
        <div class="row">
            <!-- NIF. Estoy editando este campo 
                    required deja que el navegador compruebe si está vacío el campo
                    has-warning permite que se muestr el borde rojo en caso de error
                    invalid-feedback se muestra cuando está activo was-validated y el campo tiene la clase is-invalid
                -->
            <div class="col-md-3 mb-1">
                <label for="nif" class="form-label"> NIF</label>
                <input id="nif" name="nif" type="text" class="form-control has-validation bg-darkgrey text-lightgrey" placeholder="NIF" maxlength="10" validacion="nifCliente" required>
                <div class="invalid-feedback">
                    Introduce el NIF incluyendo la letra
                </div>
            </div>


            <div class="col-md-6 mb-1">
                <label for="numCta" class="form-label">Número de cuenta</label>    
                <input id="numCta" name="numCta" type="text" class="form-control bg-darkgrey text-lightgrey" id="numCta" placeholder="Número de Cuenta"
                    maxlength="30" required>
                <div id=nCta class="form-text"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-5">
                <label for="conocio" class="form-label">Como nos conocio</label>
                <input id="conocio" name="conocio" type="text" class="form-control bg-darkgrey text-lightgrey" id="exampleFormControlTextarea1" rows="3">
            </div>
        </div>

        <fieldset class="form-group p-3" title="Datos de la oficina física más cercana">
            <legend class="w-auto px-2">Escoge la oficina física asociada al cliente (jQuery)</legend>
            <div class="col-md-3 mb-5">
                <label for="provincia" class="form-label">Provincia</label>
                <select name="provincia" id="provincia" class="form-control">
                    <option value="1">Cáceres</option>
                    <option value="2">Badajoz</option>
                </select>                                
            </div>
            <div class="col-md-5 mb-5">
                <label for="poblacion" class="form-label">Población</label>
                <select name="poblacion" id="poblacion" class="form-control">
                </select>                                
            </div>
        </fieldset>

        <fieldset class="form-group p-3" title="Datos de la oficina física más cercana">
            <legend class="w-auto px-2">Escoge la oficina física asociada al cliente (Fetch)</legend>
            <div class="col-md-3 mb-5">
                <label for="provincia2" class="form-label">Provincia</label>
                <select name="provincia2" id="provincia2" class="form-control">
                    <option value="1">Cáceres</option>
                    <option value="2">Badajoz</option>
                </select>                                
            </div>
            <div class="col-md-5 mb-5">
                <label for="poblacion2" class="form-label">Población</label>
                <select name="poblacion2" id="poblacion2" class="form-control">
                </select>                                
            </div>
        </fieldset>

        <fieldset class="form-group p-3" title="Datos de la oficina física más cercana">
            <legend class="w-auto px-2">Escoge la oficina física asociada al cliente (Fetch+JSON)</legend>
            <div class="col-md-3 mb-5">
                <label for="provincia3" class="form-label">Provincia</label>
                <select name="provincia3" id="provincia3" class="form-control">
                    <option value="1">Cáceres</option>
                    <option value="2">Badajoz</option>
                </select>                                
            </div>
            <div class="col-md-5 mb-5">
                <label for="poblacion3" class="form-label">Población</label>
                <select name="poblacion3" id="poblacion3" class="form-control">
                </select>                                
            </div>
        </fieldset>

        <input name="alta" type="hidden" value="0">
        <button name="botonAlta" value="Guarda" type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
	<?php 
		if (isset($_POST['alta']) && $_POST['alta'] == 1) {
			//Esto significa que el usuario ha pulsado el botón submit

			$tCliente=Clientes::singletonClientes();
			$nombre=$_POST['nombre'];
            $apellido1=$_POST['apellido1'];
            $apellido2=$_POST['apellido2'];
            $nif= $_POST['nif'];
            $numCta=$_POST['numCta'];
            $comoNosConocio=$_POST['conocio'];           

			//testear que no se repitan nombres de clientes;
			$id=1;//cualquier valor porque lo genera la bd
			$idCliente=1;//algoritmo que elabore el idCliente
            $idUsuario=1;//algoritmo que elabore el idUsuario
			$activo=1;//constante cada ve que se trate de dar de alta una nueva familia (pr defecto)
			

			$f=new Cliente($id, $idCliente, $idUsuario, $nombre, $apellido1, $apellido2, $nif, $numCta, $comoNosConocio, $activo);

			$insertado=$tCliente->addUnCliente($f);

			if ($insertado) {
				
				echo "Se ha insertado satisfactoriamente";
			}else{
				echo "Ha habido algun error en la insercion del cliente";
			}
		}


	 ?>





