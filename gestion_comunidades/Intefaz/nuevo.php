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
				<h3 style="text-align:center">NUEVO REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="index.php?principal=Intefaz\guardar.php" autocomplete="off">
				<div class="form-group">
					<label for="idPersona" class="col-sm-2 control-label">ID PERSONA</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="idPersona" name="idPersona" placeholder="ID PERSONA" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="nif" class="col-sm-2 control-label">Nif</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nif" name="nif" placeholder="Nif" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="idComunidad" class="col-sm-2 control-label">ID Comunidad</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="idComunidad" name="idComunidad" placeholder="idComunidad">
					</div>
				</div>
                <div class="form-group">
					<label for="usuario" class="col-sm-2 control-label">Usuario</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
					</div>
				</div>
                <div class="form-group">
					<label for="contraseña" class="col-sm-2 control-label">Contraseña</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="contraseña" name="contraseña" placeholder="contraseña">
					</div>
				</div>
                <div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="email">
					</div>
				</div>
                <div class="form-group">
					<label for="trabajador" class="col-sm-2 control-label">Trabajador</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="trabajador" name="trabajador" placeholder="trabajador">
					</div>
				</div>
				

				

				

				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>