<!DOCTYPE html>
 <html lang="es">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="dawjasevillag">
    <meta name="description" content="ERPDAW2">
    <link rel="shortcut icon" href="logo.ico">
    <link rel="stylesheet" href="css/erp.css">
    <script src="node_modules/jquery/dist/jquery.min.js" defer></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js" defer></script>
    <script src="node_modules/node-json2html/json2html.js" defer></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js" defer></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js" defer></script>
    <title>Vista admin - IES Castelar</title>
</head>
<body>
    <?php
        function cargarClasesPojos($nombreClase){
            if (file_exists("pojos/".$nombreClase . '.php')) {
                require_once "pojos/". $nombreClase . '.php';
            }
        }

        function cargarClasesPersistencia($nombreClase){
            if (file_exists("persistencia/".$nombreClase . '.php')) {
                require_once "persistencia/". $nombreClase . '.php';
            }
        }

        spl_autoload_register('cargarClasesPojos');
        spl_autoload_register('cargarClasesPersistencia');
    ?>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-grey">
            <a class="navbar-brand ps-3" href="indexAdminAlumnos.php?principal=interfaz/informativas/inicio.php">
                <img src="interfaz\fotos\logo100.png">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarClientes" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person-fill"></i> Clientes</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarClientes">
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/cliente/AltaCliente.php">
                                    A??adir cliente
                                </a>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/cliente/altaCliente2.php">
                                    A??adir cliente 2
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/cliente/modificarCliente.php">
                                    Editar/Modificar datos y direcciones
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/cliente/filtrarClientes.php">
                                        Filtros de clientes
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/cliente/listadoClientesTodos.php">
                                    Listado de clientes
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/cliente/pruebas.php">
                                    Gr??ficos de compras entre fechas
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarEmpleados" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-workspace"></i> Empleados</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarEmpleados">
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/empleado/altaEmpleados.php">
                                    A??adir empleado
                                </a>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/empleado/altaEmpleados2.php">
                                    A??adir empleado 2
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/empleado/modificarEmpleado.php">
                                    Editar/Modificar datos y direcciones
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/empleado/filtrarEmpleados.php">
                                    Filtros de Empleados
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/empleado/listadoEmpleados.php">
                                    Listado de pedidos/facturas empaquetadas por un empleado
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/empleado/GraficosEmpleadosBootstrap.php">
                                    Gr??ficos de actividad entre fechas
                            </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarFamilias" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-people-fill"></i> Familias</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarFamilias">
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/familia/altaFamilia.php">
                                    A??adir familia
                            </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/familia/modificarFamilias.php">
                                    Eliminar/Modificar familias
                            </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/familia/listadoFamilias.php">
                                    Listar familias
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarProductos" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-boxes"></i> Productos</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarProductos">
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/producto/altaProducto.php">
                                    A??adir producto
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/vista_admin/producto/modificarProducto.php">
                                    Eliminar/Modificar producto
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/producto/filtrarProductos.php">Filtros
                                    de Productos</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/producto/filtrarProductoFamilia.php">Cat??logo
                                    de productos por familia</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/producto/listadoProductoPedido.php">Listado
                                    Pedidos donde aparece un producto</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/producto/listadoClienteDeUnDetProducto.php">Listado
                                    Clientes que han comprado un determinado producto</a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/producto/GraficosProductosBootstrap.php">Gr??ficos
                                    de compras (top ten)</a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarPedidos" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-receipt-cutoff"></i> Pedidos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarPedidos">
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/pedido/listadoTodosPedidos.php">Todos
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/pedido/listadoPedidosEntreFecha.php">Listado
                                    entre fechas
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/pedido/listadoPedidoPorCliente.php">Listado
                                    por cliente
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/pedido/facturadoPedido.php">Facturar
                                    Pedido
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/pedido/listadoEmpleadoQueEmpaqueta.php">Listado
                                    por empleado que empaqueta</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/pedido/listadoEmpresaQueTransporta.php">Listado
                                    por empresa de transporte</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                href="indexAdminAlumnos.php?principal=interfaz/informes/graficos/graficos.php">
                                    Gr??ficos de pedidos por mes
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarProveedores" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-video2"></i> Proveedores</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarProveedores">
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/proveedor/altaProveedor.php">Alta
                                    Proveedores</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/proveedor/listadoProveedor.php">Listado
                                    Proveedores</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUsuarios" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-ui-checks"></i> Usuarios/Roles
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarUsuarios">
                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/usuario/altaUsuario.php">Alta
                                    Usuario
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/vista_admin/rol/altaRol.php">A??adir
                                    nuevo rol
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> Mi cuenta
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <li>
                                <a class="dropdown-item"
                                    href="indexAdminAlumnos.php?principal=interfaz/inicioUsuario.php">Iniciar
                                    Sesi??n
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" value="cerrarSion" name="cerrarSion"
                                    href="indexAdminAlumnos.php?cerrarsesion=sesioncerrada">Cerrar Sesi??n</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <!--Parte derecha de la pantalla-->
                    <?php                 
                if (isset($_GET['principal'])){
                    
                    require_once $_GET['principal'];
                }
                else{
                    require_once "interfaz/informativas/inicio.php";
                }
            ?>
                </div>
            </div>
        </div>
        <br>
        <footer class="py-3 bg-grey">
            <div class="container">
                <p class="m-0 text-center text-white">?? Jos?? Antonio Sevilla Gal??n 2021-22 <img src="interfaz/fotos/logo100.png"></p>
            </div>
        </footer>
    </div>
 </body>
 </html>