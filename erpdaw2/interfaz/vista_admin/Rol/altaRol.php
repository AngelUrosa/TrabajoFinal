<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de un nuevo rol</title>
</head>
<body>
	<h1>Alta de un nuevo rol</h1>
	
	<form name="altaRol" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/Rol/altaRol.php">
	<div class="mx-auto">
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Nombre</label>
  <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre" maxlength="15">
  <div id=Name class="form-text" ></div>
</div>

<button name="alta" value="Guarda" type="submit" class="btn btn-primary">Guardar</button>
</div>

</form>

	<!--<form name="altaFamilia" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaFamilia.php">
		
		Nombre: <input type="text" name="nombre">
		Descripción: <input type="text" name="descripcion">
		<input type="submit" name="alta" value="Guardar">
		<input type="reset" name="reset" value="Limpiar Formulario">

	</form> -->

	<?php 


	
		if (isset($_POST['alta'])) {
			//Esto significa que el usuario ha pulsado el botón submit

			$tRol=FRols::singletonFRols();
			$nombre=$_POST['nombre'];

			//testear que no se repitan nombres de familias;
			$id=1;//cualquier valor porque lo genera la bd
			$idRol=1;//algoritmo que elabore el idRol
			$activo=1;//constante cada ve que se trate de dar de alta una nuevo rol (pr defecto)


			$f=new Rol($id, $idRol, $nombre);

			$insertado=$tRol->addUnRol($f);

			if ($insertado) {
				echo "Se ha insertado satisfactoriamente";
			}else{
				echo "Ha habido algun error en la insercion del rol";
			}
		}


	 ?>


</body>
</html>