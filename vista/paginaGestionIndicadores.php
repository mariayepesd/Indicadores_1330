<?php
include '../controlador/configBd.php';
include '../controlador/ControlConexion.php';

include '../controlador/ControlIndicador.php';

include '../controlador/ControlRepresenVisual.php';

include '../controlador/ControlFuente.php';
include '../controlador/ControlFuenteIndicador.php';

include '../controlador/ControlVariable.php';
include '../controlador/ControlVariableIndicador.php';

include '../controlador/ControlResultadoIndicador.php';
include '../controlador/ControlResultado.php';

include '../controlador/Controlrepresenvisualporindicador.php';


include '../modelo/Fuente.php';
include '../modelo/Variable.php';
include '../modelo/Resultado.php';
include '../modelo/Indicador.php';
include '../modelo/FuenteIndicador.php';
include '../modelo/RepresenVisual.php';
include '../modelo/represenvisualporindicador.php';

$boton = "";
$id = "";

$listbox1 = array();
$listbox2 = array();
$listbox3 = array();
$listbox4 = array();

$objControlFuente = new ControlFuente(null, null);
$objControlIndicador = new ControlIndicador(null);
$objControlRepresenvisual = new ControlRepresenvisual(null);
$objControlVariable = new ControlVariable(null);
$objControlResultado = new ControlResultado(null);
$objControlRepresenVisual = new ControlRepresenVisual(null);

$arregloFuente = $objControlFuente->listar();
$arregloIndicador = $objControlIndicador->listarIndicador();
$arregloRepresenVisual = $objControlRepresenvisual->listar();
$arregloVariable = $objControlVariable->listar();
$arregloResultado = $objControlResultado->listar();

