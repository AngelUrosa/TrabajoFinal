<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de un nuevo departamento</title>
</head>
<body>
	<h1>Alta de un nuevo Departamento</h1>
	
	<form name="altaDepartamento" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaDepartamento.php">
	<div class="mx-auto">
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Nombre</label>
  <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre" maxlength="25">
  <div id=Name class="form-text" >Nombre Departamento</div>
</div>

<button name="alta" value="Guarda" type="submit" class="btn btn-primary">Submit</button>
</div>

</form>



	<?php 


	
		if (isset($_POST['alta'])) {
			//Esto significa que el usuario ha pulsado el botón submit

			$Departamento=Departamentos::singletonDepartamentos();
			$nombre=$_POST['nombre'];
           

			//testear que no se repitan nombres de departamentos;
			$id=1;//cualquier valor porque lo genera la bd
            $idDepartamento=1;//algoritmo que elabore el idDepartamento
			$activo=1;//constante cada ve que se trate de dar de alta una nueva familia (pr defecto)


			$f=new Departamento($id, $idDepartemento, $nombre, $activo);

			$insertado=$tDepartamento->addUnDepartamento($f);

			if ($insertado) {
				echo "Se ha insertado satisfactoriamente";
			}else{
				echo "Ha habido algun error en la insercion del departamento";
			}
		}


	 ?>


</body>
</html>