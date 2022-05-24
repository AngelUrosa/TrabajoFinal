<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pedidos entre Fechas</title>
     <link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous" >
</head>
<body>
    
    
<?php
    $tPedido=Pedidos::singletonPedidos();
    


    echo "<form method='POST' id='formularioPedidosFechas' action='indexAdminAlumnos.php?principal=interfaz/vista_admin/Pedido/listadoPedidosEntreFecha.php'>";
    echo "<label for='dateStart'>Fecha de inicio:</label>";
    echo "<input type='date' class='form-control' id='dateStart' name='dateStart' required>";
    echo "<label for='dateEnd'>Fecha final:</label>";
    echo "<input type='date' class='form-control' id='dateEnd' name='dateEnd'>";
    echo "<input type='submit' class='btn btn-primary ml-3 mt-3' name='submitFechas' id='submitFechas' required>";
    echo "</form>";
    
    if (isset($_POST['submitFechas'])){
      
        $tp=$tPedido->listPedidosByFechas($_POST['dateStart'],$_POST['dateEnd']);
           

        echo "<br>";
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
            


            foreach ($tp as $p) { //f es un objeto de la clase  y visualizo cada $f en una fila
                echo "<tr>";
                    echo "<td class='bg-success'>".$p->getId()."</td>";
                    echo "<td class='bg-info'>".$p->getIdPedido()."</td>";
                    echo "<td class='table-info'>".$p->getIdEmpleadoEmpaqueta()."</td>";
                    echo "<td class='table-success'>".$p->getIdEmpresaTransporte()."</td>";
                    echo "<td>".$p->getFechaPedido()."</td>";
                    echo "<td>".$p->getFechaEnvio()."</td>";
                    echo "<td>".$p->getFechaEntrega()."</td>";
                    echo "<td>".$p->getFacturado()."</td>";
                    echo "<td class='table-warning'>".$p->getIdFactura()."</td>";
                    echo "<td>".$p->getFechaFactura()."</td>";
                    echo "<td>".$p->getPagado()."</td>";
                    echo "<td>".$p->getFechaPago()."</td>";
                    echo "<td>".$p->getMetodoPago()."</td>";
                    echo "<td class='bg-info'>".$p->getIdCliente()."</td>";
                    echo "<td>".$p->getActivo()."</td>";
                echo "</tr>";   
            }
            echo "</table>";



        
    }

?>

</body>
</html>