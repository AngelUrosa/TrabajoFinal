<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Alta de un nuevo pedido</title>
</head>
<body>
	<h1>Alta de un nuevo Pedido</h1>
	
	<form name="altaPedido" method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaPedido.php">
	<div class="mx-auto">
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Fecha Pedido</label>
  <input name="fechaPedido" type="date" class="form-control" id="fechaPedido" placeholder="Fecha pedido">
  <div id=FechaPedido class="form-text" >Fecha Pedido</div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Fecha Envio</label>
  <input name="fechaEnvio" type="date" class="form-control" id="fechaEnvio" placeholder="Fecha envio">
  <div id=FechaEnvio class="form-text" >Fecha Envio</div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Fecha Entrega</label>
  <input name="fechaEntrega" type="date" class="form-control" id="fechaEntrega" placeholder="Fecha entrega">
  <div id=FechaEntrega class="form-text" >Fecha Entrega</div>
</div>
<div class="mb-31">
<select class="form-select">
  <option selected id="facturado">¿Ha sido facturado?</option>
  <option value="si">Si</option>
  <option value="no">No</option>
</select>
  <div id=Facturado class="form-text" >Facturado</div>
</div>
<div class="mb-31">
  <label for="exampleFormControlInput1" class="form-label">Fecha Factura</label>
  <input name="fechaFactura" type="date" class="form-control" id="fechaFactura" placeholder="Fecha factura">
  <div id=FechaFactura class="form-text" >Fecha Factura</div>
</div>
<div class="mb-31">
<select class="form-select">
  <option selected id="pagado">¿Ha sido pagado?</option>
  <option value="si">Si</option>
  <option value="no">No</option>
</select>
  <div id=Pagado class="form-text" >Pagado</div>
</div>
<div class="mb-31">
<select class="form-select">
  <option selected id="metodoPago">¿Ha sido sido pagado?</option>
  <option value="efectivo">Efectivo</option>
  <option value="cheque">Cheque</option>
  <option value="trasnferencia">Trasnferencia</option>
  <option value="Tarjeta">Tarjeta</option>
</select>
  <div id=MetodoPAgo class="form-text" >Metodo Pago</div>
</div>
<button name="alta" value="Guarda" type="submit" class="btn btn-primary">Submit</button>
</div>

</form>



	<?php 


	
		if (isset($_POST['alta'])) {
			//Esto significa que el usuario ha pulsado el botón submit

			$tPedido=Pedidos::singletonPedidos();
			$fechaPedido=$_POST['fecha_pedido'];
            $fechaEnvio=$_POST['fecha_envio'];
            $fechaEntrega=$_POST['fecha_entrega'];
            $facturado=$_POST['facturado'];
            $fechaFactura=$_POST['fecha_factura'];
            $pagado=$_POST['pagado'];
            $fechaPago=$_POST['fecha_pago'];
            $metodoPago=$_POST['metodo_pago'];


			//testear que no se repitan nombres de productos;
			$id=1;//cualquier valor porque lo genera la bd
			$idPedido=1;//algoritmo que elabore el idPedido
            $idEmpledoTransporte=1;//algoritmo que elabore el idEmpledoTransporte
            $idFactura=1;//algoritmo que elabore el idFactura
            $idCliente=1;//algoritmo que elabore el idCliente
			$activo=1;//constante cada ve que se trate de dar de alta una nueva familia (pr defecto)


			$f=new Pedido($id, $idPedido, $idEmpleadoTransporte, $fechaPedido, $fechaEnvio, $fechaEntrega, $facturado, $idFactura, $fechaFactura, $pagado, $fechaPago, $metodoPago, $idCliente, $activo);

			$insertado=$tPedido->addUnPedido($f);

			if ($insertado) {
				echo "Se ha insertado satisfactoriamente";
			}else{
				echo "Ha habido algun error en la insercion de pedido";
			}
		}


	 ?>


</body>
</html>