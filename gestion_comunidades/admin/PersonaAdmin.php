<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comunidades</title>
</head>

<body>


  <header>
      <a href="../index.php">Index</a>
 <a href="#"><img src="img/dasboard.png" alt="Dasboard"></a>
 <a href="#">Crear incidencia</a>

  
<?php //Solo para admin  ?>
 <a href="#">Personas</a>
 


 <a href="#">Comunidades</a>
 <a href="#">Incidencias</a>
  </header>

  <main>

  Estamos en personas ADMIN


    <?php 
    
    $personas[] = getPersona();

    ?>

<table border="1" align="center">
<thead>
    <tr>
    <th>ID Persona</th>
    <th>NIF</th>
    <th>ID Comunidad</th>
    <th>Usuario</th>
    <th>Contraseña</th>
    <th>Email</th>
    <th>trabajador</th>
    </tr>
</thead>
<tbody>
    <?php
foreach ($personas as $idPersona => $lineaPersona){
                echo '<td>'.$lineaPersona.'</td>';
}
    ?>

</tbody>



</table>



  </main>

</body>

</html>