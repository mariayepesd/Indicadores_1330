<?php

use PSpell\Config;

include '../controlador/configBd.php';
include '../controlador/ControlConexion.php';

include '../controlador/ControlIndicador.php';
include '../controlador/ControlMedicion.php';
include '../controlador/ControlTipoIndicador.php';
include '../controlador/ControlSentido.php';

include '../controlador/ControlArticulo.php';
include '../controlador/ControlLiteral.php';
include '../controlador/ControlParagrafo.php';

include '../controlador/ControlRepresenVisual.php';

include '../controlador/ControlFrecuencia.php';

include '../controlador/ControlFuente.php';
include '../controlador/ControlFuenteIndicador.php';

include '../controlador/ControlVariable.php';
include '../controlador/ControlVariableIndicador.php';

include '../controlador/ControlResultadoIndicador.php';
include '../controlador/ControlResultado.php';

include '../controlador/Controlrepresenvisualporindicador.php';
include '../controlador/ControlNumeral.php';

include '../controlador/ControlActor.php';
include '../controlador/ControlResponsablesPorIndicador.php';



include '../modelo/Fuente.php';
include '../modelo/Frecuencia.php';
include '../modelo/Variable.php';
include '../modelo/Resultado.php';
include '../modelo/Indicador.php';
include '../modelo/TipoIndicador.php';
include '../modelo/FuenteIndicador.php';
include '../modelo/UnidadMedicion.php';
include '../modelo/RepresenVisual.php';
include '../modelo/represenvisualporindicador.php';
include '../modelo/Sentido.php';
include '../modelo/Articulo.php';
include '../modelo/Literal.php';
include '../modelo/Paragrafo.php';
include '../modelo/Actor.php';
include '../modelo/Numeral.php';
include '../modelo/responsablesporindicador.php';
include '../modelo/ResultadoIndicador.php';
include '../modelo/VariableIndicador.php';

$boton = "";
$id = "";
$codigo = "";
$nombre = "";
$objetivo = "";
$alcance = "";
$formula = "";
$fktipoindicador = 0;
$fkunidadmedicion = 0;
$meta = "";
$fkidsentido = 0;
$fkidfrecuencia = 0;
$fkidarticulo = "";
$fkidliteral = "";
$fkidnumeral = "";
$fkidparagrafo = "";

$arregloFuenteIndicadorConsulta=[];


$listbox1 = array();
$listbox2 = array();
$listbox3 = array();
$listbox4 = array();
$listbox5 = array();
$listbox6 = array();

$objControlFuente = new ControlFuente(null);
$objControlIndicador = new ControlIndicador(null);
$objControlRepresenvisual = new ControlRepresenvisual(null);
$objControlVariable = new ControlVariable(null);
$objControlResultado = new ControlResultado(null);
$objControlUnidadMedicion = new ControlMedicion(null);
$objControlRepresenVisual = new ControlRepresenVisual(null);
$objControlTipoIndicador = new ControlTipoIndicador(null);
$objControlSentido = new ControlSentido(null);
$objControlArticulo = new ControlArticulo(null);
$objControlLiteral = new ControlLiteral(null);
$objControlParagrafo = new ControlParagrafo(null);
$objControlActor = new ControlActor(null);
$objControlFrecuencia = new ControlFrecuencia(null);
$objControlNumeral = new ControlNumeral(null);


$arregloFuente = $objControlFuente->listar();
$arregloIndicador = $objControlIndicador->listar();
$arregloRepresenVisual = $objControlRepresenvisual->listar();
$arregloVariable = $objControlVariable->listar();
$arregloResultado = $objControlResultado->listar();
$arregloTipoIndicador = $objControlTipoIndicador->listar();
$arregloUnidadMedicion = $objControlUnidadMedicion->listar();
$arregloSentido = $objControlSentido->listar();
$arregloArticulo = $objControlArticulo->listar();
$arregloLiteral = $objControlLiteral->listar();
$arregloParagrafo = $objControlParagrafo->listar();
$arregloActor = $objControlActor->listar();
$arregloFrecuencia = $objControlFrecuencia->listar();
$arregloNumeral = $objControlNumeral->listar();


