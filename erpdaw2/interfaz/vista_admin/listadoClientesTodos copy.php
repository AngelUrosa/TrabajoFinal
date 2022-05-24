<!DOCTYPE html>
<html>
<head>
	<title>Listado de Clientes.</title>
</head>
<body>

<?php

	$tCliente=Clientes::singletonClientes();
	//voy a llamar a la persistenci y devolver un array de objetos
	$tf=$tCliente->getClientesTodos();

	//print_r($tf);
	?>

	<form id="configuracionTabla" name="configuracionTabla">
		<input name="filtro" />
	</form>

	<?php
	echo"<table border='1'>";
	echo"<tr>";
	echo "<td> Id </td>";
	echo "<td> Id cliente </td>";
	echo "<td> id Usuario</td>";
	echo "<td> nombre </td>";
	echo "<td> apellido 1 </td>";
    echo "<td> apellido 2 </td>";
    echo "<td> nif </td>";
    echo "<td> numeor de cuenta </td>";
    echo "<td> como nos conocio </td>";
    echo "<td> activo </td>";

foreach ($tf as $f) {
	//$f es un objeto de la clase FamiliaProducto 
	//visualizamos cada $f en una fila de la tabla
	echo "<tr>";
	echo "<td>".$f->getid()."</td>";
	echo "<td>".$f->getIdCliente()."</td>";
	echo "<td>".$f->getIdUsuario()."</td>";
	echo "<td>".$f->getNombre()."</td>";
	echo "<td>".$f->getApellido1()."</td>";
    echo "<td>".$f->getApellido2()."</td>";
    echo "<td>".$f->getNif()."</td>";
    echo "<td>".$f->getNumCta()."</td>";
    echo "<td>".$f->getComoNosConocio()."</td>";
    echo "<td>".$f->getActivo()."</td>";

	echo "</tr>";
}
echo "</table>";
?>

</body>
</html>

