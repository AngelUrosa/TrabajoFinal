<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado de Familias de Productos</title>
</head>
<body>
	
	<?php 
	$tFamiliaProducto=FamiliasProductos::singletonFamiliasProductos();//vas a la base de datos para traer los datos
	//voy a llamar a la persistencia y devolver un array de objetmos
	$tf=$tFamiliaProducto->getFamiliasProductosTodas();

	echo "<table class='table table-hover'>";
	echo "<tr class='table-success'>";
		echo "<td>Id</td>";
		echo "<td>Id_Familia</td>";
		echo "<td>Nombre</td>";
		echo "<td>Descripción</td>";
		echo "<td>Activo</td>";
		echo "</tr>";
		foreach ($tf as $f) {//$f es un objeto de la clase FamliaProdcuto
			//visualizo cada $f en una fila de la tabla
			echo "<tr>";
			echo "<td class='bg-success'>".$f->getId()."</td>";
			echo "<td class='bg-info'>".$f->getIdFamilia()."</td>";
			echo "<td>".$f->getNombre()."</td>";
			echo "<td>".$f->getDescripcion()."</td>";
			echo "<td>".$f->getActivo()."</td>";
			echo "</tr>";
		}

		echo "</table>";


	 ?>
</body>
</html>