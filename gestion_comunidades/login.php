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
           <label for="nombre">Nombre:</label>
           <input type="text" id="nombre" name="nombre">
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
       $nombre = $_POST["nombre"];
       $contraseña = $_POST["contraseña"];
       $perfil = $_POST["perfil"];
       ?>
</body>
</html>