<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/formulario-bootstrap.js" defer></script>
	<title>Formulario de Alta de un nuevo cliente</title>
</head>
<body>
	<h1 class="text-darkgrey"><strong>Alta de un nuevo cliente</strong></h1>
	<form class="needs-validation" name="altaCliente" id="altaCliente" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/Cliente/altaCliente.php" novalidate>
		<div class="mx-auto">
			<div class="mb-3">
				<label class="form-label">Nombre del cliente</label>
				<input name="nombre" type="text" class="form-control has-validation bg-darkgrey text-lightgrey" id="nombre" placeholder="Nombre" maxlength="15" validacion="nombre"required>
				<div id=Name class="form-text invalid-feedback"></div>
			</div>
			<div class="mb-3">
				<label class="form-label">Primer apellido</label>
				<input name="apellido1" type="text" class="form-control has-validation bg-darkgrey text-lightgrey" id="apellido1" placeholder="Primer apellido" maxlength="20" validacion="apellido1" required>
				<div id=ape1 class="form-text invalid-feedback"></div>
			</div>
			<div class="mb-3">
				<label class="form-label">Segundo apellido</label>
				<input name="apellido2" type="text" class="form-control has-validation bg-darkgrey text-lightgrey" id="apellido2" placeholder="Segundo apellido" maxlength="20" validacion="apellido2" required>
				<div id=ape2 class="form-text invalid-feedback"></div>
			</div>
			<div class="mb-3">
				<label class="form-label">NIF</label>
				<input name="NIF" type="text" class="form-control has-validation bg-darkgrey text-lightgrey" id="NIF" placeholder="NIF" maxlength="10" validacion="nifCliente" required>
				<div id=nif class="form-text invalid-feedback"></div>
			</div>
			<div class="mb-3">Número de cuenta</label>
				<input name="numCta" type="text" class="form-control bg-darkgrey text-lightgrey" id="numCta" placeholder="Número de Cuenta" maxlength="30" validacion="iban" required>
				<div id=nCta class="form-text invalid-feedback"></div>
			</div>
			<div class="mb-3">
				<label class="form-label">¿Cómo nos conoció?</label>
				<textarea stype="text-area" name="conocio" class="form-control bg-darkgrey text-lightgrey" rows="3" placeholder="¿Cómo nos conoció?"></textarea> 
			</div>
			<button name="alta" value="Guarda" type="submit" class="btn btn-darkgreen"><i class="bi bi-check-circle-fill"></i> Guardar</button>
			<button class="btn btn-danger float-end" name="reset" type="reset"><i class="bi bi-x-circle-fill"></i> Borrar</button>
		</div>
	</form>
	<?php 


	
		if (isset($_POST['alta'])) {
			//Esto significa que el usuario ha pulsado el botón submit

			$tCliente=Clientes::singletonClientes();
			$nombre=$_POST['nombre'];
            $apellido1=$_POST['apellido1'];
            $apellido2=$_POST['apellido2'];
            $nif=$_POST['nif'];
            $numCta=$_POST['num_cta'];
            $comoNosConocio=$_POST['como_nos_conocio'];           

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


</body>
</html>
