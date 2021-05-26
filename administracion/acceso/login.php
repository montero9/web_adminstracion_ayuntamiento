<?php
	require_once("acceso.php");

	//Compruebo si el usuario tiene ya la sesión iniciada, en tal caso lo redirijo a la página principal
	if (isset($_SESSION['usuario_sesion'])) {
		 header("location: /hinojos/administracion/inicio.php");
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>

	<title>Acceso al Panel de Administración de la App Hinojos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/login/css/main.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
					<form action = "" method = "post" id="formulario">
					<span class="login100-form-title">
						Administración App Hinojos
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Introduzca un usuario">
						<input class="input100" type="text" name="usuario" placeholder="Usuario">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Introduzca una contraseña">
						<input class="input100" type="password" name="contrasena" placeholder="Contraseña">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Acceder
						</button>
					</div>
					<div id="error" align="center"><?php echo $error; ?></div>
               </form>

			</div>
		</div>
	</div>	
</body>
</html>