<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlRepresenVisual.php';
	include '../modelo/RepresenVisual.php';
  include '../modelo/represenvisualporindicador.php';
  include '../controlador/Controlrepresenvisualporindicador.php';

	$boton = "";
	$id = "";
	$nombre = "";
  $listbox1 = array();
	$objControlRepresenVisual = new ControlRepresenVisual(null,null);

  $arregloRepresenVisual = $objControlRepresenVisual->listar();

	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtNombre'])) $nombre = $_POST['txtNombre'];
  if (isset($_POST['listbox1'])) $listbox1 = $_POST['listbox1'];
  
	switch ($boton) {

		case 'Guardar':
			$objUsuario = new RepresenVisual($id, $nombre);
			$objControlRepresenVisual = new ControlRepresenVisual($objUsuario);
			$objControlRepresenVisual->guardar();
			if ($listbox1 != ""){
				for($i = 0; $i < count($listbox1); $i++){
					$cadenas = explode(";", $listbox1[$i]);
					$id = $cadenas[0];
					$objrepresenvisualporindicador = new represenvisualporindicador($id, $nombre);
					$objControlrepresenvisualporindicador = new Controlrepresenvisualporindicador($objrepresenvisualporindicador);
					$objControlrepresenvisualporindicador>guardar();
				}
			}
			header('Location: paginaRepresenVisual.php');
			break;

		case 'Consultar':
			$objRepresenVisual = new RepresenVisual($id, "");
			$objControlRepresenVisual = new ControlRepresenVisual($objRepresenVisual);
			$objRepresenVisual = $objControlRepresenVisual->consultar();
			$nombre = $objRepresenVisual->getNombre();
      $objControlrepresenvisualporindicador = new Controlrepresenvisualporindicador(null);
			$arregloRepresenVisualConsulta = $objControlrepresenvisualporindicador->listarRepresenVisualPorIndicador($nombre);
			break;

		case 'Modificar':
			$objRepresenVisual = new RepresenVisual($id, $nombre);
			$objControlRepresenVisual = new ControlRepresenVisual($objRepresenVisual);
			$objControlRepresenVisual->modificar();
			header('Location: paginaRepresenVisual.php');
			break;

		case 'Borrar':
			$objRepresenVisual = new RepresenVisual($id, $nombre);
			$objControlRepresenVisual = new ControlRepresenVisual($objRepresenVisual);
			$objControlRepresenVisual->borrar();
			header('Location: paginaRepresenVisual.php');
			break;
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gestión de Representación Visual</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

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
                    <div class="col-sm-7 mt-4"><h2>Representación <b>Visual</b></h2></div>
                    <div class="col-sm-5">
                    <a href="#crudModal" class="btn btn-outline-info mt-4" style="width:max-content" data-toggle="modal"><i class="fa fa-cog"></i> Administrar Representación</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="background-color:lightgray">ID</th>
                        <th style="width: 50%;background-color:lightgray">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					        for($i = 0; $i < count($arregloRepresenVisual); $i++){
					      ?>
                    <tr>
                        <td><?php echo $arregloRepresenVisual[$i]->getId();?></td>
                        <td><?php echo $arregloRepresenVisual[$i]->getNombre();?></td>
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

  <div id="crudModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
              <form action="paginaRepresenVisual.php" method="post">
                <div class="modal-header " style="background-color:lightgray">						
                  <h4 class="modal-title">Tipo Representación Visual</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                  <div class="form-group">
                    <label>ID</label>
                    <input type="text" id="txtId" name="txtId" class="form-control" value="<?php echo $id ?>">
                  </div>
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" id="txtNombre" name="txtNombre" class="form-control" value="<?php echo $nombre ?>">
                  </div>
                  <div class="form-group">
                    <input type="submit" id="btnGuardar" name="bt" class="btn btn-success" value="Guardar">
                    <input type="submit" id="btnConsultar" name="bt" class="btn btn-primary" value="Consultar">
                    <input type="submit" id="btnModificar" name="bt" class="btn btn-warning" value="Modificar">
                    <input type="submit" id="btnBorrar" name="bt" class="btn btn-danger" value="Borrar">
                  </div>				
              </div>
			  </form>
		  </div>
	  </div>
</div>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
<script>
  $(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
			'<td>' + actions + '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
});

</script>
</html>