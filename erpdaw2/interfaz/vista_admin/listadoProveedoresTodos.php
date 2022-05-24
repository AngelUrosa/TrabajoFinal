<!DOCTYPE html>
<html>
<head>
	<title>Listado de Proveedores</title>
</head>
<body>

<?php
$tProveedor=Proveedores::singletonProveedores();

$tf=$tProveedor =$tProveedor->getProveedoresTodos();


echo"<table border='1'>";
	echo"<tr>";
	echo "<td> Id </td>";
	echo "<td> Id Proveedor </td>";
	echo "<td> Nombre </td>";
	echo "<td> Apellido 1 </td>";
    echo "<td> Apellido 2 </td>";
    echo "<td> Nif </td>";
    echo "<td> Codigo postal</td>";
    echo "<td> Localidad </td>";
    echo "<td> Provincia </td>";
    echo "<td> Activo </td>";

foreach ($tf as $f) {
	echo "<tr>";
	echo "<td>".$f->getid()."</td>";
	echo "<td>".$f->getIdProveedor()."</td>";
	echo "<td>".$f->getNombre()."</td>";
	echo "<td>".$f->getApellido1()."</td>";
    echo "<td>".$f->getApellido2()."</td>";
    echo "<td>".$f->getNif()."</td>";
    echo "<td>".$f->getCodPostal()."</td>";
    echo "<td>".$f->getLocalidad()."</td>";
    echo "<td>".$f->getProvincia()."</td>";
    echo "<td>".$f->getActivo()."</td>";
    echo "</tr>";
}
echo "</table>";
?>
	</body>
</html>