if (isset($_POST['bt'])) $boton = $_POST['bt']; //toma del arreglo post el value del bt	
if (isset($_POST['txtId'])) $id = $_POST['txtId'];
if (isset($_POST['txtCodigo'])) $codigo = $_POST['txtCodigo'];
if (isset($_POST['txtNombre'])) $nombre = $_POST['txtNombre'];
if (isset($_POST['txtObjetivo'])) $objetivo = $_POST['txtObjetivo'];
if (isset($_POST['txtAlcance'])) $alcance = $_POST['txtAlcance'];
if (isset($_POST['txtFormula'])) $formula = $_POST['txtFormula'];
if (isset($_POST['tipoindicador'])) $fktipoindicador = $_POST['tipoindicador'];
if (isset($_POST['unidadmedicion'])) $fkunidadmedicion = $_POST['unidadmedicion'];
if (isset($_POST['txtMeta'])) $meta = $_POST['txtMeta'];
if (isset($_POST['sentido'])) $fkidsentido = $_POST['sentido'];
if (isset($_POST['frecuencia'])) $fkidfrecuencia = $_POST['frecuencia'];
if (isset($_POST['articulo'])) $fkidarticulo = $_POST['articulo'];
if (isset($_POST['literal'])) $fkidliteral = $_POST['literal'];
if (isset($_POST['numeral'])) $fkidnumeral = $_POST['numeral'];
if (isset($_POST['paragrafo'])) $fkidparagrafo = $_POST['paragrafo'];
if (isset($_POST['listbox5'])) $listbox5 = $_POST['listbox5'];
if (isset($_POST['listbox4'])) $listbox4 = $_POST['listbox4'];
if (isset($_POST['listbox3'])) $listbox3 = $_POST['listbox3'];
if (isset($_POST['listbox2'])) $listbox2 = $_POST['listbox2'];
if (isset($_POST['listbox1'])) $listbox1 = $_POST['listbox1'];

if (isset($_POST['combobox6']))
	$combobox6 = $_POST['combobox6'];
if (isset($_POST['combobox7']))
	$combobox7 = $_POST['combobox7'];
if (isset($_POST['combobox8']))
	$combobox8= $_POST['combobox8'];
if (isset($_POST['combobox9']))
	$combobox9 = $_POST['combobox9'];
if (isset($_POST['combobox10']))
	$combobox10 = $_POST['combobox10'];
if (isset($_POST['combobox11']))
	$combobox11 = $_POST['combobox11'];
if (isset($_POST['combobox12']))
	$combobox12 = $_POST['combobox12'];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcionSeleccionada = $_POST["combobox6"];
    $valores = explode(";", $opcionSeleccionada);
    $opcion1 = $valores[0];
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcionSeleccionada = $_POST["combobox7"];
    $valores = explode(";", $opcionSeleccionada);
    $opcion2 = $valores[0];
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcionSeleccionada = $_POST["combobox8"];
    $valores = explode(";", $opcionSeleccionada);
    $opcion3 = $valores[0];
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcionSeleccionada = $_POST["combobox9"];
    $valores = explode(";", $opcionSeleccionada);
    $opcion4 = $valores[0];
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcionSeleccionada = $_POST["combobox10"];
    $valores = explode(";", $opcionSeleccionada);
    $opcion5 = $valores[0];
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcionSeleccionada = $_POST["combobox11"];
    $valores = explode(";", $opcionSeleccionada);
    $opcion6 = $valores[0];
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcionSeleccionada = $_POST["combobox12"];
    $valores = explode(";", $opcionSeleccionada);
    $opcion7 = $valores[0];
  }

