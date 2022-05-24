<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Carrito">
    <meta name="author" content="dawjasevillag">
    <title>Carrito - IES Castelar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
    @session_start();
    $pulsacionF5 = $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'] . print_r($_POST, true);

    if ($_SESSION['ultimaPeticion'] != $pulsacionF5){

        $_SESSION['ultimaPeticion']=$pulsacionF5; //para que almacene ya la pulsación de F5 por si se pulsa después
        $copiaCesta=array();
        $tamanioCesta=sizeof($_SESSION['cesta']);
        for ($i=0;$i<$tamanioCesta;$i++) {
            $pr=$_SESSION['cesta'][$i];
            array_push($copiaCesta,unserialize($pr));
        }
        $idProducto = $_POST['idProducto'];
        if ($_POST['unidades']<1){
            $unidades=1;
        }
        else{
             $unidades = $_POST['unidades'];
        }
        $descripcion = $_POST['descripcion'];
        $pvp = $_POST['pvp'];
        $tipoIva = $_POST['tipoIva'];
        $fotoProducto = $_POST['rutaFoto'];

        $indice=0;
        $encontrado=false;
        while ($indice<$tamanioCesta && !$encontrado){
            $pr=$copiaCesta[$indice];
            if ($pr->getIdProducto()==$_POST['idProducto']){
                $encontrado=true;
                $pr->setUnidades($pr->getUnidades()+$unidades);
                $copiaCesta[$indice]=$pr;
            }
            else{
                $indice++;
            }
        }
        $detalleProducto = new LineaPedido(0, 0, $idProducto, $unidades, $descripcion, $pvp, $tipoIva, 1);
        if (!$encontrado){
                        array_push($copiaCesta, $detalleProducto);
                        array_push($_SESSION['fotos'], $fotoProducto);
        }
        
        /*
        $pulsacionF5 = $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'] . print_r($_POST, true);
        if ($_SESSION['ultimaPeticion'] == $pulsacionF5) {
                //echo 'Has pulsado F5';
            } 
            else {
                $_SESSION['ultimaPeticion'] = $pulsacionF5;
                if (!$encontrado){
                        array_push($copiaCesta, $detalleProducto);
                        array_push($_SESSION['fotos'], $fotoProducto);
                }
        }*/

        $fotos = $_SESSION['fotos'];
        echo "<h5>Productos actualmente en tu cesta: </h5><br><br>";
    ?>


    <table class="table table-bordered table-hover">
        <thead thead-light>
        <tr>
            <th scope="col">Referencia</th>
            <th scope="col">Unidades</th>
            <th scope="col">Descripción</th>
            <th scope="col">PVP</th>
            <th scope="col">IVA</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Foto</th>
        </tr>
        </thead>

        <tbody>

        <?php

        $baseImponible = 0;
        $ivaTotal = 0;
       
        $i = 0;
        $encontrado=false;
        foreach ($copiaCesta as $detalleProducto) {
            if ($detalleProducto->getUnidades()<1){
                $detalleProducto->setUnidades(1);
                $subtotal = $detalleProducto->getPvp() * $detalleProducto->getUnidades();
            }else{
                 $subtotal = $detalleProducto->getPvp() * $detalleProducto->getUnidades();
            }
            
            if (isset($fotos[$i])){
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
        //y ahora volcamos el contenido de $copiaCesta a la cesta de la session pero serializado
        $_SESSION['cesta']=array();
        foreach ($copiaCesta as $pr) {
            $detalleProducto=serialize($pr);
            array_push($_SESSION['cesta'],$detalleProducto);

        }
    
    ?>

    </tbody>

</table>


<table class="table table-bordered table-striped">
    <thead thead-light>
    <tr>
        <th scope="col">Base Imponible</th>
        <td> <?php echo number_format($baseImponible, 2) . " €"; ?>
        <th scope="col">IVA</th>
        <td> <?php echo number_format($ivaTotal, 2) . " €"; ?>
        <th scope="col">Total Pedido</th>
        <th> <?php echo number_format($totalCompra, 2) . " €"; ?>
    </tr>
    </thead>

</table>
<?php 
}
    else{
        echo "has pulsado f5";
        
        $_SESSION['ultimaPeticion']=$pulsacionF5;
    }
?>

<table class="bordered">
    <tr>
        <td>
            <form method="post" action="indexInicialAlumnos.php?principal=interfaz/vista_cliente/producto/catalogoProductosCarrito.php">

                <button type="submit" class="btn btn-success">Seguir comprando</button>

            </form>
        </td>
        <td>
            <form method="post" action="indexInicialAlumnos.php?principal=interfaz/vista_cliente/generarPedido.php">

                <button type="submit" class="btn btn-success">Procesar Pedido</button>

            </form>

        </td>
    </tr>
</table>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>