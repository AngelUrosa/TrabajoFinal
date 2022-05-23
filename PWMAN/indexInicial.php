<?php
    session_start();
    if (isset($_GET['cerrarSesion'])){
        session_unset();
    }

    if ($_SESSION['autorizacion'] == false) {
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="dawjasevillag">
    <meta name="description" content="Página de inicio">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="logo.ico">
    <script src="node_modules/jquery/dist/jquery.min.js" defer></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js" defer></script>
    <script src="node_modules/node-json2html/json2html.js" defer></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js" defer></script>
    <script src="js/tablas_ajax.js" defer></script>
    <script src="js/crud_ajax.js" defer></script>
    <script src="js/modal.js" defer></script>
    <script src="js/formulario.js" defer></script>
    <script src="js/paginacion.js" defer></script>
    
    <title>Página de inicio</title>
</head>
<body class="ps-3 pe-3">
    <nav class="mt-3" aria-label="Menú de navegación">
        <a class="p-3 float-start" href="indexInicial.php">
            <img class="img-fluid" src="interfaz\imagenes\logo100.png" alt="Logo">
        </a>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="nav-password-tab" data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-password" aria-selected="false">Listado de contraseñas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="nav-register-tab" data-bs-toggle="tab" data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register" aria-selected="false">Registros</button>
            </li>
            <li class="nav-item" role="presentation">
                <form>
                    <button class="nav-link" type="submit" value="cerrarsesion" id="cerrarSesion" name="cerrarSesion" data-bs-toggle="tab"><i class="bi bi-box-arrow-left"></i></button>
                </form>
            </li>
        </ul>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
            <?php                 
                require_once "interfaz/contraseñas/listadoContraseñas.php";
            ?>
        </div>
        <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
            <?php                 
                require_once "interfaz/registros/registros.php";
            ?>
        </div>
    </div>
    </div>
    <footer class="py-3 bg-secondary border-2 border-top border-black">
        <div class="container">
            <p class="m-0 text-center text-white"><strong>© José Antonio Sevilla Galán 2021-22</strong></p>
        </div>
    </footer>
</body>
</html>