<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Formulario de alta de una nueva familia</title>
</head>
<body>
	<h1>Alta de una nueva familia de productos</h1>


<form name="altaFamilia" method="post" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaFamilia.php">

<div class="mx-auto">
	<div class="mb-31">
  <label for="exampleInputEmail1" class="form-label">Nombre</label>
  <input type="text"  name="nombre" class="form-control" id="exampleFormInputEmail1" placeholder="nombre">
<div id="emailHelp" class= "form-fext">Nombre de la familia</div>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
 <input type="text" name="descripcion" class="form-control" id="exampleInputPassword1">
 </div>

 <button name="alta" type="submit" class="btn btn-primary">Submit</button>
	
</div>
</form>

	<!--
	<form name="altaFamilia" method="post" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaFamilia.php">
		Nombre: <input type="text" name="nombre">
		Descripcion: <input type="text" name="descripcion">
		<input type="submit" name="alta" value="Guardar">
		<input type="reset" name="reset" value="Limpiar">


	</form>
	-->

	<?php
	//require_once "pojos/FamiliaProducto.php";
	//require_once "persistencia/FamiliasProductos.php";













	if(isset($_POST['alta'])){
		//esto significa que se ha pulsado el boton del submmit

		$tFamiliaProducto=FamiliasProductos::singletonFamiliasProductos();
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];

     //$tf=$tFamiliaProducto->getFamiliasProductosTodas();
		//controlar la unicidad de nombres//
		
		$id=1;
		$idFamilia=1;//algoritmo que genere el idFamilia
		$activo=true;
		$f=new FamiliaProducto($id,$idFamilia,$nombre,$descripcion,$activo);

		$insertado=$tFamiliaProducto->addUnaFamiliaProducto($f);
		if($insertado){
			echo "Se ha insertado satisfactoriamente";

		}else {
			echo "ha habido algún error de la inserción de la familia";
		}

	}

	?>
</body>
</html>