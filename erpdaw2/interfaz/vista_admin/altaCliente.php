<script src="js/formulario.js" defer></script>
<script>
    window.addEventListener("load", function () {

        // Asigna los eventos a los elementos en el formulario.
        fInicializarFormulario(document.forms.altaCliente);
        fInicializarElemento(document.forms.altaCliente.nif);
    });
</script>

<h1>Alta de un nuevo Cliente</h1>

<form name="altaCliente" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaCliente.php">
    <div class="mx-auto">
        <div class="mb-31">
            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre" maxlength="15" validacion="nombre">
            <div id="Name" class="form-text"></div>
        </div>

        <div class="mb-31">
            <label for="exampleFormControlInput1" class="form-label">Primer apellido</label>
            <input name="apellido1" type="text" class="form-control" id="apellido1" placeholder="Primer apellido"
                maxlength="20" validacion="apellido">
            <div id=ape1 class="form-text"></div>
        </div>

        <div class="mb-31">
            <label for="exampleFormControlInput1" class="form-label">Segundo apellido</label>
            <input name="apellido2" type="text" class="form-control" id="apellido2" placeholder="Segundo apellido"
                maxlength="20" validacion="apellido">
            <div id=ape2 class="form-text"></div>
        </div>

        <div class="mb-31">
            <label for="exampleFormControlInput1" class="form-label"> NIF</label>
            <input type="text" name="nif" id="nif" class="form-control" placeholder="NIF" maxlength="10" validacion="nifCliente">
        </div>

        <div class="mb-31">Número de cuenta</label>
            <input name="numCta" type="text" class="form-control" id="numCta" placeholder="Número de Cuenta"
                maxlength="30">
            <div id=nCta class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Como nos conocio</label>
            <input type="text" name="conocio" class="form-control" id="exampleFormControlTextarea1" rows="3">
        </div>
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





