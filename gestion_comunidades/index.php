<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comunidades</title>
</head>

<body>


  <header>
 <a href="#"><img src="img/dasboard.png" alt="Dasboard"></a>
 <a href="#">Crear incidencia</a>

  
<?php //Solo para admin  ?>
 <a href="admin/PersonaAdmin.php">Personas</a>
 


 <a href="#">Comunidades</a>
 <a href="#">Incidencias</a>
  </header>

  <main>

    ESTE ES EL INDEX

  
  </main>

</body>

</html> -->

<!doctype html> 
 <html lang= "es" > 
 <head> <!-- Required meta tags --> 
 	<meta charset= "utf-8" > 
 	<meta name= "viewport" content= "width=device-width, initial-scale=1" > 
    <meta name="author" content="">
 	
 	<!-- Bootstrap CSS en la web--> 

 	<link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous" > 
	
 	<link rel="stylesheet" href="estilos.css">

     

 	<script src= "node_modules/jquery/dist/jquery.js" defer ></script>
 	<script src= "node_modules/popper.js/dist/popper.min.js"  defer></script> 
    <script src= "node_modules/bootstrap/dist/js/bootstrap.min.js" defer></script> 
    <script src= "node_modules/node-json2html/json2html.js" defer></script>
   
   	<title> Plantilla para la vista del Admin del ERP IES Castelar</title> 
 </head> 

<body style="background-color: #F8F9CE"> 

    <?php 
    function cargarClasesPojos($nombreClase){
        if (file_exists("pojos/" . $nombreClase .'.php')) {
            require_once "pojos/" . $nombreClase .'.php';
        }
    }

    function cargarClasesPersistencia($nombreClase){
        if (file_exists("persistencia/" . $nombreClase .'.php')) {
            require_once "persistencia/" . $nombreClase .'.php';
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
    
        <a class="navbar-brand " href="login.php">IES Castelar</a>
    
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
               
                    <a class ="bg-warning" href="Intefaz\listadoPersonas.php"> Personas PHP </a>

                    <a class ="bg-warning" href="Intefaz\listadoPersonas.php"> Personas jQuery </a>

                    <a class ="bg-warning" href="Intefaz\listadoPersonasTodos.php"> Personas DOM </a>

                
           
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
                        require_once "index.php";
                    }
                ?>
        </div>
    </div>
</div>


<!--por último, colocaremos la parte del footer-->

<br>
<footer class="py-3 bg-success">
    <div class="container">
      <p class="m-0 text-center text-white">(c) Angel Urosa</p>
    </div>
</footer>
</div> <!--contenedor principal-->

 	<!-- Optional JavaScript --> 
 	<!-- jQuery first, then Popper.js, then Bootstrap JS --> 

 


 </body> 
</html> 