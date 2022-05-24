<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de un nuevo producto</title>
</head>
<body>
	<h1>Alta de un nuevo Producto</h1>
	
	<form name="altaProducto" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/Producto/altaProducto.php">
	<div class="mx-auto">
    <div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Tipo IVA</label>
    <select name="tipoIVA" class="form-control-file">
          <option name=4% type="number" value=*0.04>4%</option>
          <option name=10% type="number" value=*0.1>10%</option>
          <option name=21% type="number" value=*0.21>21%</option>
    </select>
  <?php /*
  <div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Tipo IVA</label>
  <input name="tipoIva" type="text" class="form-control" id="tipoIva" placeholder="tipoIva" maxlength="10">
  <div id=TipoIva class="form-text" ></div>
</div>
  */ ?>

<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Precio Coste</label>
  <input name="precioCoste" type="number" step="0.01" min="0" class="form-control" id="precioCoste" placeholder="Precio Coste" >
  <div id=PrecioCoste class="form-text" ></div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">PVP</label>
  <input name="pvp" type="number" step="0.01" min="0" class="form-control" id="pvp" placeholder="PVP" >
  <div id=Pvp class="form-text" ></div>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
  <textarea stype="text-area" name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripción"></textarea> 
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Código de barras</label>
  <input name="codigoBarras" type="number" step="0" min="0" class="form-control" id="codigoBarras" placeholder="Codigo de Barras" >
  <div id=CodigoBarras class="form-text" ></div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Stock Actual</label>
  <input name="stockActual" type="number" step="0" min="0" class="form-control" id="stockActual" placeholder="Stock Actual" >
  <div id=StockActual class="form-text" ></div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Stock Mínimo</label>
  <input name="stockMinimo" type="number" step="0" min="0" class="form-control" id="stockMinimo" placeholder="Stock Minimo" >
  <div id=StockMinimo class="form-text" ></div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Stock Máximo</label>
  <input name="stockMaximo" type="number" step="0" min="0" class="form-control" id="stockMaximo" placeholder="Stock Maximo" >
  <div id=StockMaximo class="form-text" ></div>
</div>
<div class="mb-31">
  <label  for="exampleFormControlFile1" class="form-label">Ruta Foto</label>
  <input name="rutaFoto" type="file" class="form-control-file" id="rutaFoto" placeholder="rutaFoto">
  <div id=RutaFoto class="form-text" ></div>
</div>
<button name="alta" value="Guarda" type="submit" class="btn btn-primary">Guardar</button>
</div>

</form>



	<?php 


	
		if (isset($_POST['alta'])) {
			//Esto significa que el usuario ha pulsado el botón submit

			$tProducto=Productos::singletonProductos();
            $tipoIva=$_POST['tipo_iva'];
            $precioCoste=$_POST['precio_coste'];
            $pvp=$_POST['pvp'];
            $descripcion=$_POST['descripcion'];
            $codigoBarra=$_POST['codigo_barras'];
            $stockActual=$_POST['stock_actual'];
            $stockMinimo=$_POST['stock_minimol'];
            $stockMaximo=$_POST['stock_maximo'];
            $rutaFoto=$_POST['ruta_foto'];

			//testear que no se repitan nombres de producto;
			$id=1;//cualquier valor porque lo genera la bd
			$idProducto=1;//algoritmo que elabore el idProducto
      $idFamilia=1;//algoritmo que elabore el idFamilia
      $idProveedor=1;//algoritmo que elabore el idProveedor
			$activo=1;//constante cada ve que se trate de dar de alta una nueva familia (pr defecto)


			$f=new Prodcuto($id, $idProducto, $idFamilia, $tipoIva, $precioCoste, $pvp, $descripcion, $codigoBarras, $idProveedor, $stockActual, $stockMinimo, $stockMaximo, $rutaFoto, $activo);

			$insertado=$tProdcuto->addUnProdcuto($f);

			if ($insertado) {
				echo "Se ha insertado satisfactoriamente";
			}else{
				echo "Ha habido algun error en la insercion del producto";
			}
		}


	 ?>


</body>
</html>