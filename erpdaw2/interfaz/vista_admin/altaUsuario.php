<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Formulario de alta de una nueva familia</title>
</head>
<body>
	<h1>Alta de un nuevo usuario</h1>


<form name="altaUsuario" method="post" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaUsuario.php">


<div class="mx-auto">
	<div class="mb-31">
  <label for="exampleInputEmail1" class="form-label">id usuario</label>
  <input type="text"  name="idUsuario" class="form-control" id="exampleFormInputEmail1" placeholder="id usuario">
<div id="idUsuario" class= "form-fext">Id usuario</div>
</div>

<div class="mb-31">
  <label for="exampleInputEmail1" class="form-label">id rol</label>
  <input type="text"  name="idRol" class="form-control" id="exampleFormInputEmail1" placeholder="id rol">
<div id="idRol" class= "form-fext">Id rol</div>
</div>

<div class="mb-31">
  <label for="exampleInputEmail1" class="form-label">login</label>
  <input type="text"  name="login" class="form-control" id="exampleFormInputEmail1" placeholder="login">
<div id="login" class= "form-fext">login</div>
</div>

<div class="mb-31">
  <label for="exampleInputEmail1" class="form-label">Password</label>
  <input type="password"  name="password" class="form-control" id="exampleFormInputEmail1" placeholder="password">
<div id="password" class= "form-fext">login</div>
</div>

</div>
<button name="alta" value="Guarda" type="submit" class="btn btn-primary">Submit</button>
</form>


<?php

if (isset($_POST['alta'])) {

    $tUsuario = Usuarios::singletonUsuarios();
    
	 
	 $idUsuario=$_POST['idUsuario'];
	 $idRol=$_POST['idRol'];
	 $login=$_POST['login'];;
	 $password=$_POST['password'];;
	 
$activo=1;
$id=1;

$f=new Usuario($id, $idUsuario, $idRol, $login, $password, $activo);

$insertado = $tUsuario->addUsuario($f);
if ($insertado) {
		
    echo "Se ha insertado satisfactoriamente";
}else{
    echo "Ha habido algun error en la insercion del cliente";
}
}

?>

</body>
</html>
