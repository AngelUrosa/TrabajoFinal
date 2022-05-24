<!DOCTYPE html>
<html>
<head>
	<title>Listado de Clientes.</title>
</head>
<body>

<?php

	$tPedido=Pedidos::singletonPedidos();
	//voy a llamar a la persistenci y devolver un array de objetos
	$tP=$tPedido->getPedidosTodos();

	//print_r($tf);

	echo"<table border='1'>";
	echo"<tr>";
	echo "<td> Id </td>";
	echo "<td> Id pedido </td>";
	echo "<td> id Empleado empaqueta</td>";
	echo "<td> id empresa de trasnporte </td>";
	echo "<td> fecha pedido </td>";
    echo "<td> fecha envio </td>";
    echo "<td> fecha entrega </td>";
    echo "<td> facturado </td>";
    echo "<td> id factura </td>";
    echo "<td> fecha factura </td>";
    echo "<td> Pagado </td>";
    echo "<td> Metodo de pago </td>";
    echo "<td> Id cliente </td>";
    echo "<td> Activo </td>";


    foreach ($tP as $f) {
        //$f es un objeto de la clase FamiliaProducto 
        //visualizamos cada $f en una fila de la tabla
        echo "<tr>";
        echo "<td>".$f->getId()."</td>";
        echo "<td>".$f->getIdPedido()."</td>";
        echo "<td>".$f->getIdEmpleadoEmpaqueta()."</td>";
        echo "<td>".$f->getIdEmpresaTransporte()."</td>";
        echo "<td>".$f->getFechaPedido()."</td>";
        echo "<td>".$f->getFechaEnvio()."</td>";
        echo "<td>".$f->getFechaEntrega()."</td>";
        echo "<td>".$f->getFacturado()."</td>";
        echo "<td>".$f->getIdFactura()."</td>";
        echo "<td>".$f->getFechaFactura()."</td>";
        echo "<td>".$f->getPagado()."</td>";
        echo "<td>".$f->getMetodoPago()."</td>";
        echo "<td>".$f->getIdCliente()."</td>";
        echo "<td>".$f->getActivo()."</td>";
    
        echo "</tr>";
    }
    echo "</table>";
    ?>
    
    </body>
    </html>
    
    