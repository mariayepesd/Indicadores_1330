<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlTipoIndicador.php';
	include '../modelo/TipoIndicador.php';
	$boton = "";
	$ema = "";
	$con = "";
	$objControlTipoIndicador = new ControlTipoIndicador(null,null);

  $arregloTipoIndicador = $objControlTipoIndicador->listar();

  
	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtEmail'])) $ema = $_POST['txtEmail'];
	if (isset($_POST['txtContrasena'])) $con = $_POST['txtContrasena'];
	switch ($boton) {
		case 'Guardar':
			$objUsuario = new Usuario($ema, $con);
			$objControlRepresenVisual = new ControlUsuario($objUsuario);
			$objControlRepresenVisual->guardar();
			header('Location: vistaUsuarios.php');
			break;
		case 'Consultar':
			$objUsuario = new Usuario($ema, "");
			$objControlRepresenVisual = new ControlUsuario($objUsuario);
			$objUsuario = $objControlRepresenVisual->consultar();
			$con = $objUsuario->getContrasena();
			break;
		case 'Modificar':
			$objUsuario = new Usuario($ema, $con);
			$objControlRepresenVisual = new ControlUsuario($objUsuario);
			$objControlRepresenVisual->modificar();
			header('Location: vistaUsuarios.php');
			break;
		case 'Borrar':
			$objUsuario = new Usuario($ema, "");
			$objControlRepresenVisual = new ControlUsuario($objUsuario);
			$objControlRepresenVisual->borrar();
			header('Location: vistaUsuarios.php');
			break;
		
		default:
			# code...
			break;
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gestión de tipo de indicador</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="paginaInicio.php">Indicadores 1330</a></h1>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#legal">Módulo Legal</a></li>
          <li><a class="nav-link scrollto" href="#indicadores">Módulo Indicadores</a></li>
          <li><a class="nav-link scrollto " href="#usuarios">Módulo Usuarios</a></li>
          <div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action">Usuario <b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Configuración</a>
					<div class="divider dropdown-divider"></div>
					<a href="#" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Cerrar Sesión</a>
				</div>
			</div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  
  <section id="hero" class="mt-5 d-flex align-items-center">

<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8 mt-4 float-left"><h2>Tipo <b>Indicadores</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-outline-info add-new mt-4"><i class="fa fa-plus"></i> Añadir Indicador</button>
                        <button type="button" class="btn btn-outline-info add-new mt-4"><i class="fa fa-search"></i> Consultar Indicador</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>Administration</td>
                        <td>
                            <button type="button" value="Modificar" class="btn btn-primary btn-sm p-1 edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></button>
                            <button type="button" value="Borrar" class="btn btn-danger btn-sm p-1" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>     

  </section>


    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Indicadores</span></strong>. Todos los derechos reservados
        </div>
      </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>