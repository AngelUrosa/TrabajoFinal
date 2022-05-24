<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Familias de Productos</title>
</head>
<body>

    <h1>Listado de Familias de Productos</h1>

<div class="table-responsive-xxl">
<table class="table table-bordered text-center table-light table-hover">
  <thead class="text-white bg-success">
    <tr>
      <th scope="col">ID Familia</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Activo</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $tFamiliaProducto=FamiliasProductos::singletonFamiliasProductos();
        //Voy a llamar la persistencia y deolver un array de objetos
        $tf=$tFamiliaProducto->getFamiliasProductos();


        foreach ($tf as $f) {
            echo "<tr>";
                echo "<td>".$f->getIdFamilia()."</td>";
                echo "<td>".$f->getNombre()."</td>";
                echo "<td>".$f->getDescripcion()."</td>";
                echo "<td>".$f->getActivo()."</td>";
            echo"</tr>";
        }
    ?>
  </tbody>
</table>
</div>



</body>
</html>