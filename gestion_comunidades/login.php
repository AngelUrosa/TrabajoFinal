<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="/my-handling-form-page" method="post">
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
              <option value="opcion 0">Escoge una opcion</option>
              <option value="opcion 1">Administrador</option>
              <option value="opcion 2">Usuario</option>
            </select>
         </li>
        </ul>
        <input type="submit" value="Entrar">
       </form>

       <?php
       $usuario = $_POST["usuario"];
       $contraseña = $_POST["contraseña"];
       $perfil = $_POST["perfil"];

       getSesion($usuario, $contraseña);      

       ?>
</body>
</html>