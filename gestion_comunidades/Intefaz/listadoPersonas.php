<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Personas</title>
</head>
<body>
  <h1 class="text-center">Listado de Personas</h1>
  <button type="button" class="btn btn-warning"><a class="text-decoration-none fw-bold text-reset"href="index.php?principal=Intefaz\altaPersonas.php">+</a></button>
  <?php


    $tPersonas=Personas::singletonPersonas();
    //Voy a llamar a la persistencia y devolver un array de objetos (Hacer esto en la persistencia)
    $tp=$tPersonas->getPersona();

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
      echo "<td>".$p->getNif()."</td>";
      echo "<td>".$p->getIdComunidad()."</td>";
      echo "<td>".$p->getUsuario()."</td>";
      echo "<td>".$p->getContraseña()."</td>";
      echo "<td>".$p->getEmail()."</td>";
      echo "<td>".$p->getTrabajador()."</td>";
      echo "<td><form name='delete' method='post' action='index.php?principal=Intefaz\listadoPersonas.php'>
      <input type='hidden' class='form-control' id='idPersona' name='idPersona' value='".$p->getIdPersona()."'</input>
      <input type='submit' value='borrar' name='delete' />
    </form></td>";
    echo "<td><a href='index.php?principal=Intefaz/actualizaPersonas.php&idpersona=".$p->getIdPersona()."'><button>editar</button></a></td>";
    echo "</tr>";
  
  }
    echo "</tbody>";
  echo "</table>";

  if (isset($_POST['delete'])){
    
   
    $tPersona=Personas::singletonPersonas();
    
		$idPersona=$_POST['idPersona'];


		$insertado=$tPersona->borrarPersonaPorId($idPersona);

		if ($insertado){
			echo "Se ha insertado satisfactoriamente";
      header('Location: index.php?principal=Intefaz\listadoPersonas.php');
		}
		else{
			
		}



	}



  ?>
  
</body>
</html>