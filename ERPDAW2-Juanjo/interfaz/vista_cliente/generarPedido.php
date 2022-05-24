<?php

@session_start();
//print_r($_SESSION);
$idCliente = $_SESSION['idUsuario'];
$fechaPedido = date("Y-m-d");

$pagado = 1;
$activo = 1;
$fechaPago = date("Y-m-d");
$idEmpresaTransporte = "";
$idEmpleadoEmpaqueta = "";
$fechaEnvio = "";
$fechaEntrega = "";
$facturado = 0;
$fechaFactura = "";
$metodoPago = "";
$idPedido = "";
$idFactura = 0;
$activo = 1;
$id = 1;
//Creo el objeto Pedido con los datos base
$p = new Pedido($id, $idPedido,
    $idEmpleadoEmpaqueta,
    $idEmpresaTransporte,
    $fechaPedido, $fechaEnvio,
    $fechaEntrega, $facturado,
    $idFactura, $fechaFactura,
    $pagado, $fechaPago,
    $metodoPago, $idCliente, $activo);

$tPedido = Pedidos::singletonPedidos();
//Vamos a programar un algoritmo para codificar el idPedido
//Consideramos que el idPedido va a formarse por la concatenación del año
//actual (4 dígitos) + el id (autonumérico) con 6 dígitos
//(si el id tiene menos de 6 dígitos se rellenará con ceros a la izquierda)
//por ejemplo: 2021000015 (pedido número 15 de 2019). El primer pedido del
//año será el  2021000001

//Por lo tanto, cogeremos el año según la fecha del sistema. Buscaremos en la
//tabla pedidos si hay algún pedido para ese año.
//Si no hay, éste será el primero y se codificará como AAAA000001
//Si existe un pedido, se puede contar cuántos hay sumar una unidad para
//concatenar
$anio = substr($fechaPedido, 0, 4); //saco el año a partir de la fecha
echo "Este año es $anio <br>";
$numeroPedido = $tPedido->contarPedidos($anio); // averiguo cuántos hay de ese año
echo "hay $numeroPedido pedidos en este año";
if ($numeroPedido != -1) {
    $nuevoPedido = $numeroPedido + 1; //sumo 1

    $codigoString = (string)$nuevoPedido;
    $numCaracteres = strlen($nuevoPedido);
    $resta = 6 - $numCaracteres;
    for ($i = 1; $i <= $resta; $i++) {
        $codigoString = '0' . $codigoString;
    }
    $idPedido = $anio . '-' . $codigoString;
    echo "<br>El nuevo pedido es: $idPedido<br>";

    $p->setIdPedido($idPedido);
    $insertado = $tPedido->addUnPedido($p);
    if ($insertado) {
        //Para cada línea que tenga en la cesta, tengo que
        // construir un objeto de tipo Lineas_Pedidos e
        // insertarlo en la tabla lineas_pedidos
        $tLineasPedidos = LineasPedidos::singletonLineasPedidos();
        foreach ($_SESSION['cesta'] as $lC) {
            //fabrico el objeto
            $lineaCesta = unserialize($lC);
            $lc = new LineaPedido($id, $idPedido, $lineaCesta->getIdProducto(),
            $lineaCesta->getUnidades(), $lineaCesta->getDescripcion(),
                $lineaCesta->getPvp(), $lineaCesta->getTipoIva(), 1);
            $insertado = $tLineasPedidos->addUnaLineaPedido($lc);

        }
        if ($insertado) {
            echo "Pedido insertado";
        } else {
            echo "Ha habido un error: página 404";
        }
    }

    $_SESSION['idPedido'] = $idPedido; //Cargamos el idPedido en la sesión
    //para poder imprimirlo en pdf
    unset($_SESSION['cesta']);

}
?>
<center>
    <form name="formulario" method="post" action="interfaz/pdfs/imprimirPedidoPDF.php">
        <input type="submit" name="pdf" value="Imprimir Pedido">
    </form>
    <form name="formulario" method="post" action="IndexInicialAlumnos.php?principal=informativas/gracias.php">
        <input type="submit" name="cerrarSesion" value="Cerrar Sesión">
    </form>
</center>
<p><a href="IndexInicialAlumnos.php?principal=interfaz/vista_cliente/catalogoProductosCarrito.php">Seguir comprando</a></p>


<p><a href="cerrarSion.php">Cerrar Sesión</a></p>