<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de una nueva familia</title>
</head>
<body>
	<h1>Alta de una nueva familia de productos</h1>	

	<form name="altaFamilia" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/familia/altaFamilia.php">
	<div class="mb-3">
		<label for="nombre" class="form-label">Nombre</label>
		<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
	</div>
	<div class="mb-3">
		<label for="descripcion" class="form-label">Descripción</label>
		<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
	</div>
	<div class="col-12">
    	<button class="btn btn-primary" name="alta"  type="submit">Enviar</button>
    	<button class="btn btn-danger float-right" name="reset"  type="reset">Borrar</button>
  	</div>


<?php 

	if (isset($_POST['alta'])){
		//Estos significa que el usuario ha pulsado el botón submit

		$tFamiliaProducto=FamiliasProductos::singletonFamiliasProductos();
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];

		//testear que no se repitan nombres de familias
		//controlar la unicidad de nombres
		$id=1; //cualquier valor xq lo genera la bd
		$idFamilia=1; ///algoritmo que elabore el idFamilia
		$activo=1; //constante cada vez que se trate de dar de alta una nueva familia (por defecto)
		$f=new FamiliaProducto($id,$idFamilia,$nombre,$descripcion,$activo);
		//pregunta de Alvaro

		$insertado=$tFamiliaProducto->addUnaFamiliaProducto($f);

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