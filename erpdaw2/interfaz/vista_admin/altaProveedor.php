<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de un nuevo proveedor</title>
</head>

<body>
	<h1>Alta de un nuevo Proveedor</h1>

<form name="altaProveedor" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaProveedor.php">
	<div class="mx-auto">
<div class="mb-31">
 <label for="exampleFormControlInput1" class="form-label">Nombre</label>
  <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre" maxlength="15">
  <div id=Name class="form-text" ></div>
</div>

<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Primer apellido</label>
  <input name="apellido1" type="text" class="form-control" id="apellido1" placeholder="Primer apellido" maxlength="20">
  <div id=ape1 class="form-text" ></div>
</div>

<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Segundo apellido</label>
  <input name="apellido2" type="text" class="form-control" id="apellido2" placeholder="Segundo apellido" maxlength="20">
  <div id=ape2 class="form-text" ></div>
</div>

<div class="mb-31">
<label for="exampleFormControlInput1" class="form-label"> NIF</label>
<input type="text" name="nif" id=nif class="form-control" placeholder="NIF" maxlength="10">
</div>

<div class="mb-31">Codigo postal</label>
  <input name="codPostal" type="text" class="form-control" id="codPostal" placeholder="codigo Postal" maxlength="30">
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Localidad</label>
  <input type="text" name="localidad" class="form-control" id="exampleFormControlTextarea1" rows="3">
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Provincia</label>
  <input type="text" name="provincia" class="form-control" id="exampleFormControlTextarea1" rows="3">
</div>

<button name="alta" value="Guarda" type="submit" class="btn btn-primary">Submit</button>
</div>

</form>


<?php 


	if (isset($_POST['alta'])) {

	$tProveedor=Proveedores::singletonProveedores();
	$nombre=$_POST['nombre'];
	$apellido1=$_POST['apellido1'];
    $apellido2=$_POST['apellido2'];
    $nif= $_POST['nif'];
    $codPostal= $_POST['codPostal'];
    $localidad=$_POST['localidad'];
    $provincia=$_POST['provincia'];

    $id=1;

    
    $cp=$_POST['codPostal'];




if($tProveedor->verificarDni($nif)){

$idUltimoprov = $tProveedor->getIdUltimoSegunCp($cp);

if($idUltimoprov==null){
	$idUltimoprov=0;
}

    $idProveedor=$cp . $idUltimoprov;
    $activo=1;
    echo $idProveedor;

    $f=new Proveedor($id, $idProveedor, $nombre, $apellido1, $apellido2, $nif, $codPostal, $localidad, $provincia, $activo);

    $insertado = $tProveedor->addUnProveedor($f);

    if($insertado){
    	echo "Se ha insertado correctamente";

    }else{
    	echo "Ha habido algun error";
    }
}else{
	echo "DNI incorrecto";
}
}


?>
</body>
</html>