<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlVariable.php';
	include '../modelo/Variable.php';

	$boton = "";
	$id = "";
	$nombre = "";
    $fechaCreacion="";
    $fkemailusuario="";
	$objControlVariable = new ControlVariable (null);

    $arregloVariable = $objControlVariable->listar();

	if (isset($_POST['bt'])) $boton = $_POST['bt'];
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtNombre'])) $nombre = $_POST['txtNombre'];
    if (isset($_POST['txtFechaCreacion'])) $fechaCreacion = $_POST['txtFechaCreacion'];
    if (isset($_POST['txtEmailUsuario'])) $fkemailusuario = $_POST['txtEmailUsuario'];
  
	switch ($boton) {
		case 'Guardar':
			$objVariable = new Variable($id, $nombre, $fechaCreacion, $fkemailusuario);
			$objControlVariable = new ControlVariable($objVariable);
			$objControlVariable->guardar();
			header('Location: paginaVariable.php');
			break;
		case 'Consultar':
			$objVariable = new Variable($id, $nombre, $fechaCreacion, $fkemailusuario);
			$objControlVariable = new ControlVariable($objVariable);
			$objVariable = $objControlVariable->consultar();
			$nombre = $objVariable->getNombre();
            $fechaCreacion = $objVariable->getFechaCreacion();
            $fkemailusuario = $objVariable->getFkEmailUsuario();
			break;
		case 'Modificar':
			$objVariable = new Variable($id, $nombre, $fechaCreacion, $fkemailusuario);
			$objControlVariable = new ControlVariable($objVariable);
			$objControlVariable->modificar();
			header('Location: paginaVariable.php');
			break;
		case 'Borrar':
            // TODO BORRAR POR ID O POR NOMBRE O POR TODOS, DISCUTIR
			$objVariable = new Variable($id, null, null, null);
			$objControlVariable = new ControlVariable($objVariable);
			$objControlVariable->borrar();
			header('Location: paginaVariable.php');
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
<title>Variables</title>
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
          <li><a class="nav-link scrollto" href="vistaUsuarios.php">Módulo Usuarios</a></li>
          <li><a class="getstarted scrollto" href="../index.php">Cerrar Sesión</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header> 

  <section id="hero" class="d-flex align-items-center">
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                        <div class="col-sm-6 mt-3 float-left" style="text-align: left"><h2><b>Variables</b></h2></div>
                            <div class="col-sm-6" style="text-align: right;">
						            <a href="#crudModal" class="btn btn-outline-info mt-4" style="width:max-content" data-toggle="modal"><i class="fa fa-cog"></i> Administrar variables</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th style="width: 25%;">Fecha Creacion</th>
                                <th style="width: 50%;">Email usuario</th>
                            </tr>
                        </thead>
                        <?php
					        for($i = 0; $i < count($arregloVariable); $i++){
					      ?>
                    <tr>
                        <td><?php echo $arregloVariable[$i]->getId();?></td>
                        <td><?php echo $arregloVariable[$i]->getNombre();?></td>
                        <td><?php echo $arregloVariable[$i]->getFechaCreacion();?></td>
                        <td><?php echo $arregloVariable[$i]->getFkEmailUsuario();?></td>
                    </tr>
                    <?php
					        }
					?>
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
                    <form action="paginaVariable.php" method="post">
                        <div class="modal-header " style="background-color:lightgray">						
                        <h4 class="modal-title">Variable</h4>
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
                            <label>Fecha creacion</label>
                            <input type="text" id="txtFechaCreacion" name="txtFechaCreacion" class="form-control" value="<?php echo $fechaCreacion ?>">
                        </div>
                        <div class="form-group">
                            <label>Email usuario</label>
                            <input type="text" id="txtEmailUsuario" name="txtEmailUsuario" class="form-control" value="<?php echo $fkemailusuario ?>">
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