switch ($boton) {
  case 'Guardar':
    $objIndicador = new Indicador(
      $id,
      $codigo,
      $nombre,
      $objetivo,
      $alcance,
      $formula,
      $fktipoindicador = $opcion1,
      $fkunidadmedicion = $opcion2,
      $meta,
      $fkidsentido = $opcion3,
      $fkidfrecuencia ,
      $fkidarticulo = $opcion4,
      $fkidliteral = $opcion5,
      $fkidnumeral = $opcion6,
      $fkidparagrafo = $opcion7
    );

    $objControlIndicador = new ControlIndicador($objIndicador);
    $objControlIndicador->guardar();


    if ($listbox1 != "") {
			for ($i = 0; $i < count($listbox1); $i++) {
				$cadenas = explode(";", $listbox1[$i]);
				$idCadena = $cadenas[0];
				$objRepresenVisualPorIndicador = new RepresenVisualPorIndicador($id, $idCadena);
				$objControlRepresenVisualPorIndicador = new ControlRepresenVisualPorIndicador($objRepresenVisualPorIndicador);
				$objControlRepresenVisualPorIndicador->guardar();
			}
		}
		
		if ($listbox3 != "") {
			for ($i = 0; $i < count($listbox3); $i++) {
				$cadenas = explode(";", $listbox3[$i]);
				$idCadena = $cadenas[0];
				$objFuentesPorIndicador = new FuenteIndicador($id,$idCadena);
				$objControlFuentesPorIndicador = new ControlFuenteIndicador($objFuentesPorIndicador);
				$objControlFuentesPorIndicador->guardar();
			}
		}

		if ($listbox4 != "") {
			for ($i = 0; $i < count($listbox4); $i++) {
				$cadenas = explode(";", $listbox4[$i]);
				$idCadena = $cadenas[0];
				$objVariablesPorIndicador = new VariableIndicador($id,0,$idCadena,"admin@empresa.com");
				$objControlVariablesPorIndicador = new ControlVariableIndicador($objVariablesPorIndicador);
				$objControlVariablesPorIndicador->guardar();
			}

			
		} 
		
		if ($listbox2 != "") {
			for ($i = 0; $i < count($listbox2); $i++) {
				$cadenas = explode(";", $listbox2[$i]);
				$idCadena = $cadenas[0];
				$objResponsablePorIndicador = new ResponsablesPorIndicador($idCadena,$id,"");
				$objControlResponsablePorIndicador = new ControlResponsablesPorIndicador($objResponsablePorIndicador);
				$objControlResponsablePorIndicador->guardar();
			}
		} 

    if ($listbox5 != "") {
			for ($i = 0; $i < count($listbox5); $i++) {
				$cadenas = explode(";", $listbox5[$i]);
				$idCadena = $cadenas[0];
				$objResultadoPorIndicador = new ResultadoIndicador($idCadena,$id);
				$objControlResultadoPorIndicador = new ControlResultadoIndicador($objResultadoPorIndicador);
				$objControlResultadoPorIndicador->guardar();
			}
		} 


    header('Location: paginaGestionIndicadores.php');
    break;
  case 'Consultar':
		$objIndicador = new Indicador($id, "", "", "", "", "", 0 ,0, "", 0, 0, "", "", "", "");
		$objControlIndicador = new ControlIndicador($objIndicador);
		$objIndicador = $objControlIndicador->consultar();
    $codigo = $objIndicador->getCodigo();
    $nombre = $objIndicador->getNombre();
    $objetivo = $objIndicador->getObjetivo();
    $alcance = $objIndicador->getAlcance();
    $formula = $objIndicador->getFormula();
    $fktipoindicador = $objIndicador->getFkTipoIndicador(); 
    $fkunidadmedicion = $objIndicador->getFkUnidadMedicion(); 
    $meta = $objIndicador->getMeta();
    $fkidsentido = $objIndicador->getFkIdSentido(); 
    $fkidfrecuencia = $objIndicador->getFkIdFrecuencia(); 
    $fkidarticulo = $objIndicador->getFkIdArticulo();
    $fkidliteral = $objIndicador->getFkIdLiteral();
    $fkidnumeral = $objIndicador->getFkIdNumeral();
    $fkidparagrafo = $objIndicador->getFkIdParagrafo();

    $objControlFuentesPorIndicador = new ControlFuenteIndicador(null);
		$arregloFuenteIndicadorConsulta = $objControlFuentesPorIndicador->listarFuentesPorIndicador($id);
    header('Location: paginaGestionIndicadores.php');
    break;
  case 'Modificar':
    $objIndicador = new Indicador(
      $id,
      $codigo,
      $nombre,
      $objetivo,
      $alcance,
      $formula,
      $fktipoindicador,
      $fkunidadmedicion,
      $meta,
      $fkidsentido,
      $fkidfrecuencia,
      $fkidarticulo,
      $fkidliteral,
      $fkidnumeral,
      $fkidparagrafo
    );

    $objControlIndicador = new ControlIndicador($objIndicador);
    $objControlIndicador->modificar();
    header('Location: paginaGestionIndicadores.php');
    break;
  case 'Borrar':
    $objIndicador = new Indicador(
      $id,
      $codigo,
      $nombre,
      $objetivo,
      $alcance,
      $formula,
      $fktipoindicador,
      $fkunidadmedicion,
      $meta,
      $fkidsentido,
      $fkidfrecuencia,
      $fkidarticulo,
      $fkidliteral,
      $fkidnumeral,
      $fkidparagrafo
    );

    $objControlIndicador = new ControlIndicador($objIndicador);
    $objControlIndicador->borrar();
    header('Location: paginaGestionIndicadores.php');
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

  <title>Gestión de Indicadores</title>

  <!-- Favicons -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gestión de Indicadores</title>
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
      </nav>

    </div>
  </header> 

  <!-- End Header -->


  <section id="hero" class="mt-5 d-flex align-items-center">

    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper w-100">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6 mt-3 float-left" style="text-align: left">
                <h2><b>Gestión de Indicadores</b></h2>
              </div>
              <div class="col-sm-6" style="text-align: right;">
                <a href="#crudModal" class="btn btn-outline-info mt-4" style="width:max-content" data-toggle="modal"><i class="fa fa-cog"></i> Administrar Indicadores</a>
              </div>
            </div>
          </div>
          <table class="table table-striped table-responsive table-hover table-bordered h-100 text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Objetivo</th>
                <th>Alcance</th>
                <th>Fórmula</th>
                <th>Tipo Indicador</th>
                <th>Unidad Medición</th>
                <th>Meta</th>
                <th>Sentido</th>
                <th>Frecuencia</th>
                <th>Artículo</th>
                <th>Literal</th>
                <th>Numeral</th>
                <th>Parágrafo</th>

              </tr>
            </thead>
            <?php
            for ($i = 0; $i < count($arregloIndicador); $i++) {
            ?>
              <tr>
                <td><?php echo $arregloIndicador[$i]->getId(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getCodigo(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getNombre(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getObjetivo(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getAlcance(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getFormula(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getFkTipoIndicador(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getFkUnidadMedicion(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getMeta(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getFkIdSentido(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getFkIdFrecuencia(); ?>
                <td><?php echo $arregloIndicador[$i]->getFkIdArticulo(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getFkIdLiteral(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getFkIdNumeral(); ?></td>
                <td><?php echo $arregloIndicador[$i]->getFkIdParagrafo(); ?></td>
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
                </li>
                <li class="nav-item">
                  <a style="color: #3b4ef8; font-family:'Open Sans',sans-serif; font-size: 14px;" class="nav-link font-weight-bold" data-toggle="tab" href="#resultado">Resultado / indicador</a>
                </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label>Id</label>
                    <input type="text" id="txtId" name="txtId" class="form-control" value="<?php echo $id ?>">
                  </div>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label>Código</label>
                    <input type="text" id="txtCodigo" name="txtCodigo" class="form-control" value="<?php echo $codigo ?>">
                  </div>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label>Nombre</label>
                    <input type="text" id="txtNombre" name="txtNombre" class="form-control" value="<?php echo $nombre ?>">
                  </div>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label>Objetivo</label>
                    <input type="text" id="txtObjetivo" name="txtObjetivo" class="form-control" value="<?php echo $objetivo ?>">
                  </div>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label>Alcance</label>
                    <input type="text" id="txtAlcance" name="txtAlcance" class="form-control" value="<?php echo $alcance ?>">
                  </div>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label>Fórmula</label>
                    <input type="text" id="txtFormula" name="txtFormula" class="form-control" value="<?php echo $formula ?>">
                  </div>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label for="combobox6">Tipo de Indicador</label>
                    <select class="form-control" id="combobox6" name="combobox6">
                      <?php for ($i = 0; $i < count($arregloTipoIndicador); $i++) { ?>
                        <option value="<?php echo $arregloTipoIndicador[$i]->getId(); ?>">
                          <?php echo $arregloTipoIndicador[$i]->getId(); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label for="combobox7">Unidad de Medición</label>
                    <select class="form-control" id="combobox7" name="combobox7">
                      <?php for ($i = 0; $i < count($arregloUnidadMedicion); $i++) { ?>
                        <option value="<?php echo $arregloUnidadMedicion[$i]->getId(); ?>">
                          <?php echo $arregloUnidadMedicion[$i]->getId(); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label>Meta</label>
                    <input type="text" id="txtMeta" name="txtMeta" class="form-control" value="<?php echo $meta ?>">
                  </div>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label for="combobox8">Sentido</label>
                    <select class="form-control" id="combobox8" name="combobox8">
                      <?php for ($i = 0; $i < count($arregloSentido); $i++) { ?>
                        <option value="<?php echo $arregloSentido[$i]->getId(); ?>">
                          <?php echo $arregloSentido[$i]->getId(); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label >Frecuencia</label>
                    <select class="form-control" id="frecuencia" name="frecuencia">
                      <?php for ($i = 0; $i < count($arregloFrecuencia); $i++) { ?>
                        <option value="<?php echo $arregloFrecuencia[$i]->getId(); ?>">
                          <?php echo $arregloFrecuencia[$i]->getId(); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label for="combobox9">Artículo</label>
                    <select class="form-control" id="combobox9" name="combobox9">
                      <?php for ($i = 0; $i < count($arregloArticulo); $i++) { ?>
                        <option value="<?php echo $arregloArticulo[$i]->getId(); ?>">
                          <?php echo $arregloArticulo[$i]->getId(); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label for="combobox10">Literal</label>
                    <select class="form-control" id="combobox10" name="combobox10">
                      <?php for ($i = 0; $i < count($arregloLiteral); $i++) { ?>
                        <option value="<?php echo $arregloLiteral[$i]->getId(); ?>">
                          <?php echo $arregloLiteral[$i]->getId(); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>

                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label for="combobox11">Numeral</label>
                    <select class="form-control" id="combobox11" name="combobox11">
                      <?php for ($i = 0; $i < count($arregloNumeral); $i++) { ?>
                        <option value="<?php echo $arregloNumeral[$i]->getId(); ?>">
                          <?php echo $arregloNumeral[$i]->getId(); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>

                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label for="combobox11">Parágrafo</label>
                    <select class="form-control" id="combobox12" name="combobox12">
                      <?php for ($i = 0; $i < count($arregloParagrafo); $i++) { ?>
                        <option value="<?php echo $arregloParagrafo[$i]->getId(); ?>">
                          <?php echo $arregloParagrafo[$i]->getId(); ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>

                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <input style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="submit" id="btnGuardar" name="bt" class="btn btn-primary" value="Guardar">
                    <input style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="submit" id="btnConsultar" name="bt" class="btn btn-secondary" value="Consultar">
                    <input style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="submit" id="btnModificar" name="bt" class="btn btn-secondary" value="Modificar">
                    <input style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="submit" id="btnBorrar" name="bt" class="btn btn-danger" value="Borrar">
                  </div>
                </div>

                <div class="tab-pane container fade" id="representacion">
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">

                    <label for="combobox1">Todas las representaciones</label>
                    <select class="form-control" id="combobox1" name="combobox1">
                      <?php for ($i = 0; $i < count($arregloRepresenVisual); $i++) { ?>
                        <option value="<?php echo $arregloRepresenVisual[$i]->getId() . " - " . $arregloRepresenVisual[$i]->getNombre(); ?>">
                          <?php echo $arregloRepresenVisual[$i]->getId() . " - " . $arregloRepresenVisual[$i]->getNombre(); ?>
                        </option>
                      <?php } ?>
                    </select>

                    <br>
                    <label for="listbox1">representaciones por indicador</label>
                    <select multiple class="form-control" id="listbox1" name="listbox1[]">
                    </select>

                  </div>

                  <div class="form-group float-right">
                    <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
                    <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox1')">Remover Item</button>
                  </div>


                </div>

                <div class="tab-pane container fade" id="responsable">
                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">

                    <label for="combobox2">Todos los actores</label>
                    <select class="form-control" id="combobox2" name="combobox2">
                      <?php for ($i = 0; $i < count($arregloActor); $i++) { ?>
                        <option value="<?php echo $arregloActor[$i]->getId() . " - " . $arregloActor[$i]->getNombre(); ?>">
                          <?php echo $arregloActor[$i]->getId() . " - " . $arregloActor[$i]->getNombre(); ?>
                        </option>
                      <?php } ?>
                    </select>

                    <br>
                    <label for="listbox2">Actores por indicador</label>
                    <select multiple class="form-control" id="listbox2" name="listbox2[]">
                    </select>

                  </div>

                  <div class="form-group float-right">
                    <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox2', 'listbox2')">Agregar Item</button>
                    <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox2')">Remover Item</button>
                  </div>


                </div>

                <div class="tab-pane container fade" id="fuente">


                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">

                    <label for="combobox3">Todas las fuentes</label>
                    <select class="form-control" id="combobox3" name="combobox3">
                      <?php for ($i = 0; $i < count($arregloFuente); $i++) { ?>
                        <option value="<?php echo $arregloFuente[$i]->getId() . " - " . $arregloFuente[$i]->getNombre(); ?>">
                          <?php echo $arregloFuente[$i]->getId() . " - " . $arregloFuente[$i]->getNombre(); ?>
                        </option>
                      <?php } ?>
                    </select>

                    <br>
                    <label for="listbox3">Fuentes por indicador</label>
                    <select multiple class="form-control" id="listbox3" name="listbox3[]">
                    <?php for($i=0; $i<count($arregloFuenteIndicadorConsulta); $i++){ ?>
									         <option value="<?php echo $arregloFuenteIndicadorConsulta[$i]->getId().";". $arregloFuenteIndicadorConsulta[$i]->getNombre(); ?>">
										      <?php echo $arregloFuenteIndicadorConsulta[$i]->getId().";". $arregloFuenteIndicadorConsulta[$i]->getNombre(); ?>
									         </option>
								            	<?php } ?>
                    </select>

                  </div>

                  <div class="form-group float-right">
                    <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox3', 'listbox3')">Agregar Item</button>
                    <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox3')">Remover Item</button>
                  </div>

                </div>


                <div class="tab-pane container fade" id="variable">

                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">
                    <label for="combobox4">Todas las variables</label>
                    <select class="form-control" id="combobox4" name="combobox4">

                      <?php for ($i = 0; $i < count($arregloVariable); $i++) { ?>
                        <option value="<?php echo $arregloVariable[$i]->getId() . " - " . $arregloVariable[$i]->getNombre(); ?>">
                          <?php echo $arregloVariable[$i]->getId() . " - " . $arregloVariable[$i]->getNombre(); ?>
                        </option>
                      <?php } ?>

                    </select>
                    <br>
                    <label for="listbox4">Variables por indicador</label>
                    <select multiple class="form-control" id="listbox4" name="listbox4[]">

                    </select>
                  </div>
                  <div class="form-group float-right">
                    <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox4', 'listbox4')">Agregar Item</button>
                    <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox4')">Remover Item</button>
                  </div>
                </div>

                <div class="tab-pane container fade" id="resultado">


                  <div style="font-family:'Open Sans',sans-serif;font-size: 14px;" class="form-group">

                    <label for="combobox5">Todos los resultados</label>
                    <select class="form-control" id="combobox5" name="combobox5">
                      <?php for ($i = 0; $i < count($arregloResultado); $i++) { ?>
                        <option value="<?php echo $arregloResultado[$i]->getId() . " - " . $arregloResultado[$i]->getResultado(); ?>">
                          <?php echo $arregloResultado[$i]->getId() . " - " . $arregloResultado[$i]->getResultado(); ?>
                        </option>
                      <?php } ?>
                    </select>

                    <br>
                    <label for="listbox5">Resultados por indicador</label>
                    <select multiple class="form-control" id="listbox5" name="listbox5[]">
                    </select>

                  </div>

                  <div class="form-group float-right">
                    <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnAgregarItem" name="bt" class="btn btn-secondary" onclick="agregarItem('combobox5', 'listbox5')">Agregar Item</button>
                    <button style="font-family:'Open Sans',sans-serif;font-size: 14px;" type="button" id="btnRemoverItem" name="bt" class="btn btn-secondary" onclick="removerItem('listbox5')">Remover Item</button>
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