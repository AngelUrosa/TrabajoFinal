<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Usuario</title>
</head>
<body>
<h1 class="text-darkgrey"><strong>Registro de usuario</strong></h1>
	<form name=altaCliente method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/usuario/altaUsuario.php">

    <div class="mb-3">
		<label for="login" class="form-label">Usuario</label>
		<input type="text" class="form-control bg-darkgrey text-lightgrey" id="login" name="login" placeholder="Usuario">
	</div>

	<div class="mb-3">
		<label for="password" class="form-label">Contraseña</label>
		<input type="password" class="form-control bg-darkgrey text-lightgrey" id="password" name="password" placeholder="Contraseña">
	</div>
	
	<div class="col-12">
    	<button class="btn btn-darkgreen" name="alta"  type="submit"><i class="bi bi-check-circle-fill"></i> Enviar</button>
    	<button class="btn btn-danger float-end" name="reset"  type="reset"><i class="bi bi-x-circle-fill"></i> Borrar</button>
  	</div>	
	</form>

	<?php 
	
	if (isset($_POST['alta'])){
		//Estos sigcodigoBarrasica que el usuario ha pulsado el botón submit

		$uUsuarios=Usuarios::singletonUsuarios();
        $login = $_POST['login'];
        $password = $_POST['password'];

		//controlar la unicidad de nombres
		$id=1; //cualquier valor xq lo genera la b
        $idRol=1;
		$idUsuario=1; ///algoritmo que elabore el idFamilia
		$activo=1; //constante cada vez que se trate de dar de alta una nueva familia (por defecto)
		$u=new Usuario($id, $idUsuario,$idRol, $login, $password, $activo);
		//pregunta de Alvaro

		$insertado=$uUsuarios->addUnUsuario($u);

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