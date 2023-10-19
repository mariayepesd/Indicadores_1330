<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlFuente.php';
	include '../modelo/Fuente.php';
	$boton = "";
	$id = "";
	$nom = "";
	$objControlFuente = new ControlFuente(null,null);

    $arregloFuente = $objControlFuente->listar();

	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtNombre'])) $nom = $_POST['txtNombre'];
	switch ($boton) {
		case 'Guardar':
			$objFuente = new Fuente($id, $nom);
			$objControlFuente = new ControlFuente($objFuente);
			$objControlFuente->guardar();
			header('Location: paginaFuente.php');
			break;
		case 'Consultar':
			$objFuente = new Fuente($id, "");
			$objControlFuente = new ControlFuente($objFuente);
			$objFuente = $objControlFuente->consultar();
			$nom = $objFuente->getNombre();
			break;
		case 'Modificar':
			$objFuente = new Fuente($id, $nom);
			$objControlFuente = new ControlFuente($objFuente);
			$objControlFuente->modificar();
			header('Location: paginaFuente.php');
			break;
		case 'Borrar':
			$objFuente = new Fuente($id, $nom);
			$objControlFuente = new ControlFuente($objFuente);
			$objControlFuente->borrar();
			header('Location: paginaFuente.php');
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
  <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->

  <title>Gestión de Fuente</title>

  <!-- Favicons -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Simple Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
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
          <li class="dropdown">
            <a class="nav-link scrollto" href="javascript:void(0)">Módulo Indicadores</a>
            <ul class="dropdown-menu">
              <li><a href="paginaGestionIndicadores.php">Gestión Indicadores</a></li>
              <hr class="m-0">
              <li><a href="paginaFuente.php">Página Fuente</a></li>
              <li><a href="paginaRepresenVisual.php">Página Representación Visual</a></li>
              <li><a href="paginaSentido.php">Página Sentido</a></li>
              <li><a href="paginaTipoActor.php">Página Tipo Actor</a></li>
              <li><a href="paginaTipoIndicador.php">Página Tipo Indicador</a></li>
              <li><a href="paginaUnidadMedicion.php">Página Unidad Medición</a></li>            
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#usuarios">Módulo Usuarios</a></li>
          <li><a class="getstarted scrollto" href="#login">Iniciar Sesión</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  
  <section id="hero" class="mt-5 d-flex align-items-center">
					
   <div class="container-lg mt-5">

        <!-- Nav tabs -->
          <ul class="nav nav-tabs w-100">
            <li class="nav-item">
              <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;"
              class="nav-link font-weight-bold active" data-toggle="tab" href="#home">Datos Indicador</a>
            </li>
            <li class="nav-item">
              <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;"
              class="nav-link font-weight-bold" data-toggle="tab" href="#menu1">Representación / Indicador</a>
            </li>
            <li class="nav-item">
              <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;"
              class="nav-link font-weight-bold" data-toggle="tab" href="#menu2">Responsable / indicador</a>
            </li>
            <li class="nav-item">
              <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;"
              class="nav-link font-weight-bold" data-toggle="tab" href="#menu2">Fuente / indicador</a>
            </li>
            <li class="nav-item">
              <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;"
              class="nav-link font-weight-bold" data-toggle="tab" href="#menu2">Variable / indicador</a>
            </li>
            <li class="nav-item">
              <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;"
              class="nav-link font-weight-bold" data-toggle="tab" href="#menu2">Resultado / indicador</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane container active" id="home">...</div>
            <div class="tab-pane container fade" id="menu1">...</div>
            <div class="tab-pane container fade" id="menu2">...</div>
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