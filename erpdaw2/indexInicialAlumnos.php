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

    spl_autoload_register("cargaClasesPojos"); //acepta un nombre de función
    spl_autoload_register("cargaClasesPersistencia");
    $tUsuario = Usuarios::singletonUsuarios();

    session_start(); 
 
    if (isset($_GET['cerrarsesion'])){
        unset ($_SESSION['user']);
        unset ($_SESSION['idUsuario']);
        session_destroy();
     }
     else{
        //Cambiar esto cuando proceda
        $_SESSION['user']='anonimo';
        $_SESSION['idUsuario']="000000000";  
    }

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="José Antonio Guijarro">
    <!-- Bootstrap CSS en la web-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <title> Plantilla para la vista de clientes del ERP IES Castelar 2021</title>
</head>


<body>

<?php
    $tFamilia = FamiliasProductos::singletonFamiliasProductos();
    $familias = $tFamilia->getFamiliasProductosTodos();
    $tProductos= Productos::singletonProductos();
    $productos=$tProductos->getProductosTodos();

    //var_dump($familias);
?>
<div class="container"> <!--contenedor principal-->
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <a class="navbar-brand pb-2" href="indexInicialAlumnos.php?principal=interfaz/informativas/inicio.php">IES Castlelar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="indexInicialAlumnos.php?principal=interfaz/informativas/servicios.php">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexInicialAlumnos.php?principal=interfaz/informativas/inicio.php">Ofertas</a>
            </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"> Productos </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item"
                               href="indexInicialAlumnos.php?principal=interfaz/vista_usuario/catalogoProductosCarrito.php">Ver
                                todos <span class="badge">
                                    <?php
                                echo(sizeof($productos));
                                ?>
                                <!--Mostrar número de productos-->
                            </span></a></a></li>
                            <li><a class="dropdown-item"
                               href="indexInicialAlumnos.php?principal=interfaz/vista_usuario/verFamiliasDeProductos.php">Familias de Productos <span class="badge">
                                <!--Mostrar número de productos-->
                            </span></a></a></li>

                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle"
                                                        href="indexInicialAlumnos.php?principal=interfaz/informativas/inicio.php">Categorías</a>
                            <ul class="dropdown-menu">
                                <!--
                                Ahora montamos el bucle para sacar la NOMBRE de cada
                                familia y generar una opción de menú con cada una
                                -->
                                <?php
                                foreach ($familias as $fila) {
                                    ?>
                                    <li>

                                        <a class="dropdown-item"
                                           href="IndexInicial.php?principal=informativas/inicio.php"> <?php echo $fila->getNombre();
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
                    <a class="nav-link" href="indexInicialAlumnos.php?principal=interfaz/informativas/inicio.php">Garantía</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="indexInicialAlumnos.php?principal=interfaz/informativas/nuestrosEmpleados.php">Nuestros
                        Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="indexInicialAlumnos.php?principal=interfaz/informativas/nuestrosAlmacenes.php">Nuestros
                        almacenes</a>
                </li>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"> Mi cuenta </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                     <li class="list-inline-item">
                         <?php
                        //Muestra el nombre de usuario si hay un usuario en  $_SESSION['user']
                        //if (isset($_SESSION['user'])) {
                            echo "<div class='form-group'>";
                            echo "<h3>      ".$_SESSION['user']."</h3>";
                            echo "</div>";
                            echo "<div class='dropdown-divider'></div>";
                            ?>
                            <li><a class="dropdown-item" href="indexInicialAlumnos.php?principal=interfaz/vista_usuario/misPedidos.php">Mis
                                Pedidos</a></li>
                        <li><a class="dropdown-item" href="indexInicialAlumnos.php?principal=interfaz/vista_usuario/misDatos.php">Mis Datos</a></li>
                               <li><a class="dropdown-item" value="cerrarSion" name="cerrarSion" href="indexInicialAlumnos.php?cerrarsesion=sesioncerrada">Cerrar
                                Sesión</a></li> 
                            <?php
                     //   }else{
                            ?>
                           <li><a class="dropdown-item"
                               href="indexInicialAlumnos.php?principal=interfaz/vista_cliente/registroCliente.php">Registro</a></li>
                        <li><a class="dropdown-item"
                               href="indexInicialAlumnos.php?principal=interfaz/vista_cliente/inicioCliente.php">Iniciar
                                Sesión</a></li>

                            <?php
                      //  }

                    ?>
                       
                        
                        

                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>


    <!--Vamos a programar ahora la parte por debajo de las barras de navegación

    Empezaremos por un contenedor que tendrá dos div's: uno que defina la parte izquierda, y otro que se encargue de la parte derecha
    -->

    <div class="container">

        <div class="row">
            <!------------------------Parte izquierda de la pantalla (aside)     ------------------>
            <div class="col-lg-3">
                <!--Elementos sueltos del menú lateral-->

                <div class="dropdown menu">
                    <a class="dropdown-item" href="indexInicialAlumnos.php?principal=interfaz/informativas/inicio.php"> Inicio </a>
                    <a class="dropdown-item" href="indexInicialAlumnos.php?principal=interfaz/informativas/contacta.php"> Contacta </a>
                    <a class="dropdown-item" href="indexInicialAlumnos.php?principal=interfaz/informativas/dondeEstamos.html"> Dónde
                        estamos </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="indexInicialAlumnos.php?principal=interfaz/informativas/acercade.php"> Acerca de
                        nosotros </a>
                </div>

            </div>

            <!------------------------Parte derecha de la pantalla (section)     ------------------>
 
            <div class="col-lg-9">
                <!--Parte derecha de la pantalla-->
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
        


    <!--por último, colocaremos la parte del footer-->


    <footer class="py-3 bg-info">
        <div class="container">
            <p class="m-0 text-center text-white">José Antonio Guijarro Guijarro 2021</p>
            <p class="m-0 text-right text-dark">IES Castelar(Badajoz)</p>
        </div>

    </footer>

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
</div> <!--contenedor principal-->


</body>
</html> 