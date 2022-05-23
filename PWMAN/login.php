<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="dawjasevillag">
    <meta name="description" content="Login">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="logo.ico">
    <script src="node_modules/jquery/dist/jquery.min.js" defer></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js" defer></script>
    <script src="node_modules/node-json2html/json2html.js" defer></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js" defer></script>
    <title>Login</title>
</head>
<body>
	<div class="container mt-5">
		<div class="d-flex justify-content-center h-100">
			<div>
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container mb-2">
						<img src="interfaz\imagenes\logo100.png" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<form method="post">
						<div class="input-group mb-2">
                            <span class="input-group-text rounded-0 bg-grey"><i class="bi bi-key-fill"></i></span>
							<input type="password" name="password" class="form-control input-lg rounded-0" placeholder="Contraseña">
						</div>
						<div class="d-flex justify-content-center mt-3">
				 	    <button type="submit" name="submit" class="btn bg-primary text-white">Entrar</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
    <?php
        session_start();
        $contraseñaCorrecta = '1234';
        if (isset($_POST['submit'])) {
            $contraseña = $_POST['password'];
            if ($contraseña == $contraseñaCorrecta) {
                $_SESSION['autorizacion'] = true;
                header('Location: indexInicial.php');
            }
        }
    ?>
</body>
</html>