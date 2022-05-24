 <!doctype html> 
 <html lang= "es" > 
 <head> <!-- Required meta tags --> 
 	<meta charset= "utf-8" > 
 	<meta name= "viewport" content= "width=device-width, initial-scale=1" > 
    <meta name="author" content="">
 	
 	<!-- Bootstrap CSS en la web--> 

 	<link rel= "stylesheet" href= "node_modules/bootstrap/dist/css/bootstrap.min.css" > 
	
 	<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
 	<script src= "node_modules/jquery/dist/jquery.slim.min.js" defer></script>
 	<script src= "node_modules/popper.js/dist/popper.min.js" defer></script> 
    <script src= "node_modules/bootstrap/dist/js/bootstrap.min.js" defer></script> 
    <script src= "node_modules/node-json2html/json2html.js" defer></script> 

   	<title> Plantilla para la vista del Admin del ERP IES Castelar</title> 
 </head> 



<body style="background-color: #F8F9CE"> 

<?php
function cargarClasesPojos($nombreClase){
    if(file_exists("pojos/".$nombreClase.'.php')){
        require_once "pojos/".$nombreClase.'.php';
    }
}

function cargarClasesPersistencia($nombreClase){
    if(file_exists("persistencia/".$nombreClase.'.php')){
        require_once "persistencia/".$nombreClase.'.php';
    }
}

spl_autoload_register("cargarClasesPojos");

spl_autoload_register("cargarClasesPersistencia");
?>
 	<div class="container"> <!--contenedor principal-->

 	
<!-----------barra con submenús, pero hace uso de una hoja de estilos externa (estilos.css)

https://www.codeply.com/go/ji5ijk6yJ4/bootstrap-4-dropdown-submenu-on-hover-(navbar)
	------->

    <nav class="navbar navbar-expand-md navbar-dark bg-success">
    
        <a class="navbar-brand " href="indexAdminAlumnos.php?principal=informativas/inicio.php">IES Castelar</a>
    
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarClientes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Clientes </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarClientes">
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/AltaCliente.php">Añadir Cliente</a>
                        </li> 
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/modificarCliente.php">Editar/Modificar datos y direcciones</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/filtrarClientes.php">Filtros de Clientes</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/listadoClientesTodos.php">Listado de </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/pruebas.php">Gráficos de compras entre fechas</a>
                        </li>
                             
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarEmpleados" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Empleados </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarEmpleados">
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaEmpleados.php">Añadir Empleado</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/modificarEmpleado.php">Editar/Modificar datos y direcciones</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/filtrarEmpleados.php">Filtros de Empleados</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/listadoEmpleados.php">Listado Pedidos/Facturas empaquetadas por un empleado</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/GraficosEmpleadosBootstrap.php">Gráficos de actividad entre fechas</a>                        
                        </li>
                    </ul>
                </li>
			     <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarFamilias" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Familias </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarFamilias">
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaFamilia.php">Añadir Familia</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/listadoFamiliasTodas.php">Listar Familias</a>
                        </li> 
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/modificarFamilias.php">Eliminar/Modificar Familias</a>
                        </li>                 
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarProductos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Productos </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarProductos">
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaProducto.php">Añadir Producto</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/modificarProducto.php">Eliminar/Modificar Producto</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/filtrarProductos.php">Filtros de Productos</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/filtrarProductoFamilia.php">Catálogo de productos por familia</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/listadoProductoPedido.php">Listado Pedidos donde aparece un producto</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/listadoClienteDeUnDetProducto.php">Listado Clientes que han comprado un determinado producto</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/GraficosProductosBootstrap.php">Gráficos de compras (top ten)</a>
                        </li>
                        
                    
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarPedidos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Proveedores 
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarPedidos">
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/listadoProveedoresTodos.php">Todos
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaProveedor.php">Añadir Proveedor</a></li>
                        





                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarPedidos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pedidos 
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarPedidos">
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/listadoPedidosTodos.php">Todos
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/pedido/listadoPedidosEntreFecha.php">Listado entre fechas
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/pedido/listadoPedidoPorCliente.php">Listado por cliente
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/pedido/facturadoPedido.php">Facturar Pedido
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/pedido/listadoEmpleadoQueEmpaqueta.php">Listado por empleado que empaqueta</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/pedido/listadoEmpresaQueTransporta.php">Listado por empresa de transporte</a>
                        </li>
                    
                    </ul>
                </li>
		
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarUsuarios" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Usuarios/Roles 
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarUsuarios">
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaUsuario.php">Alta Usuario
                            </a>
                        </li>
                  
                        <li>
                            <a class="dropdown-item" href="indexAdminAlumnos.php?principal=interfaz/vista_admin/altaRol.php">Añadir nuevo rol
                            </a>
                        </li>
                                    
                    </ul>
                </li>
           
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"> Mi cuenta 
                   </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        
                        <li>
                            <a class="dropdown-item"
                               href="indexAdminAlumnos.php?principal=interfaz/inicioUsuario.php">Iniciar
                                Sesión
                            </a>
                        </li>
                        <li>
                          <a class="dropdown-item" value="cerrarSion" name="cerrarSion" href="indexAdminAlumnos.php?cerrarsesion=sesioncerrada">Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
           
            </ul>
        </div>
    </nav>

<div class="container">
   <div class="row">
        <div class="col-lg-9">
            	<!--Parte central de la pantalla-->
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


<!--por último, colocaremos la parte del footer-->

<br>
<footer class="py-3 bg-success">
    <div class="container">
      <p class="m-0 text-center text-white">(c)José Antonio Guijarro Guijarro 2021</p>
    </div>
</footer>
</div> <!--contenedor principal-->      

 </body> 
</html> 