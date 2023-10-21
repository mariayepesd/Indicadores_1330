<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlMedicion.php';
	include '../modelo/UnidadMedicion.php';
	$boton = "";
	$id = "";
	$des = "";
	$objUnidadMedicion = new ControlMedicion(null,null);

    $arregloUnidadMedicion = $objUnidadMedicion->listar();

	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtDescripcion'])) $des = $_POST['txtDescripcion'];
	switch ($boton) {
		case 'Guardar':
			$objUnidadMedicion = new UnidadMedicion($id, $des);
			$objUnidadMedicion = new ControlMedicion($objUnidadMedicion);
			$objUnidadMedicion->guardar();
			header('Location: paginaUnidadMedicion.php');
			break;
		case 'Consultar':
			$objUnidadMedicion = new UnidadMedicion($id, "");
			$objUnidadMedicion = new ControlMedicion($objUnidadMedicion);
			$objUnidadMedicion = $objUnidadMedicion->consultar();
			$des = $objUnidadMedicion->getDescripcion();
			break;
		case 'Modificar':
			$objUnidadMedicion = new UnidadMedicion($id, $des);
			$objUnidadMedicion = new ControlMedicion($objUnidadMedicion);
			$objUnidadMedicion->modificar();
			header('Location: paginaUnidadMedicion.php');
			break;
		case 'Borrar':
			$objUnidadMedicion = new UnidadMedicion($id, $des);
			$objUnidadMedicion = new ControlMedicion($objUnidadMedicion);
			$objUnidadMedicion->borrar();
			header('Location: paginaUnidadMedicion.php');
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
	
	<div class="container-lg">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-8 mt-4"><h2> <b>Unidad</b> <b>Medida</b></h2></div>
						<div class="col-sm-4">
						<a  href="#crudModal" class="btn btn-info add-new mt-4" data-toggle="modal"><i class="fa fa-plus" data-toggle="modal"></i> <span>Administrar Medida</span></a>                   
						<!-- <a  href="#crudModalConsultar" class="btn btn-outline-info add-new mt-4" data-toggle="modal"><i class="fa fa-plus" data-toggle="modal"></i> <span>Consultar Fuente</span></a>   -->
						</div>
					</div>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="width: 50%;">ID</th>
							<th>Descripción</th>
						</tr>
					</thead>
					<tbody>
					<?php
								for($i = 0; $i < count($arregloUnidadMedicion); $i++){
							  ?>
						<tr>
							<td><?php echo $arregloUnidadMedicion[$i]->getId();?></td>
							<td><?php echo $arregloUnidadMedicion[$i]->getDescripcion();?></td>
						</tr>
						<?php
								}
								?>
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
	
	  <!-- Vendor JS Files -->
	  <script src="assets/vendor/aos/aos.js"></script>
	  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
	  <script src="assets/vendor/php-email-form/validate.js"></script>
	
	  <!-- Template Main JS File -->
	  <script src="../vista/assets/js/main.js"></script>
	  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	
	
	  <div id="crudModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="paginaUnidadMedicion.php" method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Unidad Medicion</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Id</label>
							<input type="int" id="txtId" name="txtId" class="form-control" value="<?php echo $id ?>">
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control" value="<?php echo $des ?>">
						</div>
						<div class="form-group">
							<input type="submit" id="btnGuardar" name="bt" class="btn btn-success" value="Guardar">
							<input type="submit" id="btnConsultar" name="bt" class="btn btn-success" value="Consultar">
							<input type="submit" id="btnModificar" name="bt" class="btn btn-warning" value="Modificar">
							<input type="submit" id="btnBorrar" name="bt" class="btn btn-danger" value="Borrar">
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						
					</div>
				</form>
			</div>
		</div>
	</div>
	 
</body>
</html>