<?php



@session_start();

if (!isset($_SESSION['cesta'])) {
    $_SESSION['cesta'] = array();
    $_SESSION['fotos'] = array();
    $_SESSION['ultimaPeticion'] = "";
}

$tProducto = Productos::singletonProductos();
$productos = $tProducto->getProductosTodos();

?>
<!DOCTYPE html>
<html lang="en"
>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Plantilla ERP DAM2 IES Castelar</title>

    <link rel="stylesheet" href="../../estilos.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background: #ECF4EF;">
<h1> Catálogo de productos</h1>
<div class="row" style="background: #CCE3D5;">

    <div class="container">
        <div class="row">

            <!--Panel central el catálogo de productos -->
            <div class="col-lg-12">

                <div class="row" style="background: #CCE3D5;">

                    <?php foreach ($productos as $pr) {
                        ?>
                        <div class="col-lg-3 col-md-6 p-2">
                            <div class="card h-100 mx-auto p-2" style="background: #C3E994">

                                <a href="#"> <img id="myImg" class="card-img-top"
                                                  src="<?php echo 'interfaz/' . $pr->getRutaFoto(); ?>"
                                                  alt="<?php echo $pr->getDescripcion(); ?>"
                                                  style="width:100%;height:100%"></a>


                                <div class="card-body mx-auto">
                                    <h4 class="card-title text-center" style="height: 28%;">
                                        <a href="#"><?php echo $pr->getDescripcion(); ?></a>
                                    </h4>
                                    <h5 class="text-center"><?php echo $pr->getPVP() . "€"; ?></h5>
                                    <p class="card-text text-center"
                                       style="height: 20%;"><?php echo $pr->getDescripcion(); ?></p>

                                    <div class="row">
                                        <form class="form-inline"
                                              action="indexInicial.php?principal=interfaz/vista_usuario/carrito_bootstrap.php"
                                              method="POST">
                                            <div class="row mx-auto p-2">
                                                <!-- mx-auto para centrar y p-2 para pading=2 -->
                                                <div class="col-6">
                                                    <input type="number" name="unidades" min="0" max="99" maxlength="2">
                                                </div>
                                            </div>
                                            <p>
                                                <input type="hidden" name="idProducto"
                                                       value="<?php echo $pr->getIdProducto(); ?>">
                                                <input type="hidden" name="descripcion"
                                                       value="<?php echo $pr->getDescripcion(); ?>">
                                                <input type="hidden" name="pvp" value="<?php echo $pr->getPVP(); ?>">
                                                <input type="hidden" name="tipoIva"
                                                       value="<?php echo $pr->getTipoIVA(); ?>">
                                                <input type="hidden" name="rutaFoto"
                                                       value="<?php echo $pr->getRutaFoto(); ?>">
                                            <div class="row mx-auto">
                                                <div class="col-6">

                                                    <input type="submit" class="btn btn-primary" value="Comprar"
                                                           name="comprar">
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                                <div class="card-footer">

                                    <small class="text-light bg-dark">Quedan <?php echo $pr->getStockActual(); ?>
                                        Unidades</small>
                                </div>
                            </div>
                        </div>
                    <?php } ?> <!-- fin del foreach -->

                </div>  <!-- /.row -->

            </div>   <!-- /.col-lg-12 -->
        </div>
    </div>       <!-- container -->

</div> <!--row principal-->


<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


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