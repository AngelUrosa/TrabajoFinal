<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alta  de un proveedor</title>
</head>
<body>
	<h1>Proveedores</h1>
	<form name=altaProveedor method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/proveedor/altaProveedor.php">

	<div class="mb-3">
		<label for="nombre" class="form-label">Nombre</label>
		<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
	</div>
	<div class="mb-3">
		<label for="apellido1" class="form-label">Apellido 1</label>
		<input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Primer apellido">
	</div>
	<div class="mb-3">
		<label for="apellido2" class="form-label">Apellido 2</label>
		<input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo apellido">
	</div>
	<div class="mb-3">
		<label for="nif" class="form-label">NIF</label>
		<input type="text" class="form-control" id="nif" name="nif" placeholder="NIF">
	</div>
	<div class="mb-3">
		<label for="codPostal" class="form-label">Código postal</label>
		<input type="text" class="form-control" id="codPostal" name="codPostal" placeholder="Código postal">
	</div>
	<div class="mb-3">
		<label for="localidad" class="form-label">Localidad</label>
		<input type="text" class="form-control" id="localidad" name="localidad" placeholder="Localidad">
	</div>
	<div class="mb-3">
		<label for="provincia" class="form-label">Provincia</label>
		<input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia">
	</div>

	<div class="col-12">
    	<button class="btn btn-primary" name="alta"  type="submit">Enviar</button>
    	<button class="btn btn-danger float-right" name="reset"  type="reset">Borrar</button>
  	</div>	
	</form>

	<?php 

	function comprobarNif($nif){ // Función que comprueba si el NIF es válido
		$letras = explode(',','T,R,W,A,G,M,Y,F,P,D,X,B,N,J,Z,S,Q,V,H,L,C,K,E');
		if ((strlen($nif)!=9) || // Si la longitud del NIF no es nueve, es erróneo 
		(!is_long($entero=intval(substr($nif,0,8)))) || // Comprueba si el número del DNI es un valor
	    (!in_array($letra=strtoupper(substr($nif,8,1)),$letras)) || // Comprueba si la letra introducida es correcta
	    ($letra!=$letras[$entero%23])) {
	    	return false; // Es incorrecto
	    } else {
	    	return true; // Es correcto
	    }
	}
	
	if (isset($_POST['alta'])){
		$tProveedor=Proveedores::singletonProveedores();
		$nombre=$_POST['nombre'];
		$apellido1=$_POST['apellido1'];
		$apellido2=$_POST['apellido2'];
		$nif=$_POST['nif'];
		$codPostal=$_POST['codPostal'];
		$localidad=$_POST['localidad'];
		$provincia=$_POST['provincia'];
		$id=1;
		$idProveedor=1; // Como hemos especificado que el valor id_proveedor es char, no se puede autoincrementar, por lo que siempre
						// es 1. Para arreglar esto, habría que cambiar el tipo de valor de char a, por ejemplo,
		$activo=1;
		if (comprobarNif($nif)) { // Si el NIF es válido, se inserta el proveedor
			$f=new Proveedor($id,$idProveedor,$nombre,$apellido1,$apellido2,$nif,$codPostal,$localidad,$provincia,$activo);
			$insertado=$tProveedor->addUnoProveedor($f);
			if ($insertado) {
				echo "Se ha insertado satisfactoriamente";
			} else {
				echo "Ha habido algún error en la inserción";
			}
		} else {
			echo 'El NIF es incorrecto: no se insertó ningún proveedor';
		}
	}
	?>
</body>
</html>