<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de un nuevo cliente</title>
</head>
<body>
	<h1>Alta de un nuevo Empleado</h1>
	
	<form name="altaCliente" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaEmpleado.php">
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

<div class="mb-31">
<label for="exampleFormControlInput1" class="form-label">Número de cuenta</label>
  <input name="numCta" type="text" class="form-control" id="numCta" placeholder="Número de Cuenta" maxlength="30">
  <div id=nCta class="form-text" ></div>
</div>

<div class="mb-31">
<label for="exampleFormControlInput1" class="form-label">Movil</label>
  <input name="movil" type="text" class="form-control" id="movil" placeholder="Movil" maxlength="30">
  <div id=movil class="form-text" ></div>
</div>

<div class="mb-31">
<label for="exampleFormControlInput1" class="form-label">Direccion</label>
  <input name="direccion" type="text" class="form-control" id="direccion" placeholder="Lireccion" maxlength="30">
  <div id=direccion class="form-text" ></div>
</div>

<div class="mb-31">
<label for="exampleFormControlInput1" class="form-label">Localidad</label>
  <input name="localidad" type="text" class="form-control" id="localidad" placeholder="Localidad" maxlength="30">
  <div id=localidad class="form-text" ></div>
</div>

<div class="mb-31">
<label for="exampleFormControlInput1" class="form-label">Codigo postal</label>
  <input name="codPostal" type="text" class="form-control" id="codPostal" placeholder="codigo postal" maxlength="30">
  <div id=codPostal class="form-text" ></div>
</div>

<div class="mb-31">
<label for="exampleFormControlInput1" class="form-label">Provincia</label>
  <input name="provincia" type="text" class="form-control" id="provincia" placeholder="Provincia" maxlength="30">
  <div id=provincia class="form-text" ></div>
</div>

<div class="mb-31">
<label for="exampleFormControlInput1" class="form-label">Pais</label>
  <input name="pais" type="text" class="form-control" id="pais" placeholder="Pais" maxlength="30">
  <div id=pais class="form-text" ></div>
</div>

<div class="mb-31">
<label for="exampleFormControlInput1" class="form-label">Foto</label>
  <input name="rutaFoto" type="text" class="form-control" id="rutaFoto" placeholder="Foto" maxlength="30">
  <div id=rutaFoto class="form-text" ></div>
</div>
</div>
<button name="alta" value="Guarda" type="submit" class="btn btn-primary">Submit</button>
</div>
    </form>

    
	<?php 


	
if (isset($_POST['alta'])) {
    //Esto significa que el usuario ha pulsado el botón submit

    $tEmpleado=Empleados::singletonEmpleados();
    $nombre=$_POST['nombre'];
    $apellido1=$_POST['apellido1'];
    $apellido2=$_POST['apellido2'];
    $nif= $_POST['nif'];
    $numCta=$_POST['numCta'];
    $movil=$_POST['movil']; 
    $direccion=$_POST['direccion'];
    $localidad=$_POST['localidad'];
    $codPostal=$_POST['codPostal'];
    $provincia=$_POST['provincia'];
    $pais=$_POST['pais'];
    $rutaFoto= $_POST['rutaFoto'];
    //testear que no se repitan nombres de clientes;
    $id=1;//cualquier valor porque lo genera la bd
    $idEmpleado=1;//algoritmo que elabore el idCliente
    $idUsuario=1;//algoritmo que elabore el idUsuario
    $idDepartamento=1;
    $activo=1;//constante cada ve que se trate de dar de alta una nueva familia (pr defecto)
    
    
    $f=new Empleado($id, $idEmpleado, $idUsuario, $idDepartamento, $nombre, $apellido1, $apellido2, $nif, $numCta, $movil, $direccion, $localidad, $codPostal, $provincia, $pais, $rutaFoto, $activo);

    $insertado=$tEmpleado->addEmpleado($f);

    if ($insertado) {
        
        echo "Se ha insertado satisfactoriamente";
    }else{
        echo "Ha habido algun error en la insercion del cliente";
    }
}


?>


</body>
</html>


