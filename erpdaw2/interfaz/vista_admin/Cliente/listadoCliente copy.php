<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado de Clientes</title>
</head>
<body>
	
	<?php 
	$tCliente=Clientes::singletonClientes();//vas a la base de datos para traer los datos
	//voy a llamar a la persistencia y devolver un array de objetmos
	$tf=$tCliente->getClientesTodos();

	?>


	<?php
	echo "<table class='table table-hover'>";
	echo "<tr class='table-success'>";
		echo "<td>Id</td>";
		echo "<td>Id_Cliente</td>";
		echo "<td>Id_Usuario</td>";
		echo "<td>Nombre</td>";
		echo "<td>Apellido1</td>";
		echo "<td>Apellido2</td>";
		echo "<td>Nif</td>";
		echo "<td>Num_cta</td>";
		echo "<td>Como_nos_conocio</td>";
		echo "<td>Activo</td>";
		echo "</tr>";
		foreach ($tf as $f) {//$f es un objeto de la clase Cliente
			//visualizo cada $f en una fila de la tabla
			echo "<tr>";
			echo "<td class='bg-success'>".$f->getId()."</td>";
			echo "<td class='bg-info'>".$f->getIdCliente()."</td>";
			echo "<td class='table-info'>".$f->getIdUsuario()."</td>";
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