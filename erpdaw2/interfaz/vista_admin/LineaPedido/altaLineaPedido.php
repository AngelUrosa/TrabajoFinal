<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de una nueva linea de pedido</title>
</head>
<body>
	<h1>Alta de una nueva Linea de Pedido</h1>
	
	<form name="altaLineaProducto" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/LineaPedido/altaLineaPedido.php">
	<div class="mx-auto">
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Unidades</label>
  <input name="unidades" type="number" step="0" min="0" class="form-control" id="unidades" placeholder="Unidades" >
  <div id=Unidades class="form-text" >Unidades</div>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
  <input type="text" name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3">
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">PVP</label>
  <input name="pvp" type="number" step="0.01" min="0" class="form-control" id="pvp" placeholder="PVP" >
  <div id=Pvp class="form-text" >PVP</div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Tipo IVA</label>
  <input name="tipoIva" type="text" class="form-control" id="tipoIva" placeholder="tipoIva" maxlength="10">
  <div id=TipoIva class="form-text" >Tipo IVA</div>
</div>
<button name="alta" value="Guarda" type="submit" class="btn btn-primary">Submit</button>
</div>

</form>



	<?php 


	
		if (isset($_POST['alta'])) {
			//Esto significa que el usuario ha pulsado el botón submit

			$tLineaPedido=LineasPedidos::singletonLineasPedidos();
			$nombre=$_POST['nombre'];
            $unidades=$_POST['unidades'];
            $descripcion=$_POST['descripcion'];
            $pvp=$_POST['pvp'];
            $numCta=$_POST['num_cta'];
            $tipoIva=$_POST['tipo_iva'];


			//testear que no se repitan nombres de lineas de prodcutos;
			$id=1;//cualquier valor porque lo genera la bd
			$idPedido=1;//algoritmo que elabore el idPedido
      $idProducto=1;//algoritmo que elabore el idProducto
			$activo=1;//constante cada ve que se trate de dar de alta una nueva familia (pr defecto)


			$f=new LineaPedido($id, $idPedido, $idProducto, $unidades, $descripcion, $pvp, $tipoIva, $activo);

			$insertado=$tLineaPedido->addUnaLineaPedido($f);

			if ($insertado) {
				echo "Se ha insertado satisfactoriamente";
			}else{
				echo "Ha habido algun error en la insercion de la linea de pedido";
			}
		}


	 ?>


</body>
</html>