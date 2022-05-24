<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Usuario</title>
</head>
<body>
<h1>Usuario</h1>
	<form name=altaCliente method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/rol/altaRol.php">

    <div class="mb-3">
		<label for="nombre" class="form-label">Rol</label>
		<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Rol">
	</div>

	<div class="col-12">
    	<button class="btn btn-primary" name="alta"  type="submit">Enviar</button>
    	<button class="btn btn-danger float-right" name="reset"  type="reset">Borrar</button>
  	</div>	
	</form>

	<?php 
	
	if (isset($_POST['alta'])){
		//Estos sigcodigoBarrasica que el usuario ha pulsado el botón submit

		$rRoles=Roles::singletonRoles();
        $nombre=$_POST['nombre'];

		//controlar la unicidad de nombres
		$id=1; //cualquier valor xq lo genera la b
        $idRol=1;
		$r=new Rol($id, $idRol, $nombre);
		//pregunta de Alvaro

		$insertado=$rRoles->addUnRol($r);

		if ($insertado){
			echo "Se ha insertado satisfactoriamente";
		}
		else{
			echo "Ha habido algún error en la inserción de la familia";
		}
	}
 ?>
</body>
</html>