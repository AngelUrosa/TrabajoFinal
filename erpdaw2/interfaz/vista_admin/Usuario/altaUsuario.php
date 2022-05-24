<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de un nuevo usuario</title>
</head>
<body>
	<h1>Alta de una nuevo Usuario</h1>
	
	<form name="altaUsuario" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/alUsuario.php">
	<div class="mx-auto">
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Login</label>
  <input name="login" type="text"  class="form-control" id="login" placeholder="Login" >
  <div id=Login class="form-text" ></div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input name="password" type="password" class="form-control" id="password" placeholder="Password" >
  <div id=Password class="form-text" ></div>
</div>


<button name="alta" value="Guarda" type="submit" class="btn btn-primary">Guardar</button>
</div>

</form>



	<?php 


	
		if (isset($_POST['alta'])) {
			//Esto significa que el usuario ha pulsado el botón submit

			$tUsuario=Usuarios::singletonUsuarios();
			$login=$_POST['login'];
            $password=$_POST['password'];


			//testear que no se repitan nombres de los usuarios;
			$id=1;//cualquier valor porque lo genera la bd
			$idUsuario=1;//algoritmo que elabore el idUsuario
            $idRol=1;//algoritmo que elabore el idRol
			$activo=1;//constante cada ve que se trate de dar de alta una nueva familia (pr defecto)


			$f=new Usuario($id, $idUsuario, $idRol, $login, $password, $activo);

			$insertado=$tUsuario->addUnaUsuario($f);

			if ($insertado) {
				echo "Se ha insertado satisfactoriamente";
			}else{
				echo "Ha habido algun error en la insercion del usuario";
			}
		}


	 ?>


</body>
</html>