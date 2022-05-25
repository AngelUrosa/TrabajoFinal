<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de una nueva Persona</title>
</head>
<body>
	<h1>Alta de un nueva Persona</h1>	

	<form name="altaPersona" method="POST" action="index.php?principal=Intefaz\altaPersonas.php" novalidate>
		<div class="mx-auto">
			<div class="mb-31">
  			<label for="nif" class="form-label">NIF</label>
  			<input type="text" class="form-control" id="nif" name="nif">
		</div>
		
		<div class="mb-31">
  			<label for="idComunidad" class="form-label">Id Comunidad</label>
  			<input type="text" class="form-control" id="idComunidad" name="idComunidad"></input>
		</div>

		<div class="mb-31">
  			<label for="usuario" class="form-label">Usuario</label>
  			<input type="text" class="form-control" id="usuario" name="usuario"></input>
		</div>

		<div class="mb-31">
  			<label for="contraseña" class="form-label">Contraseña</label>
  			<input type="text" class="form-control" id="contraseña" name="contraseña"></input>
		</div>

		<div class="mb-31">
  			<label for="email" class="form-label">Email</label>
  			<input type="text" class="form-control" id="email" name="email"></input>
		</div>

		<div class="mb-31">
  			<label for="trabajador" class="form-label">Trabajador</label>
  			<input type="text" class="form-control" id="trabajador" name="trabajador"></input>
		</div>

	
		<br>
		<button name="alta" type="submit" class="btn btn-primary">Guardar</button>
		<button name="reset" type="reset" class="btn btn-warning">Limpiar Formulario</button>
	</div>
</form>
	

	<!-- <form name="altaFamilia" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaFamilia.php">
		Nombre: <input type="text" name="nombre">
		Descripción: <input type="text" name="descripcion">
		<input type="submit" name="alta" value="Guardar">
		<input type="reset" name="reset" value="Limpiar Formulario">

	</form> -->



<?php 
	if (isset($_POST['alta'])){
		//Estos significa que el usuario ha pulsado el botón submit

		$tPersona=Personas::singletonPersonas();
		$nif=$_POST['nif'];
		$idComunidad=$_POST['idComunidad'];
		$usuario=$_POST['usuario'];
		$contraseña=$_POST['contraseña'];
		$email=$_POST['email'];
		$trabajador=$_POST['trabajador'];

//testear que no se repitan nombres de familias
		//controlar la unicidad de nombres
		$idPersona=1; //cualquier valor xq lo genera la bd
		// $idEmpleado=1; ///algoritmo que elabore el idFamilia
		// $idDepartamento=1;
		// $idUsuario=1;
		// $activo=1; //constante cada vez que se trate de dar de alta una nueva familia (por defecto)

		if ($nif == null || $idComunidad == null || $usuario == null || $contraseña==null || $email==null || $trabajador==null) {
			echo "Tienes que completar los campos";
		} else {

			$p=new Persona($idPersona,$nif,$idComunidad,$usuario,$contraseña,$email,$trabajador);
			//pregunta de Alvaro
	
			$insertado=$tPersona->addUnaPersona($p);
	
			if ($insertado){
				echo "Se ha insertado satisfactoriamente";
			}
			else{
				echo "Ha habido algún error en la inserción del empleado";
			}
		}

	}


 ?>


</body>
</html>