if (isset($_POST['bt'])) $boton = $_POST['bt']; //toma del arreglo post el value del bt	
if (isset($_POST['selectindicador'])) $id = $_POST['selectindicador'];
if (isset($_POST['listbox4'])) $listbox4 = $_POST['listbox4'];
if (isset($_POST['listbox3'])) $listbox3 = $_POST['listbox3'];
if (isset($_POST['listbox2'])) $listbox2 = $_POST['listbox2'];
if (isset($_POST['listbox1'])) $listbox1 = $_POST['listbox1'];
switch ($boton) {

  case 'Guardar':

    $objFuente = new Fuente($id, $nom);
    $objControlFuente = new ControlFuente($objFuente);
    $objControlFuente->guardar();
    if($listbox1 != ""){

      for($i<0; $i<count($listbox1); $i++){

        //$objFuenteIndicador = new FuenteIndicador();

      }
    }
    header('Location: paginaGestionIndicadores.php');
    break;
 
  case 'Borrar':
    $objFuente = new Fuente($id, $nom);
    $objControlFuente = new ControlFuente($objFuente);
    $objControlFuente->borrar();
    header('Location: paginaGestionIndicadores.php');
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

  <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                        <div class="col-sm-6 mt-3 float-left" style="text-align: left"><h2><b>Gestión de Indicadores</b></h2></div>
                            <div class="col-sm-6" style="text-align: right;">
						            <a href="#crudModal" class="btn btn-outline-info mt-4" style="width:max-content" data-toggle="modal"><i class="fa fa-cog"></i> Administrar Indicadores</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Objetivo</th>
                                <th>Alcance</th>
                                <th>Fórmula</th>
                                <th>Meta</th>

                            </tr>
                        </thead>
                        <?php
					        for($i = 0; $i < count($arregloIndicador); $i++){
					      ?>
                    <tr>
                        <td><?php echo $arregloIndicador[$i]->getId();?></td>
                        <td><?php echo $arregloIndicador[$i]->getCodigo();?></td>
                        <td><?php echo $arregloIndicador[$i]->getNombre();?></td>
                        <td><?php echo $arregloIndicador[$i]->getObjetivo();?></td>
                        <td><?php echo $arregloIndicador[$i]->getAlcance();?></td>
                        <td><?php echo $arregloIndicador[$i]->getFormula();?></td>
                        <td><?php echo $arregloIndicador[$i]->getMeta();?></td>
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

  <div id="crudModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="paginaGestionIndicadores.php" method="post">
          <div class="modal-header">
            <h4 style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 16px;" class="modal-title text-secondary font-weight-bold">Gestión Indicadores</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">

            <div class="container">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs w-100" role="tablist">
                <li class="nav-item">
                  <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;" class="nav-link font-weight-bold active" data-toggle="tab" href="#home">Datos Indicador</a>
                </li>
                <li class="nav-item">
                  <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;" class="nav-link font-weight-bold" data-toggle="tab" href="#representacion">Representación / Indicador</a>
                </li>
                <li class="nav-item">
                  <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;" class="nav-link font-weight-bold" data-toggle="tab" href="#responsable">Responsable / indicador</a>
                </li>
                <li class="nav-item">
                  <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;" class="nav-link font-weight-bold" data-toggle="tab" href="#fuente">Fuente / indicador</a>
                </li>
                <li class="nav-item">
                  <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;" class="nav-link font-weight-bold" data-toggle="tab" href="#variable">Variable / indicador</a>
                </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label>Email</label>
                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label>Contraseña</label>
                    <input type="text" id="txtContrasena" name="txtContrasena" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <input style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="submit" id="btnGuardar" name="bt" class="btn btn-primary" value="Guardar">
                    <input style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="submit" id="btnConsultar" name="bt" class="btn btn-secondary" value="Consultar">
                    <input style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="submit" id="btnModificar" name="bt" class="btn btn-secondary" value="Modificar">
                    <input style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="submit" id="btnBorrar" name="bt" class="btn btn-danger" value="Borrar">
                  </div>
                </div>

                <div id="representacion" class="container tab-pane fade"><br>
                  <div class="container">
                    <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                      <label for="combobox1">Todas las Representaciones</label>
                      <select class="form-control" id="combobox1" name="combobox1">
                        <?php for ($i = 0; $i < count($arregloRepresenVisual); $i++) { ?>
                          <option value="<?php echo $arregloRepresenVisual[$i]->getId() . " - " . $arregloRepresenVisual[$i]->getNombre(); ?>">
                            <?php echo $arregloRepresenVisual[$i]->getId() . " - " . $arregloRepresenVisual[$i]->getNombre(); ?>
                          </option>
                        <?php } ?>
                      </select>
                      <br>
                      <label for="listbox1">Representaciones por Indicador</label>
                      <select multiple class="form-control" id="listbox1" name="listbox1[]">

                      </select>
                    </div>
                    <div class="form-group">
                      <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
                      <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox1')">Remover Item</button>
                    </div>
                  </div>
                </div>

                <div id="responsable" class="container tab-pane fade"><br>
                  <div class="container">
                    <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                      <label for="combobox1">Todos los responsables</label>
                      <select class="form-control" id="combobox1" name="combobox1">
                        <?php for ($i = 0; $i < count($arregloRoles); $i++) { ?>
                          <option value="<?php echo $arregloRoles[$i]->getId() . ";" . $arregloRoles[$i]->getNombre(); ?>">
                            <?php echo $arregloRoles[$i]->getId() . ";" . $arregloRoles[$i]->getNombre(); ?>
                          </option>
                        <?php } ?>
                      </select>
                      <br>
                      <label for="listbox1">Responsables por indicador</label>
                      <select multiple class="form-control" id="listbox1" name="listbox1[]">

                      </select>
                    </div>
                    <div class="form-group">
                      <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
                      <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox1')">Remover Item</button>
                    </div>
                  </div>
                </div>

                <div id="fuente" class="container tab-pane fade"><br>
                  <div class="container">
                    <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                      <label for="combobox2">Todas las fuentes</label>
                      <select class="form-control" id="combobox2" name="combobox2">
                        <?php for ($i = 0; $i < count($arregloFuente); $i++) { ?>
                          <option value="<?php echo $arregloFuente[$i]->getId() . " - " . $arregloFuente[$i]->getNombre(); ?>">
                            <?php echo $arregloFuente[$i]->getId() . " - " . $arregloFuente[$i]->getNombre(); ?>
                          </option>
                        <?php } ?>
                      </select>

                      <br>
                      <label for="listbox2">Fuentes por indicador</label>
                      <select multiple class="form-control" id="listbox2" name="listbox2[]">
                      </select>

                    </div>
                    <div class="form-group">
                      <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox2', 'listbox2')">Agregar Item</button>
                      <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox2')">Remover Item</button>
                    </div>
                  </div>
                </div>

                <div id="variable" class="container tab-pane fade"><br>
                  <div class="container">
                    <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                      <label for="combobox3">Todas las variables</label>
                      <select class="form-control" id="combobox3" name="combobox3">

                        <?php for ($i = 0; $i < count($arregloVariable); $i++) { ?>
                          <option value="<?php echo $arregloVariable[$i]->getId() . " - " . $arregloVariable[$i]->getNombre(); ?>">
                            <?php echo $arregloVariable[$i]->getId() . " - " . $arregloVariable[$i]->getNombre(); ?>
                          </option>
                        <?php } ?>

                      </select>
                      <br>
                      <label for="listbox3">Variables por indicador</label>
                      <select multiple class="form-control" id="listbox3" name="listbox3[]">

                      </select>
                    </div>
                    <div class="form-group">
                      <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox3', 'listbox3')">Agregar Item</button>
                      <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox3')">Remover Item</button>
                    </div>
                  </div>
                </div>


              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>


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
  <script src="../vista/assets/js/indicadores.js"></script>

  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>



</html>