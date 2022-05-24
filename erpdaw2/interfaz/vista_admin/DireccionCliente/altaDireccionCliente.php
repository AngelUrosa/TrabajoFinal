<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de una nueva direccion de un cliente</title>
</head>
<body>
	<h1>Alta de una nueva direccion de un Cliente</h1>
	
	<form name="altaDireccionCliente" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/DireccionCliente/altaDireccionCliente.php">
	<div class="mx-auto">

<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Dirección</label>
  <input name="direccion" type="text" class="form-control" id="direccion" placeholder="Dirección" maxlength="40">
  <div id=Direccion class="form-text" >Dirección</div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Código postal</label>
  <input name="codPostal" type="text" class="form-control" id="codPostal" placeholder="Código Postal" maxlength="15">
  <div id=CodPostal class="form-text" >Código postal</div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Localidad</label>
  <input name="localidad" type="text" class="form-control" id="localidad" placeholder="Localidad" maxlength="25">
  <div id=Localidad class="form-text" >Localidad</div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Provincia</label>
  <input name="provincia" type="text" class="form-control" id="provincia" placeholder="Provincia" maxlength="20">
  <div id=Provincia class="form-text" >Provincia</div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">País</label>
  <input name="pais" type="text" class="form-control" id="pais" placeholder="País" maxlength="20">
  <div id=Pais class="form-text" >País</div>
</div>
<button name="alta" value="Guarda" type="submit" class="btn btn-primary">Submit</button>
</div>

</form>



	<?php 


	
		if (isset($_POST['alta'])) {
			//Esto significa que el usuario ha pulsado el botón submit

			$tDireccionCliente=DireccionesClientes::singletonDireccionesClientes();
		    $direccion=$_POST['direccion'];
            $codPostal=$_POST['cod_postal'];
            $localidad=$_POST['localidad'];
            $provincia=$_POST['provincia'];
            $pais=$_POST['pais'];

			//testear que no se repitan nombres de direciones de clientes;
			$id=1;//cualquier valor porque lo genera la bd
			$idCliente=1;//algoritmo que elabore el idCliente
            $idUsuario=1;//algoritmo que elabore el idUsuario
			$activo=1;//constante cada ve que se trate de dar de alta una nueva familia (pr defecto)


			$f=new Empleado($id, $idCliente, $idUsuario, $direccion, $cdpostal, $localidad, $provincia, $pais, $activo);

			$insertado=$tDireccionCliente->addUnaDireccionCliente($f);

			if ($insertado) {
				echo "Se ha insertado satisfactoriamente";
			}else{
				echo "Ha habido algun error en la insercion de la direccion del cliente";
			}
		}


	 ?>


</body>
</html>