<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Personas</title>
</head>
<body>
  <h1 class="text-center">Listado de Personas</h1>
  <?php 
    $tPersonas=Personas::singletonPersonas();
    //Voy a llamar a la persistencia y devolver un array de objetos (Hacer esto en la persistencia)
    $tp=$tPersonas->getPersonas();

    //print_r($tf);
    echo "<table class="."table table-striped".">";
  echo "<thead>";
    echo "<tr>";
      echo "<th scope="."col".">Id Persona</th>";
      echo "<th scope="."col".">NIF</th>";
      echo "<th scope="."col".">ID COMUNIDAD</th>";
      echo "<th scope="."col".">USUARIO</th>";
      echo "<th scope="."col".">CONTRASEÑA</th>";
      echo "<th scope="."col".">EMAIL</th>";
      echo "<th scope="."col".">TRABAJDOR</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($tp as $p) {
    echo "<tr>";
      echo "<th scope="."row".">".$p->getIdPersona()."</td>";
      echo "<td>".$c->getNif()."</td>";
      echo "<td>".$c->getIdComunidad()."</td>";
      echo "<td>".$c->getUsuario()."</td>";
      echo "<td>".$c->getContraseña()."</td>";
      echo "<td>".$c->getEmail()."</td>";
      echo "<td>".$c->getTrabajador()."</td>";
    echo "</tr>";
  
  }
    echo "</tbody>";
  echo "</table>";

  ?>
  
</body>
</html>