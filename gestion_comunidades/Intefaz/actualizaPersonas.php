<?php 

 $tPersonas=Personas::singletonPersonas();
 //Voy a llamar a la persistencia y devolver un array de objetos (Hacer esto en la persistencia)
 $p=$tPersonas->getPersonaPorId($_GET["idpersona"]);
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario para actualizar una nueva Persona</title>
</head>
<body>
	<h1>Actualiza de un nueva Persona</h1>	
	<form name="altaPersona" method="POST" action="index.php?principal=Intefaz\actualizaPersonas.php" novalidate>
		<div class="mx-auto">

		<div class="mb-31">
  			<label for="idpersona" class="form-label">Id Persona</label>
  			<input type="text" class="form-control" id="idpersona" name="idpersona" disabled value="<?php echo $p->getIdPersona();  ?>">
		</div>

			<div class="mb-31">
  			<label for="nif" class="form-label">NIF</label>
  			<input type="text" class="form-control" id="nif" name="nif" value="<?php echo $p->getNif();  ?>">
		</div>
		
		<div class="mb-31">
  			<label for="idComunidad" class="form-label">ID Comunidad</label>
  			<input type="text" class="form-control" id="idComunidad" name="idComunidad" value="<?php echo $p->getIdComunidad();  ?>"></input>
		</div>

		<div class="mb-31">
  			<label for="usuario" class="form-label">Usuario</label>
  			<input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $p->getUsuario();  ?>"></input>
		</div>

		<div class="mb-31">
  			<label for="contraseña" class="form-label">Contraseña</label>
  			<input type="text" class="form-control" id="contraseña" name="contraseña" value="<?php echo $p->getContraseña();  ?>"></input>
		</div>

		<div class="mb-31">
  			<label for="email" class="form-label">Email</label>
  			<input type="text" class="form-control" id="email" name="email" value="<?php echo $p->getEmail();  ?>"></input>
		</div>

		<div class="mb-31">
  			<label for="trabajador" class="form-label">Trabajdor</label>
  			<input type="text" class="form-control" id="trabajador" name="trabajador" value="<?php echo $p->getTrabajador();  ?>"></input>
		</div>
		<br>
		<button name="actualiza" type="submit" class="btn btn-info">Actualiza</button>
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


////////////////////////////////////////////
	if (isset($_POST['actualiza'])){
		//Estos significa que el usuario ha pulsado el botón submit
		$tPersona=Personas::singletonPersonas();
		$idPersona=$_POST['idpersona'];
		$nif=$_POST['nif'];
		$idComunidad=$_POST['idComunidad'];
		$usuario=$_POST['usuario'];
		$contraseña=$_POST['contraseña'];
		$email=$_POST['email'];
		$trabajador=$_POST['trabajador'];


		if ($nif == null || $idComunidad == null || $usuario == null || $contraseña==null || $email==null || $trabajador==null) {
			echo "Tienes que completar los campos";
		} else {
			
			$p=new Persona($idPersona,$nif,$idComunidad,$usuario,$contraseña,$email,$trabajador);
	

			$insertado=$tPersona->editUnaPersona($p);
	
			if ($insertado){
				echo "Se ha insertado satisfactoriamente";
				header('Location: index.php?principal=Intefaz\actualizaPersonas.php');
			}
			else{
				echo "Ha habido algún error en la inserción del empleado";
			}
		}

	}


 ?>


</body>
</html>