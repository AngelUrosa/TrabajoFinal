<?php

require_once "autoload.php";

?>



<?php
 
session_start();
echo "Entra";

//if (isset($_SESSION['autorizado'])) {
//  header('Location: index.php');
//}


 $mensaje_error = "";

 if (isset($_POST['submit'])) {
   echo "Entra";
  $usuario = $_POST["usuario"];
  $contraseña = $_POST["contraseña"];
  $perfil = $_POST["perfil"];

  $tPersona=Personas::singletonPersonas();
  $p = $tPersona->getSesion($usuario,$contraseña,$perfil);
  if ($p != null) {
    $mensaje_error="hola";
   // echo ($usuario);
   // echo ($contraseña);
    $_SESSION['autorizado'] = true;
    $_SESSION['perfil'] = $perfil;
   // header("Location: index.php");

  } else {
    $mensaje_error = "Error en el login";
  }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="validacion.js" defer></script>
    <script type="text/javascript" src="mensajes.js" defer></script>
    <title>Login</title>
  
</head>
<body>
    <form name="formulario" id="formulario" method="post" action="login.php">
        <ul>
         <li>
           <label for="usuario">Usuario:</label>
           <input type="text" id="usuario" name="usuario">
         </li>
         <li>
           <label for="contraseña">Contraseña:</label>
           <input type="password" id="contraseña" name="contraseña">
         </li>
         <li>
            <label for="perfiles">Escoge perfil:</label>

            <select name="perfil" id="perfil">
              <option value="0">Escoge una opcion</option>
              <option value="1">Administrador</option>
              <option value="2">Usuario</option>
            </select>
         </li>
        </ul>
        <div id="error">
        <?php
        
          echo $mensaje_error;

        ?>
        </div>

        <input type="submit" name="submit" value="Entrar">
       </form>



</body>
</html>