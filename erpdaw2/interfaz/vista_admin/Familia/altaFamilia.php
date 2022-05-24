<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de una nueva familia</title>
</head>
<body>
	<h1>Alta de una nueva familia de productos</h1>
	
	<form name="altaFamilia" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/Familia/altaFamilia.php">
	<div class="mx-auto">
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Nombre de la familia</label>
  <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre de la familia" maxlength="15">
  <div id=nameF class="form-text" ></div>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
  <textarea stype="text-area" name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripción"></textarea> 
</div>
<button name="alta" value="Guarda" type="submit" class="btn btn-primary">Guardar</button>
</div>

</form>

	<!--<form name="altaFamilia" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaFamilia.php">
		
		Nombre: <input type="text" name="nombre">
		Descripción: <input type="text" name="descripcion">
		<input type="submit" name="alta" value="Guardar">
		<input type="reset" name="reset" value="Limpiar Formulario">

	</form> -->

	<?php 


	
		if (isset($_POST['alta'])) {
			//Esto significa que el usuario ha pulsado el botón submit

			$tFamiliaProducto=FamiliasProductos::singletonFamiliasProductos();
			$nombre=$_POST['nombre'];
			$descripcion=$_POST['descripcion'];

			//testear que no se repitan nombres de familias;
			$id=1;//cualquier valor porque lo genera la bd
			$idFamilia=1;//algoritmo que elabore el idFamilia
			$activo=1;//constante cada ve que se trate de dar de alta una nueva familia (pr defecto)


			$f=new FamiliaProducto($id,$idFamilia,$nombre,$descripcion,$activo);

			$insertado=$tFamiliaProducto->addUnaFamiliaProducto($f);

			if ($insertado) {
				echo "Se ha insertado satisfactoriamente";
			}else{
				echo "Ha habido algun error en la insercion de la familia";
			}
		}


	 ?>


</body>
</html>