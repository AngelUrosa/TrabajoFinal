
<?php
@session_start();
if (isset($_SESSION['cesta'])) {
    $copiaCesta = array();
    $tamanoCesta = sizeof($_SESSION['cesta']);
    for ($i = 0; $i < $tamanoCesta; $i++) {
        $pr = $_SESSION['cesta'][$i];
        array_push($copiaCesta, unserialize($pr));
    }  

    
$fotos = $_SESSION['fotos'];
echo "<h5>Productos actualmente en tu cesta:</h5><br><br>";
?>
<table class="table table-bordered table-hover">
    <thead thead-light>
        <tr>
            <th scope="col" class="bg-lightgreen">Referencia</th>
            <th scope="col" class="bg-lightgreen">Unidades</th>
            <th scope="col" class="bg-lightgreen">Descripción</th>
            <th scope="col" class="bg-lightgreen">PVP</th>
            <th scope="col" class="bg-lightgreen">IVA</th>
            <th scope="col" class="bg-lightgreen">Subtotal</th>
            <th scope="col" class="bg-lightgreen">Foto</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $baseImponible = 0;
    $ivaTotal = 0;

    $i = 0;
    $encontrado=false;
    foreach ($copiaCesta as $detalleProducto) {
        if ($detalleProducto->getUnidades()<1) {
            $detalleProducto->setUnidades(1);
            $subtotal = $detalleProducto->getPvp() * $detalleProducto->getUnidades();
        } else {
            $subtotal = $detalleProducto->getPvp() * $detalleProducto->getUnidades();
        }
        
        if (isset($fotos[$i])) {
            $rutaFoto=$fotos[$i];
            echo "<tr>"
                . "<td>" . $detalleProducto->getIdProducto() . "</td>"
                . "<td align='right'>" . $detalleProducto->getUnidades() . "</td>"
                . "<td>" . $detalleProducto->getDescripcion() . "</td>"
                . "<td align='right'>" . number_format($detalleProducto->getPvp(), 2) . " €" . "</td>"
                . "<td align='right'>" . $detalleProducto->getTipoIva() . "</td>"
                . "<td align='right'>" . number_format($subtotal, 2) . " €" . "</td>"
                . "<td><img style='height: 3%'; src='interfaz/" . $rutaFoto . "'" . "</td>"
                . "</tr>";
            $i++;
            $baseImponible += $subtotal;
            $ivaTotal += $subtotal * $detalleProducto->getTipoIva() / 100;
            $totalCompra = $baseImponible + $ivaTotal;
        }
    }
    ?>
    </tbody>
</table>
<?php
}
?>
<table class="table table-bordered table-striped">
    <thead thead-light>
        <tr>
            <th scope="col" class="bg-lightgreen">Base Imponible</th>
            <td> <?php echo number_format($baseImponible, 2) . " €"; ?></td>
            <th scope="col" class="bg-lightgreen">IVA</th>
            <td> <?php echo number_format($ivaTotal, 2) . " €"; ?></td>
            <th scope="col" class="bg-lightgreen">Total Pedido</th>
            <td> <?php echo number_format($totalCompra, 2) . " €"; ?></td>
        </tr>
    </thead>
</table>
<table class="bordered">
    <tr>
        <td>
            <form method="post" action="indexInicialAlumnos.php?principal=interfaz/vista_cliente/producto/catalogoProductosCarrito.php">
                <button type="submit" class="btn btn-grey">Seguir comprando</button>
            </form>
        </td>
        <td>
            <form method="post" action="indexInicialAlumnos.php?principal=interfaz/vista_cliente/generarPedido.php">
                <button type="submit" class="btn btn-darkgreen">Procesar Pedido</button>
            </form>
        </td>
    </tr>
</table>