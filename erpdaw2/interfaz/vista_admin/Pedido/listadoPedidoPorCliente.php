<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos por Cliente</title>
</head>
<body>
    
<?php
    $tCliente=Clientes::singletonClientes();
    $tc=$tCliente->getClientesTodos();
    echo "<form name='formProductoCliente' method='POST' action='indexAdminAlumnos.php?principal=interfaz/vista_admin/Pedido/listadoPedidoPorCliente.php'>";
    echo "<div class='mb-3'>";
    echo "<select name='clienteSeleccionado' class='form-control'>"; //col-lg-100
    foreach($tc as $cliente){
        echo "<option value='".$cliente->getIdCliente()."'>".$cliente->getIdCliente()." ".$cliente->getNombre()."</option>";
    }
    echo "</select>";
    echo "<button type='submit' name='submitProductoCliente' class='btn btn-primary'>Enviar</button>";
    echo "</form>";

    if (isset($_POST['submitProductoCliente'])){

       echo "<table class='table table-hover'>";
               echo "<tr class='table-success'>";
                echo "<td scope='col'>Id</td>";
                echo "<td scope='col'>Id_pedido</td>";
                echo "<td scope='col'>Id_Empleado_Empaqueta</td>";
                echo "<td scope='col'>Id_Empleado_Transporte</td>";
                echo "<td scope='col'>Fecha_Pedido</td>";
                echo "<td scope='col'>Fecha_envio</td>";
                echo "<td scope='col'>Fecha_Entrega</td>";
                echo "<td scope='col'>Facturado</td>";
                echo "<td scope='col'>Id_Factura</td>";
                echo "<td scope='col'>Fecha_Factura</td>";
                echo "<td scope='col'>Pagado</td>";
                echo "<td scope='col'>Fecha_Pago</td>";
                echo "<td scope='col'>Metodo_Pago</td>";
                echo "<td scope='col'>Id_Cliente</td>";
                echo "<td scope='col'>Activo</td>";
                echo "</tr>";
            
    
    $tPedido=Pedidos::singletonPedidos();
    print_r("\n<p>El cliente es:\n</p> ");
    print_r($_POST['clienteSeleccionado']);
    $tp=$tPedido->listPedidoByIdCliente($_POST['clienteSeleccionado']);
    foreach ($tp as $f) { //f es un objeto de la clase FamiliaProducto y visualizo cada $f en una fila
        echo "<tr>";
            echo "<td class='bg-success'>".$f->getId()."</td>";
            echo "<td class='bg-info'>".$f->getIdPedido()."</td>";
            echo "<td class='table-info'>".$f->getIdEmpleadoEmpaqueta()."</td>";
            echo "<td class='table-success'>".$f->getIdEmpresaTransporte()."</td>";
            echo "<td>".$f->getFechaPedido()."</td>";
            echo "<td>".$f->getFechaEnvio()."</td>";
            echo "<td>".$f->getFechaEntrega()."</td>";
            echo "<td>".$f->getFacturado()."</td>";
            echo "<td class='table-warning'>".$f->getIdFactura()."</td>";
            echo "<td>".$f->getFechaFactura()."</td>";
            echo "<td>".$f->getPagado()."</td>";
            echo "<td>".$f->getFechaPago()."</td>";
            echo "<td>".$f->getMetodoPago()."</td>";
            echo "<td class='bg-info'>".$f->getIdCliente()."</td>";
            echo "<td>".$f->getActivo()."</td>";
        echo "</tr>";
    }
    echo "</table>";

    }


?>

</body>
</html>