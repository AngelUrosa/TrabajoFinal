<!DOCTYPE html>
<html>
<head>
	<title>Listado de familias de productos.</title>
</head>
<body>

<?php

	$tFamiliaProducto=FamiliasProductos::singletonFamiliasProductos();
	//voy a llamar a la persistenci y devolver un array de objetos
	$tf=$tFamiliaProducto->getFamiliasProductosTodas();

	//print_r($tf);

	echo"<table border='1'>";
	echo"<tr>";
	echo "<td> Id </td>";
	echo "<td> Id_familia </td>";
	echo "<td> nombre </td>";
	echo "<td> Descripcion </td>";
	echo "<td> Activo </td>";

foreach ($tf as $f) {
	//$f es un objeto de la clase FamiliaProducto 
	//visualizamos cada $f en una fila de la tabla
	echo "<tr>";
	echo "<td>".$f->getId()."</td>";
	echo "<td>".$f->getIdFamilia()."</td>";
	echo "<td>".$f->getNombre()."</td>";
	echo "<td>".$f->getDescripcion()."</td>";
	echo "<td>".$f->getActivo()."</td>";

	echo "</tr>";
}
echo "</table>";
?>

</body>
</html>

