<?php
include '../controlador/configBd.php';
include '../controlador/ControlConexion.php';

include '../controlador/ControlIndicador.php';

include '../controlador/ControlFuente.php';
include '../controlador/ControlFuenteIndicador.php';

include '../controlador/ControlVariable.php';
include '../controlador/ControlVariableIndicador.php';

include '../controlador/ControlResultadoIndicador.php';
include '../controlador/ControlResultado.php';

include '../modelo/Fuente.php';
include '../modelo/Variable.php';
include '../modelo/Resultado.php';
include '../modelo/Indicador.php';
include '../modelo/FuenteIndicador.php';

$boton = "";
$idInd = "";


$listbox1 = array();

$objControlFuente = new ControlFuente(null);
$objControlIndicador = new ControlIndicador(null);
$objControlVariable = new ControlVariable(null);
$objControlResultado = new ControlResultado(null);
$objControlRepresenVisual = new ControlRepresenVisual(null)

$arregloFuente = $objControlFuente->listar();
$arregloIndicador = $objControlIndicador->listarIndicador();
$arregloVariable = $objControlVariable->listar();
$arregloResultado = $objControlResultado->listar();
$arregloRepresenVisual = $objControlRepresenVisual->listar();


if (isset($_POST['bt'])) $boton = $_POST['bt']; //toma del arreglo post el value del bt	
if (isset($_POST['selectindicador'])) $idInd = $_POST['selectindicador'];

if (isset($_POST['listbox1'])) $listbox1 = $_POST['listbox1'];


switch ($boton) {

  case 'Guardar':

    var_dump($idInd);
    $objIndicador = new Indicador($idInd, '');
		$objControlIndicador = new ControlIndicador($objIndicador);
		$objControlIndicador->guardar();

    if($listbox1 != "") {

      for($i<0; $i<count($listbox1); $i++){

        $string = explode(" - ",$listbox1[$i]);
        $idf = $string[0];
        $objFuenteIndicador = new FuenteIndicador($idf,$idInd);
        $objControlFuenteIndicador = new ControlFuenteIndicador($objFuenteIndicador);
        $objControlFuenteIndicador->guardar();

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
  <!-- <header id="header" class="fixed-top">
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
      </nav>

    </div>
  </header> -->


  <section id="hero" class="mt-5 d-flex align-items-center">

    <div class="container-lg mt-5">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs w-100">
        <li class="nav-item">
          <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;" class="nav-link font-weight-bold active" data-toggle="tab" href="#home">Datos Indicador</a>
        </li>
        <li class="nav-item">
          <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;" class="nav-link font-weight-bold" data-toggle="tab" href="#menu1">Representación / Indicador</a>
        </li>
        <li class="nav-item">
          <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;" class="nav-link font-weight-bold" data-toggle="tab" href="#menu2">Responsable / indicador</a>
        </li>
        <li class="nav-item">
          <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;" class="nav-link font-weight-bold" data-toggle="tab" href="#fuente">Fuente / indicador</a>
        </li>
        <li class="nav-item">
          <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;" class="nav-link font-weight-bold" data-toggle="tab" href="#variable">Variable / indicador</a>
        </li>
        <li class="nav-item">
          <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;" class="nav-link font-weight-bold" data-toggle="tab" href="#resultado">Resultado / indicador</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane container active" id="home">
        <div class="form-group">
          <form method="post">
								<label for="combobox1">Todos los indicadores</label>  
                  <select class="form-control" id="selectindicador" name="selectindicador">
                    <?php for ($i = 0; $i < count($arregloIndicador); $i++) { ?>
                      <option value="<?php echo $arregloIndicador[$i]->getId()?>">
                        <?php echo $arregloIndicador[$i]->getId() . " - " . $arregloIndicador[$i]->getNombre(); ?>
                      </option>
                    <?php } ?>
                  </select>
								<div class="form-group">
									<input style="font-family:'Open Sans',sans-serif;font-size: 14px; float:right;" type="submit" id="btnGuardar" name="bt" class="btn btn-secondary mt-2 ml-2" value="Guardar">
									<input style="font-family:'Open Sans',sans-serif;font-size: 14px; float:right;" type="submit" id="btnBorrar" name="bt" class="btn btn-secondary mt-2" value="Borrar">
								</div>
							</div>
        </div>
        </form>

        <div class="tab-pane container fade" id="Representacion">
          

          <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
            
            <label for="combobox1">Todas las fuentes</label>  
            <select class="form-control" id="combobox1" name="combobox1">
              <?php for ($i = 0; $i < count($arregloRepresenVisual); $i++) { ?>
                <option value="<?php echo $arregloRepresenVisual[$i]->getId() . " - " . $arregloRepresenVisual[$i]->getNombre(); ?>">
                  <?php echo $arregloRepresenVisual[$i]->getId() . " - " . $arregloRepresenVisual[$i]->getNombre(); ?>
                </option>
              <?php } ?>
            </select>

            <br>
            <label for="listbox1">Representaciones por indicador</label>
            <select multiple class="form-control" id="listbox1" name="listbox1[]">
            </select>

          </div>
          
          <div class="form-group float-right">
            <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
            <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox1')">Remover Item</button>
          </div>

        </div>

        <div class="tab-pane container fade" id="menu2">...</div>

        <div class="tab-pane container fade" id="fuente">
          

          <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
            
            <label for="combobox1">Todas las fuentes</label>  
            <select class="form-control" id="combobox1" name="combobox1">
              <?php for ($i = 0; $i < count($arregloFuente); $i++) { ?>
                <option value="<?php echo $arregloFuente[$i]->getId() . " - " . $arregloFuente[$i]->getNombre(); ?>">
                  <?php echo $arregloFuente[$i]->getId() . " - " . $arregloFuente[$i]->getNombre(); ?>
                </option>
              <?php } ?>
            </select>

            <br>
            <label for="listbox1">Fuentes por indicador</label>
            <select multiple class="form-control" id="listbox1" name="listbox1[]">
            </select>

          </div>
          
          <div class="form-group float-right">
            <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
            <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox1')">Remover Item</button>
          </div>

        </div>


        <div class="tab-pane container fade" id="variable">

        <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
            <label for="combobox1">Todas las variables</label>
            <select class="form-control" id="combobox1" name="combobox1">

              <?php for ($i = 0; $i < count($arregloVariable); $i++) { ?>
                <option value="<?php echo $arregloVariable[$i]->getId()?>">
                  <?php echo $arregloVariable[$i]->getId() . " - " . $arregloVariable[$i]->getNombre(); ?>
                </option>
              <?php } ?>

            </select>
            <br>
            <label for="listbox1">Variables por indicador</label>
            <select multiple class="form-control" id="listbox1" name="listbox1[]">

            </select>
          </div>
          <div class="form-group float-right">
            <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
            <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox1')">Remover Item</button>
          </div>
        </div>

      <div class="tab-pane container fade" id="resultado">

      <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
            <label for="combobox1">Todos los resultados</label>
            <select class="form-control" id="combobox1" name="combobox1">
              <?php for ($i = 0; $i < count($arregloResultado); $i++) { ?>
                <option value="<?php echo $arregloResultado[$i]->getId()?>">
                  <?php echo $arregloResultado[$i]->getId() . " - " . $arregloResultado[$i]->getResultado(); ?>
                </option>
              <?php } ?>
            </select>
            <br>
            <label for="listbox1">Resultados por indicador</label>
            <select multiple class="form-control" id="listbox1" name="listbox1[]">

            </select>
          </div>
          <div class="form-group float-right">
            <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
            <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox1')">Remover Item</button>
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