<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de un nuevo cliente</title>
</head>
<body>
	<h1>Alta de un nuevo Cliente</h1>
	
	<form name="altaCliente" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/Cliente/altaCliente.php">
	<div class="mx-auto">
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Nombre Cliente</label>
  <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre" maxlength="15">
  <div id=Name class="form-text" ></div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Primer apellido</label>
  <input name="apellido1" type="text" class="form-control" id="apellido1" placeholder="Primer apellido" maxlength="20">
  <div id=ape1 class="form-text" ></div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Segundo apellido</label>
  <input name="apellido2" type="text" class="form-control" id="apellido2" placeholder="Segundo apellido" maxlength="20">
  <div id=ape2 class="form-text" ></div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">NIF</label>
  <input name="NIF" type="text" class="form-control" id="NIF" placeholder="NIF" maxlength="10">
  <div id=nif class="form-text" ></div>
</div>
<div class="mb-31">Número de cuenta</label>
  <input name="numCta" type="text" class="form-control" id="numCta" placeholder="Número de Cuenta" maxlength="30">
  <div id=nCta class="form-text" ></div>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Como nos conocio</label>
  <textarea stype="text-area" name="conocio" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Como nos conocio"></textarea> 
</div>
<button name="alta" value="Guarda" type="submit" class="btn btn-primary">Guardar</button>
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