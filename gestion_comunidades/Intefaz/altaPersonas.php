<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de un nuevo empleado</title>
</head>
<body>
	<h1>Alta de un nuevo empleado</h1>	

	<form name="altaEmpleado" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaEmpleado.php">
		<div class="mx-auto">
			<div class="mb-31">
  			<label for="nombre" class="form-label">Nombre</label>
  			<input type="text" class="form-control" id="nombre" name="nombre">
		</div>
		
		<div class="mb-31">
  			<label for="apellido1" class="form-label">Primer Apellido</label>
  			<input type="text" class="form-control" id="apellido1" name="apellido1"></input>
		</div>

		<div class="mb-31">
  			<label for="apellido2" class="form-label">Segundo Apellido</label>
  			<input type="text" class="form-control" id="apellido2" name="apellido2"></input>
		</div>

		<div class="mb-31">
  			<label for="nif" class="form-label">NIF</label>
  			<input type="text" class="form-control" id="nif" name="nif"></input>
		</div>

		<div class="mb-31">
  			<label for="numCta" class="form-label">Numero de Cuenta</label>
  			<input type="text" class="form-control" id="numCta" name="numCta"></input>
		</div>

		<div class="mb-31">
  			<label for="movil" class="form-label">Movil</label>
  			<input type="text" class="form-control" id="movil" name="movil"></input>
		</div>

		<div class="mb-31">
  			<label for="direccion" class="form-label">Direccion</label>
  			<input type="text" class="form-control" id="direccion" name="direccion"></input>
		</div>

		<div class="mb-31">
  			<label for="localidad" class="form-label">Localidad</label>
  			<input type="text" class="form-control" id="localidad" name="localidad"></input>
		</div>

		<div class="mb-31">
  			<label for="codPostal" class="form-label">Codigo Postal</label>
  			<input type="text" class="form-control" id="codPostal" name="codPostal"></input>
		</div>

		<div class="mb-31">
  			<label for="provincia" class="form-label">Provincia</label>
  			<input type="text" class="form-control" id="provincia" name="provincia"></input>
		</div>

		<div class="mb-31">
  			<label for="pais" class="form-label">Pais</label>
  			<input type="text" class="form-control" id="pais" name="pais"></input>
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

		$tEmpleado=Empleados::singletonEmpleados();
		$nombre=$_POST['nombre'];
		$apellido1=$_POST['apellido1'];
		$apellido2=$_POST['apellido2'];
		$nif=$_POST['nif'];
		$numCta=$_POST['numCta'];
		$movil=$_POST['movil'];
		$direccion=$_POST['direccion'];
		$localidad=$_POST['localidad'];
		$codPostal=$_POST['codPostal'];
		$provincia=$_POST['provincia'];
		$pais=$_POST['pais'];
		$movil=$_POST['movil'];






//testear que no se repitan nombres de familias
		//controlar la unicidad de nombres
		$id=1; //cualquier valor xq lo genera la bd
		$idEmpleado=1; ///algoritmo que elabore el idFamilia
		$idDepartamento=1;
		$idUsuario=1;
		$activo=1; //constante cada vez que se trate de dar de alta una nueva familia (por defecto)
		$em=new Empleado($id,$idEmpleado,$idDepartamento,$idUsuario,$nombre,$apellido1,$apellido2,$nif,$numCta,$movil,$direccion,$localidad,$codPostal,$provincia,$pais,$activo);
		//pregunta de Alvaro

		$insertado=$tEmpleado->addUnEmpleado($em);

		if ($insertado){
			echo "Se ha insertado satisfactoriamente";
		}
		else{
			echo "Ha habido algún error en la inserción del empleado";
		}



	}


 ?>


</body>
</html>