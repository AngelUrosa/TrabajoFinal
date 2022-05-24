<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado de Pedidos</title>
</head>
<body>
	
	<?php 
	$tPedido=Pedidos::singletonPedidos();//vas a la base de datos para traer los datos
	//voy a llamar a la persistencia y devolver un array de objetmos
	$tf=$tPedido->getPedidosTodos();

	echo "<table border='1'>";
	echo "<tr>";
		echo "<td>Id</td>";
		echo "<td>Id_Pedido</td>";
		echo "<td>Id_Empleado_Transporte</td>";
		echo "<td>Fecha_pedido</td>";
		echo "<td>Fecha_envio</td>";
		echo "<td>Fecha_entrega</td>";
		echo "<td>Facturado</td>";
		echo "<td>Id_factura</td>";
		echo "<td>Fecha_factura</td>";
		echo "<td>Pagado</td>";
		echo "<td>Fecha_pago</td>";
		echo "<td>Metodo_pago</td>";
		echo "<td>Id_cliente</td>";
		echo "<td>Activo</td>";
		echo "</tr>";
		foreach ($tf as $f) {//$f es un objeto de la clase PEdido
			//visualizo cada $f en una fila de la tabla
			echo "<tr>";
			echo "<td>".$f->getId()."</td>";
			echo "<td>".$f->getIdPedido()."</td>";
			echo "<td>".$f->getIdEmpleadoTransporte()."</td>";
			echo "<td>".$f->geFechaPedido()."</td>";
			echo "<td>".$f->getFechaEnvio()."</td>";
			echo "<td>".$f->getFechaEntrega()."</td>";
			echo "<td>".$f->getFacturado()."</td>";
			echo "<td>".$f->getIdFactura()."</td>";
			echo "<td>".$f->getFechaFactura()."</td>";
			echo "<td>".$f->getPagado()."</td>";
			echo "<td>".$f->getFechaPago()."</td>";
			echo "<td>".$f->getMetodoPago()."</td>";
			echo "<td>".$f->getIdCliente()."</td>";
			echo "<td>".$f->getActivo()."</td>";
			echo "</tr>";
		}

		echo "</table>";


	 ?>
</body>
</html>