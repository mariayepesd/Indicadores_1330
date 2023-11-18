<?php
  ob_start();
?>
<?php
session_start();
include_once 'controlador/configBd.php';
include_once 'controlador/ControlUsuario.php';
include_once 'controlador/ControlConexion.php';
include_once 'controlador/ControlRolUsuario.php';
include_once 'controlador/ControlRol.php';
include_once 'modelo/Usuario.php';

$error_message = isset($_GET['error']) ? $_GET['error'] : '';
if ($error_message) {
	echo '<script>alert("No tienes permisos. Debes ingresar como admin");</script>';
}
$email="";
$contrasena="";
$boton="";
$objControlUsuario = new ControlUsuario(null);

if(isset($_POST['txtEmail']))$email=$_POST['txtEmail'];
if(isset($_POST['txtContrasena']))$contrasena=$_POST['txtContrasena'];
if(isset($_POST['btnLogin']))$boton=$_POST['btnLogin'];
switch ($boton) {
	case 'Ingresar':
		$objUsuario = new Usuario($email, $contrasena);
		$objControlUsuario = new ControlUsuario($objUsuario);
		$validar = $objControlUsuario->validarIngreso();
		if($validar){
			$_SESSION['email']=$email;
			$objControlRolUsuario = new ControlRolUsuario('rol_usuario');
			$sql = "SELECT rol.id as id, rol.nombre as nombre
				FROM rol_usuario INNER JOIN rol ON rol_usuario.fkidrol = rol.id
				WHERE fkemail = $email";
			$parametros = [$email];
			$listaRolesDelUsuario = $objControlRolUsuario->listarRolesDelUsuario($email);
			$_SESSION['listaRolesDelUsuario']=$listaRolesDelUsuario;
			header('Location: vista/paginaInicio.php'); 	
		}else{
			echo '<script>alert("Usuario no encontrado/Datos erroneos");</script>';
		}
		break;
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesión</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./assets/css/index.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Iniciar sesión</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="index.php" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" id="txtEmail" name="txtEmail"  class="form-control" placeholder="correo">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" id="txtContrasena" name="txtContrasena" class="form-control" placeholder="contraseña">
					</div>
					<div class="form-group"><br>
						<input type="submit" value="Ingresar" class="btn float-right login_btn" id="btnLogin" name="btnLogin">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php
  ob_end_flush();
?>