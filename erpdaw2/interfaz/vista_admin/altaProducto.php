<?php
@session_start();
            require_once 'pojos/Producto.php';
            require_once 'persistencia/Productos.php';
            require_once 'pojos/FamiliaProducto.php';
            require_once 'persistencia/FamiliasProductos.php';

            $submit = filter_input(INPUT_POST, 'alta');

if (isset($submit)) { //si se ha pulsado el botón de guardar

 $tProducto = Productos::singletonProductos();

    //aislamos las variables que vienen del formulario
    $familia = filter_input(INPUT_POST, 'familia');

    $nombre = filter_input(INPUT_POST, 'nombre');

    $nombreOriginal = $_FILES['foto']['name'];
    //echo "<br>El nombre de la images es: $nombreOriginal<br>";
    $posPunto = strpos($nombreOriginal, ".") + 1;
    $extensionOriginal = substr($nombreOriginal, $posPunto, 3);

    $tipo = $_FILES['foto']['type'];
    $tamanio = $_FILES['foto']['size'];

    //Algoritmo para guardar el código de producto formateado según alguna formúla
    //echo "La familia es: $familia<br>";
    $id = $tProducto->getUltimoProductoFamilia($familia) + 1; //Averiguamos cuál es el id del último producto según la familia que entra

    $codigoString = (string)$id; //600007

    $numCaracteres = strlen($codigoString);
    $resta = 5 - $numCaracteres;
    for ($i = 1; $i <= $resta; $i++) {
        $codigoString = '0' . $codigoString;
    }
    $codigoFormateado = $familia . $codigoString;

    $nombreNuevo = "fotos/productos/pro_" . $codigoFormateado . "." . $extensionOriginal;
    echo "El nuevo nombre va a ser: $nombreNuevo";
    $error = move_uploaded_file($_FILES['foto']['tmp_name'], 'interfaz/' . $nombreNuevo);

    if ($error == 0) {
        echo "Se ha producido un error en la subida" . "<br>";
    } else {
        $idProducto = $codigoFormateado;
        $descripcion = $nombre;
        $rutaFoto = $nombreNuevo;
        $pvp = filter_input(INPUT_POST, 'pvp');
        $precioCoste = filter_input(INPUT_POST, 'pCoste');
        $tipoIva = filter_input(INPUT_POST, 'iva');
        $codigoBarras = filter_input(INPUT_POST, 'codigoBarras');
        $idProveedor = filter_input(INPUT_POST, 'idProveedor');
        $stockActual = filter_input(INPUT_POST, 'stockActual');
        $stockMinimo = filter_input(INPUT_POST, 'stockMinimo');
        $stockMaximo = filter_input(INPUT_POST, 'stockMaximo');
        $codigoBarras = filter_input(INPUT_POST, 'codigoBarras');
        $activo = 1;
        $p = new Producto(0, $idProducto, $familia, $tipoIva, $precioCoste, $pvp, $descripcion,
            $codigoBarras, $idProveedor, $stockActual, $stockMinimo, $stockMaximo,
            $rutaFoto, $activo);

        $insertado = $tProducto->addProducto($p);
        if ($insertado) {
            echo "Producto insertado correctamente";
        } else {
            echo "Error en la inserción del producto";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Kevin Leal">


    <!-- Bootstrap CSS en la web-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link rel="stylesheet" href="estilos.css">
    <title>Alta de un Producto</title>
</head>
<body>
<h1>Formulario de alta de un Producto </h1>


 <form class="form-horizontal" name="formularioProductos"
    action="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaProducto.php"
    method="POST" enctype="multipart/form-data">
     <?php
    $tFamilia = FamiliasProductos::singletonFamiliasProductos();
    $todasFamilias = $tFamilia->getFamiliasProductosTodos();
    ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Familia:</label>
        <div class="form-group">
                    <label for="nombre" class="control-label">Familia:</label>

                    <select name="familia" class="custom-select">
                        <?php
                        foreach ($todasFamilias as $f) {
                            $idFamilia = $f->getIdFamilia();

                            $nombreFamilia = $f->getNombre();

                            echo '<option value="' . $idFamilia . '">' . $nombreFamilia . '</option>';

                        }
                        ?>
                    </select>
                </div>
    </div>
                <div class="form-group">
                    <label for="descripcion" class="control-label">Descripción:</label>
                    <input type="text" class="form-control" id="descripcion" name="nombre"
                           placeholder="Nombre del producto">
                </div>
                <div class="form-group">
                    <label for="pvp" class="control-label">PVP:</label>
                    <input type="text" class="form-control" id="pvp" name="pvp" placeholder="Precio venta al público">
                </div>

                <div class="form-group">
                    <label for="pCoste" class="control-label">Precio de Coste:</label>
                    <input type="text" class="form-control" id="pCoste" name="pCoste" placeholder="Precio de coste">
                </div>
                <div class="form-group">
                    <label for="iva" class="control-label">Tipo de IVA:</label>
                    <input type="text" class="form-control" name="iva" placeholder="IVA en tanto por ciento">
                </div>
                <div class="form-group">
                    <label for="foto" class="control-label">Foto del producto:</label>
                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Localiza una foto">
                </div>

                <div class="form-group">
                    <label for="stockMinimo" class="control-label">Stock Mínimo:</label>
                    <input type="text" class="form-control" name="stockMinimo" placeholder="Stock Mínimo">
                </div>
                <div class="form-group">
                    <label for="stockMaximo" class="control-label">Stock Máximo:</label>
                    <input type="text" class="form-control" name="stockMaximo" placeholder="Stock Máximo">
                </div>
                <div class="form-group">
                    <label for="stockActual" class="control-label">Stock Actual:</label>
                    <input type="text" class="form-control" name="stockActual" placeholder="Stock Actual">
                </div>
                <div class="form-group">
                    <label for="codigoBarras" class="control-label">Código de barras:</label>
                    <input type="text" class="form-control" name="codigoBarras" placeholder="Código de barras">
                </div>
                <div class="form-group">
                    <label for="idProveedor" class="control-label">Proveedor:</label>
                    <input type="text" class="form-control" name="idProveedor" placeholder="Referencia del proveedor">
                </div>

    <div class="form-row">
        <div class="form-group col-md-4 text-right ">
            <button type="submit" name="alta" class="btn btn-primary">Guardar</button>
        </div>

        <div class="form-group col-md-4 text-left">
            <button type="reset" name="cerrar" class="btn btn-secondary">Cancelar</button>
        </div>
    </div>

</form>




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