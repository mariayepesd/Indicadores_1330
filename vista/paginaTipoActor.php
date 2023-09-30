<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlTipoActor.php';
	include '../modelo/TipoActor.php';

	$boton = "";
	$id = "";
	$nombre = "";
	$objControlTipoActor = new ControlTipoActor(null,null);

    $arregloTipoActor = $objControlTipoActor->listar();

	if (isset($_POST['bt'])) $boton = $_POST['bt'];
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtNombre'])) $nombre = $_POST['txtNombre'];
  
	switch ($boton) {
		case 'Guardar':
			$objTipoActor = new TipoActor($id, $nombre);
			$objControlTipoActor = new ControlTipoActor($objTipoActor);
			$objControlTipoActor->guardar();
			header('Location: paginaTipoActor.php');
			break;
		case 'Consultar':
			$objTipoActor = new TipoActor($id, "");
			$objControlTipoActor = new ControlTipoActor($objTipoActor);
			$objTipoActor = $objControlTipoActor->consultar();
			$nombre = $objTipoActor->getNombre();
			break;
		case 'Modificar':
			$objTipoActor = new TipoActor($id, $nombre);
			$objControlTipoActor = new ControlTipoActor($objTipoActor);
			$objControlTipoActor->modificar();
			header('Location: paginaTipoActor.php');
			break;
		case 'Borrar':
			$objTipoActor = new TipoActor($id, $nombre);
			$objControlTipoActor = new ControlTipoActor($objTipoActor);
			$objControlTipoActor->borrar();
			header('Location: paginaTipoActor.php');
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
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    </head>
    <body>

    <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="paginaTipoActor.php">Indicadores 1330</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="paginaInicio.php">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#legal">Módulo Legal</a></li>
          <li><a class="nav-link scrollto" href="#indicadores">Módulo Indicadores</a></li>
          <li><a class="nav-link scrollto " href="#usuarios">Módulo Usuarios</a></li>
          <div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action">CRUD <b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="paginaRepresenVisual.php" class="dropdown-item"><i class="fa fa-user-o"></i> Representacion Visual</a>
					<div class="divider dropdown-divider"></div>
					<a href="paginaSentido.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Sentido</a>
				</div>
			</div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <section id="hero" class="d-flex align-items-center">
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                        <div class="col-sm-6 mt-3 float-left" style="text-align: left"><h2>Tipo <b>Actores</b></h2></div>
                            <div class="col-sm-6" style="text-align: right;">
						            <a href="#crudModal" class="btn btn-outline-info mt-4" style="width:max-content" data-toggle="modal"><i class="fa fa-cog"></i> Administrar Tipos de actores</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width: 50%;">Nombre</th>
                            </tr>
                        </thead>
                        <?php
					        for($i = 0; $i < count($arregloTipoActor); $i++){
					      ?>
                    <tr>
                        <td><?php echo $arregloTipoActor[$i]->getId();?></td>
                        <td><?php echo $arregloTipoActor[$i]->getNombre();?></td>
                    </tr>
                    <?php
					        }
					?>
                    </table>
                        <div class="search-box">
                                <input type="text" class="form-control" placeholder="Buscar" style="width:max-content">
                        </div>
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
                    <form action="paginaTipoActor.php" method="post">
                        <div class="modal-header " style="background-color:lightgray">						
                        <h4 class="modal-title">Tipo Actor</h4>
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
    </body>
</html>