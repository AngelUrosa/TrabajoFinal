<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Productos</title>
</head>
<body>
<h1>Productos</h1>
	<form name=altaCliente method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/producto/altaProducto.php">

    <div class="mb-3">
		<label for="tipoiva" class="form-label">Tipo IVA</label>
		<input type="text" class="form-control" id="tipoiva" name="tipoiva" placeholder="Tipo IVA">
	</div>

	<div class="mb-3">
		<label for="preciocoste" class="form-label">Precio coste</label>
		<input type="text" class="form-control" id="preciocoste" name="preciocoste" placeholder="Precio coste">
	</div>
	<div class="mb-3">
		<label for="pvp" class="form-label">PVP</label>
		<input type="text" class="form-control" id="pvp" name="pvp" placeholder="PVP">
	</div>
	<div class="mb-3">
		<label for="descripcion" class="form-label">Descripción</label>
		<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
	</div>
	<div class="mb-3">
		<label for="codigoBarras" class="form-label">Código de barras</label>
		<input type="text" class="form-control" id="codigoBarras" name="codigoBarras" placeholder="Código de Barras">
	</div>
	<div class="mb-3">
		<label for="stockActual" class="form-label">Stock actual</label>
		<input type="text" class="form-control" id="stockActual" name="stockActual" placeholder="Stock Actual">
	</div>
	<div class="mb-3">
		<label for="stockMinimo" class="form-label">Stock mínimo</label>
		<input type="text" class="form-control" id="stockMinimo" name="stockMinimo" placeholder="Stock Minimo">
	</div>

    <div class="mb-3">
		<label for="stockMaximo" class="form-label">Stock máximo</label>
		<input type="text" class="form-control" id="stockMaximo" name="stockMaximo" placeholder="Stock Máximo">
	</div>

    <div class="mb-3">
		<label for="rutaFoto" class="form-label">Ruta foto</label>
		<input type="text" class="form-control" id="rutaFoto" name="rutaFoto" placeholder="Ruta de la foto">
	</div>

	<div class="col-12">
    	<button class="btn btn-primary" name="alta"  type="submit">Enviar</button>
    	<button class="btn btn-danger float-right" name="reset"  type="reset">Borrar</button>
  	</div>	
	</form>

	<?php 
	
	if (isset($_POST['alta'])){
		//Estos sigcodigoBarrasica que el usuario ha pulsado el botón submit

		$pProductos=Productos::singletonProductos();
        $tipoIVA=$_POST['tipoiva'];
		$precioCoste=$_POST['preciocoste'];
		$pvp=$_POST['pvp'];
		$descripcion=$_POST['descripcion'];
		$codigoBarras=$_POST['codigoBarras'];
		$stockActual=$_POST['stockActual'];
		$stockMinimo=$_POST['stockMinimo'];
        $stockMaximo=$_POST['stockMaximo'];
        $rutaFoto=$_POST['rutaFoto'];

		//controlar la unicidad de nombres
		$id=1; //cualquier valor xq lo genera la bd
		$idProducto=1; ///algoritmo que elabore el idFamilia
		$idFamilia=1;
        $idProveedor=1;
		$activo=1; //constante cada vez que se trate de dar de alta una nueva familia (por defecto)
		$p=new Producto($id,$idProducto,$idFamilia,$tipoIVA,$precioCoste,$pvp,$descripcion,$codigoBarras,$idProveedor,$stockActual,$stockMinimo,$stockMaximo,$rutaFoto,$activo);
		//pregunta de Alvaro

		$insertado=$pProductos->addUnProducto($p);

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