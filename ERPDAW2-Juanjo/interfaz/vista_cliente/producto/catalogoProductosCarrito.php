<head>
    <script src='js/modal.js' defer></script>
    <script src='js/carrito.js' defer></script>
</head>
<script>
    window.addEventListener('load', () => {
        //Asigna el evento click al botón del carro
        $('.botonCarro').on('click', (evento) => {
            // Evitamos la acción por defecto
            evento.preventDefault();

            // Enviar el producto al carro

            // Si el envío es satisfactorio, tengo que añadirlo al widget del carro
            actualizarContadorCarrito(5);

            // Por el contrario, tengo que mostrar un mensaje de error
            mostrarAlert('Ha ocurrido un error al actualizar el carrito');
        });
    });
</script>
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
<h1>Catálogo de productos</h1>
<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <div class="row">
                    <?php
                        foreach ($productos as $pr) {
                    ?>
                    <div class="col-lg-3 col-md-6 p-2">
                        <div class="card h-100 mx-auto p-2 bg-lightgreen">
                            <img id="myImg" class="card-img-top"
                            src="<?php echo 'interfaz/' . $pr->getRutaFoto(); ?>"
                            alt="<?php echo $pr->getDescripcion(); ?>"
                            >
                            <div class="card-body">
                                <h3 class="card-title text-center mb-4" style="height: 20%;">
                                    <?php
                                        echo $pr->getDescripcion();
                                    ?>
                                </h3>
                                <h5 class="text-center mt-3">
                                    <?php
                                        echo $pr->getPVP() . "€";
                                    ?>
                                </h5>
                                <div class="row">
                                    <form class="form-inline"
                                    action="indexInicialAlumnos.php?principal=interfaz/vista_cliente/carrito.php"
                                    method="POST">
                                        <div class="row">
                                            <div class="col-6 mx-auto">
                                                <input class="w-100 p-1 form-control bg-white" type="number" name="unidades" min="0" max="99" maxlength="2">
                                            </div>
                                        </div>
                                        <p>
                                            <input type="hidden" name="idProducto" value="<?php echo $pr->getIdProducto(); ?>">
                                            <input type="hidden" name="descripcion" value="<?php echo $pr->getDescripcion(); ?>">
                                            <input type="hidden" name="pvp" value="<?php echo $pr->getPVP(); ?>">
                                            <input type="hidden" name="tipoIva" value="<?php echo $pr->getTipoIVA(); ?>">
                                            <input type="hidden" name="rutaFoto" value="<?php echo $pr->getRutaFoto(); ?>">
                                            <div class="row mx-auto">
                                                <div class="d-flex flex-column">
                                                    <input type="submit" class="botonComprar btn btn-grey mb-2" value="Comprar">
                                                    <input type="submit" class="botonCarro btn btn-grey mb-2" value="Al carro">
                                                    <input type="submit" class="botonPopupCarro btn btn-grey mb-2" value="Popup">
                                                </div>
                                            </div>
                                        </p>
                                    </form>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-light bg-dark">
                                        Quedan
                                        <?php
                                            echo $pr->getStockActual();
                                        ?>
                                        Unidades
                                    </small>
                                </div>
                            </div>
                        </div>
                    <?php } ?> <!-- fin del foreach -->

                </div>  <!-- /.row -->

            </div>   <!-- /.col-lg-12 -->
        </div>
    </div>       <!-- container -->

</div> <!--row principal-->