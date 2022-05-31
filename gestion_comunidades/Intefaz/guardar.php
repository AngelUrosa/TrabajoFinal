<?php
	
	require 'conexion.php';
	

    $nif=$_POST['nif'];
    $idComunidad=$_POST['idComunidad'];
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    $email=$_POST['email'];
    $trabajador=$_POST['trabajador'];
	
	$idPersona=1;


	

	
	$sql = "INSERT INTO personas (id_persona, nif, id_comunidad, usuario, contraseña, email, trabajador) VALUES 
    ('$idPersona', '$nif', '$idComunidad', '$usuario', '$contraseña', '$email' ,'$trabajador')";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="index.php?principal=Intefaz\listadoPersonasTodos.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>