<?php
ob_start();
?>
<?php 
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlUsuario.php';
	include '../controlador/ControlRol.php';
	include '../controlador/ControlRolUsuario.php';
	include '../modelo/Usuario.php';
	include '../modelo/Rol.php';
	include '../modelo/RolUsuario.php';
  	session_start();
  	if($_SESSION['email']==null)header('Location: ../index.php');

	$permisoParaEntrar=false;
	$listaRolesDelUsuario=$_SESSION['listaRolesDelUsuario'];
	for($i=0;$i<count($listaRolesDelUsuario);$i++){
		if($listaRolesDelUsuario[$i]->nombre=="admin")
		$permisoParaEntrar=true;
	}
	if(!$permisoParaEntrar){
		header('Location: ../index.php?error=No tienes permisos para acceder');
		exit();
	}

?>
<?php

	$boton = "";
	$ema = "";
	$con = "";
	$listbox1 = array();
	$objControlUsuario = new ControlUsuario(null);
	$arregloUsuarios = $objControlUsuario->listar();

	$objControlRol = new ControlRol(null);
	$arregloRoles = $objControlRol->listar();

	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtEmail'])) $ema = $_POST['txtEmail'];
	if (isset($_POST['txtContrasena'])) $con = $_POST['txtContrasena'];
	if (isset($_POST['listbox1'])) $listbox1 = $_POST['listbox1'];
	switch ($boton) {
		case 'Guardar':
			$objUsuario = new Usuario($ema, $con);
			$objControlUsuario = new ControlUsuario($objUsuario);
			$objControlUsuario->guardar();
			if ($listbox1 != ""){
				for($i = 0; $i < count($listbox1); $i++){
					$cadenas = explode(" - ", $listbox1[$i]);
					$id = $cadenas[0];
					$objRolUsuario = new RolUsuario($ema, $id);
					$objControlRolUsuario = new ControlRolUsuario($objRolUsuario);
					$objControlRolUsuario->guardar();
				}
			}
			header('Location: vistaUsuarios.php');
			break;
		case 'Consultar':
			$objUsuario = new Usuario($ema, "");
			$objControlUsuario = new ControlUsuario($objUsuario);
			$objUsuario = $objControlUsuario->consultar();
			$con = $objUsuario->getContrasena();
			//Llenar el listbox1 con la lista de roles del ususario específico.
			$objControlRolUsuario = new ControlRolUsuario(null);
			$arregloRolesConsulta = $objControlRolUsuario->listarRolesDelUsuario($ema);
			//Asignarle los datos de arregloRolesConsulta al listbox1.

			//var_dump($arregloRolesConsulta);
			break;
		case 'Modificar': 
			//El modificar deberia hacerse con el llamado a un proceso almacenado que tengan control de transaciones.
			//paso 1. Modificar en la tabla usuario.
			$objUsuario = new Usuario($ema, $con);
			$objControlUsuario = new ControlUsuario($objUsuario);
			$objControlUsuario->modificar();
			//paso2. Borrar los registros asociados a la tabla intermedia.
			$objControlRolUsuario = new ControlRolUsuario(null);
			$arregloRolesConsulta = $objControlRolUsuario->borrarRolesDelUsuario($ema);
			//paso3. Guardar de nuevo en la tabla intermedia.
			if ($listbox1 != ""){
				for($i = 0; $i < count($listbox1); $i++){
					$cadenas = explode(" - ", $listbox1[$i]);
					$id = $cadenas[0];
					$objRolUsuario = new RolUsuario($ema, $id);
					$objControlRolUsuario = new ControlRolUsuario($objRolUsuario);
					$objControlRolUsuario->guardar();
				}
			}
			header('Location: vistaUsuarios.php');
			break;
		case 'Borrar':
			$objUsuario = new Usuario($ema, "");
			$objControlUsuario = new ControlUsuario($objUsuario);
			$objControlUsuario->borrar();
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
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Usuarios</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/tablaVistaUsuario.css">
<link href="../assets/css/style.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../vista/assets/js/indicadores.js"></script>
</head>
<body>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="paginaInicio.php">Indicadores 1330</a></h1>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="paginaInicio.php">Inicio</a></li>
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
					<div class="col-sm-6">
						<h2  style="color: white">Gestión <b>Usuarios</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#crudModal" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE84E;</i> <span>Gestión Usuarios</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Email</th>
						<th>Contraseña</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for($i = 0; $i < count($arregloUsuarios); $i++){
					?>
						<tr>
							<td><?php echo $arregloUsuarios[$i]->getEmail();?></td>
							<td><?php echo $arregloUsuarios[$i]->getContrasena();?></td>	
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
<!-- crud Modal HTML -->
<!-- crud Modal HTML -->
<div id="crudModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="vistaUsuarios.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Usuario</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					
						<div class="container">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#home">Datos de usuario</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu1">Roles por usuario</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div id="home" class="container tab-pane active"><br>
							<div class="form-group">
								<label>Email</label>
									<input type="email" id="txtEmail" name="txtEmail" class="form-control" value="<?php echo $ema ?>">
								</div>
								<div class="form-group">
									<label>Contraseña</label>
									<input type="text" id="txtContrasena" name="txtContrasena" class="form-control" value="<?php echo $con ?>">
								</div>
								<div class="form-group">
									<input type="submit" id="btnGuardar" name="bt" class="btn btn-success" value="Guardar">
									<input type="submit" id="btnConsultar" name="bt" class="btn btn-success" value="Consultar">
									<input type="submit" id="btnModificar" name="bt" class="btn btn-warning" value="Modificar">
									<input type="submit" id="btnBorrar" name="bt" class="btn btn-warning" value="Borrar">
								</div>
							</div>
							<div id="menu1" class="container tab-pane fade"><br>
							<div class="container">
								<div class="form-group">
									<label for="combobox1">Todos los roles</label>
								<select class="form-control" id="combobox1" name="combobox1">
									<?php for($i=0; $i<count($arregloRoles); $i++){ ?>
									<option value="<?php echo $arregloRoles[$i]->getId()." - ". $arregloRoles[$i]->getNombre(); ?>">
										<?php echo $arregloRoles[$i]->getId()." - ". $arregloRoles[$i]->getNombre(); ?>
									</option>
									<?php } ?>
								</select>
								<br>
								<label for="listbox1">Roles específicos del usuario</label>
								<select multiple class="form-control" id="listbox1" name="listbox1[]">
									<?php for($i=0; $i<count($arregloRolesConsulta); $i++){ ?>
									<option value="<?php echo $arregloRolesConsulta[$i]->getId()." - ". $arregloRolesConsulta[$i]->getNombre(); ?>">
										<?php echo $arregloRolesConsulta[$i]->getId()." - ". $arregloRolesConsulta[$i]->getNombre(); ?>
									</option>
									<?php } ?>
								</select>
								</div>
									<div class="form-group">
										<button type="button" id="btnAgregarItem" name="bt" class="btn btn-success" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
										<button type="button" id="btnRemoverItem" name="bt" class="btn btn-success" onclick="removerItem('listbox1')">Remover Item</button>
									</div>
								</div>
							</div>
						</div>
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

<?php
  ob_end_flush();
?>