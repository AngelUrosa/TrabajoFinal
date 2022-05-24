<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="dawjasevillag">
    <meta name="description" content="Vista cliente - IES Castelar">
    <link rel="stylesheet" href="css/erp.css">
    <link rel="shortcut icon" href="logo.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/erp.css">
    <script src="node_modules/jquery/dist/jquery.min.js" defer></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js" defer></script>
    <script src="node_modules/node-json2html/json2html.js" defer></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js" defer></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js" defer></script>
    <title>Vista cliente - IES Castelar</title>
</head>
<body>
    <?php 
        function cargaClasesPojos($nombreClase){
            if (file_exists("pojos/".$nombreClase . '.php')) {
                require_once "pojos/". $nombreClase . '.php';
            }
        }

        function cargaClasesPersistencia($nombreClase){
            if (file_exists("persistencia/".$nombreClase . '.php')) {
                require_once "persistencia/". $nombreClase . '.php';
            }
        }

        spl_autoload_register("cargaClasesPojos"); // Acepta un nombre de función
        spl_autoload_register("cargaClasesPersistencia");
        $tUsuario = Usuarios::singletonUsuarios();
        session_start();
    
        if (isset($_GET['cerrarsesion'])){
            unset ($_SESSION['user']);
            unset ($_SESSION['idUsuario']);
            session_destroy();
        } else {
            $_SESSION['user']='anonimo';
            $_SESSION['idUsuario']="000000000";  
        }

        $tFamilia = FamiliasProductos::singletonFamiliasProductos();
        $familias = $tFamilia->getFamiliasProductos();

        $tProducto = Productos::singletonProductos();
        $productos = $tProducto->getProductosTodos();

        if (isset($_SESSION['cesta'])) {
            $copiaCesta = array();
            $tamano = sizeof($_SESSION['cesta']); // Se usa para el bucle for
            for ($i=0; $i < $tamano; $i++) {
                $pr = $_SESSION['cesta'][$i];
                array_push($copiaCesta, unserialize($pr));
            }
            $tamanoCesta = 0; // Reiniciamos la variable
            foreach ($copiaCesta as $detalleProducto) {
                $tamanoCesta += $detalleProducto->getUnidades();
            }
        } else {
            $tamanoCesta = 0;
        }
    ?>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-darkgrey">
            <a class="navbar-brand ps-3" href="indexInicialAlumnos.php?principal=interfaz/informativas/inicio.php">
                    <img src="interfaz\fotos\logo100.png">
                </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link"
                        href="indexInicialAlumnos.php?principal=interfaz/informativas/servicios.php">
                            Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                        href="indexInicialAlumnos.php?principal=interfaz/informativas/inicio.php">
                            Ofertas
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item"
                                href="indexInicialAlumnos.php?principal=interfaz/vista_cliente/producto/catalogoProductosCarrito.php">
                                    Ver todos
                                    <span class="badge">
                                        <?php
                                            echo (sizeof($productos));
                                        ?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexInicialAlumnos.php?principal=interfaz/vista_cliente/producto/verFamiliasDeProductos.php">
                                    Familias de Productos
                                    <span class="badge">
                                        <?php
                                            echo (sizeof($familias));
                                        ?>
                                    </span>
                                </a>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle"
                                href="indexInicialAlumnos.php?principal=interfaz/informativas/inicio.php">
                                    Categorías
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- Ahora montamos el bucle para sacar la NOMBRE de cada
                                    familia y generar una opción de menú con cada una -->
                                    <?php
                                        foreach ($familias as $fila) {
                                    ?>
                                    <li>
                                        <a class="dropdown-item"
                                        href="IndexInicial.php?principal=informativas/inicio.php">
                                            <?php
                                                echo $fila->getNombre();
                                            ?>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                        href="indexInicialAlumnos.php?principal=interfaz/informativas/inicio.php">
                            Garantía
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                        href="indexInicialAlumnos.php?principal=interfaz/informativas/nuestrosEmpleados.php">
                            Nuestros empleados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                        href="indexInicialAlumnos.php?principal=interfaz/informativas/nuestrosAlmacenes.php">
                            Nuestros almacenes
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                            Mi cuenta
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="list-inline-item">
                                <?php
                                    // Muestra el nombre de usuario si hay un usuario en  $_SESSION['user']
                                    // if (isset($_SESSION['user'])) {
                                    echo "<div class='form-group'>";
                                    echo "<h3>      ".$_SESSION['user']."</h3>";
                                    echo "</div>";
                                    echo "<div class='dropdown-divider'></div>";
                                ?>
                                <li>
                                    <a class="dropdown-item"
                                    href="indexInicialAlumnos.php?principal=interfaz/vista_cliente/pedido/misPedidos.php">
                                        Mis pedidos
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                    href="indexInicialAlumnos.php?principal=interfaz/vista_cliente/misDatos.php">
                                        Mis datos
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" value="cerrarSion" name="cerrarSion"
                                    href="indexInicialAlumnos.php?cerrarsesion=sesioncerrada">
                                        Cerrar sesión
                                    </a>
                                </li>
                            <?php
                                // } else {
                            ?>
                            <li>
                                <a class="dropdown-item"
                                href="indexInicialAlumnos.php?principal=interfaz/vista_cliente/usuario/altaUsuario.php">
                                    Registro
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexInicialAlumnos.php?principal=interfaz/vista_cliente/inicioCliente.php">
                                    Iniciar sesión
                                </a>
                            </li>
                            <?php
                                //  }
                            ?>
                        </ul>
                    </li>
                    <a class="nav-link" href="indexInicialAlumnos.php?principal=interfaz/vista_cliente/mostrarCarrito.php">
                        <button type="button" class="btn btn-lightgreen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                            class="bi bi-basket" viewBox="0 0 16 16">
                                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                            Carrito
                            <span class="contadorCarrito badge badge-light">
                                <?php
                                    echo $tamanoCesta;
                                ?>
                            </span>
                        </button>
                    </a>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <!-- Parte izquierda de la pantalla (aside) -->
            <div class="col-lg-3">
                <!--Elementos sueltos del menú lateral-->
                <div class="dropdown menu">
                    <a class="dropdown-item button-green"
                    href="indexInicialAlumnos.php?principal=interfaz/informativas/inicio.php">
                        Inicio
                    </a>
                    <a class="dropdown-item button-green"
                    href="indexInicialAlumnos.php?principal=interfaz/informativas/contacta.php">
                        Contacta
                    </a>
                    <a class="dropdown-item button-green"
                    href="indexInicialAlumnos.php?principal=interfaz/informativas/dondeEstamos.html">
                        Dónde estamos
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item button-green"
                    href="indexInicialAlumnos.php?principal=interfaz/informativas/acercade.php">
                        Acerca de nosotros
                    </a>
                </div>
            </div>
            <!-- Parte derecha de la pantalla (section) -->
            <div class="col-lg-9">
                <?php
                    if (isset($_GET['principal'])) {
                        require_once $_GET['principal'];
                    } else {
                        require_once "interfaz/informativas/inicio.php";
                        require_once "carrusel02.php";
                    }
                ?>
            </div>
        </div>
    </div>
    <br>
    <footer class="py-3 bg-darkgrey">
        <div class="container">
            <p class="m-0 text-center text-white">© José Antonio Sevilla Galán 2021-22 <img src="interfaz/fotos/logo100.png"></p>
        </div>
    </footer>
</body>
</html>