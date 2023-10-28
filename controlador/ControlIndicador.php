<?php
    class ControlIndicador{
        
	   var $objIndicador;

        function __construct($objIndicador){

            $this->objIndicador = $objIndicador;
        }

        function guardar() {

            $id = $this->objIndicador->getId(); 
            $codigo = $this->objIndicador->getCodigo();
            $nombre = $this->objIndicador->getNombre();
            $objetivo = $this->objIndicador->getObjetivo();
            $alcance = $this->objIndicador->getAlcance();
            $formula = $this->objIndicador->getFormula();
            $fktipoindicador = $this->objIndicador->getFkTipoIndicador();
            $fkunidadmedicion = $this->objIndicador->getFkUnidadMedicion();
            $meta = $this->objIndicador->getMeta();
            $fkidsentido = $this->objIndicador->getFkIdSentido();
            $fkidfrecuencia = $this->objIndicador->getFkIdFrecuencia();
            $fkidarticulo = $this->objIndicador->getFkIdArticulo();
            $fkidliteral = $this->objIndicador->getFkIdLiteral();
            $fkidnumeral = $this->objIndicador->getFkIdNumeral();
            $fkidparagrafo = $this->objIndicador->getFkIdParagrafo();
                
            $comandoSql = "INSERT INTO indicador(id, codigo, nombre, objetivo, alcance, formula, fkidtipoindicador, fkidunidadmedicion, meta, fkidsentido, fkidfrecuencia, fkidarticulo, fkidliteral, fkidnumeral, fkidparagrafo) VALUES ('$id', '$codigo', '$nombre', '$objetivo',
            '$alcance', '$formula', '$fktipoindicador', '$fkunidadmedicion', '$meta', '$fkidsentido', '$fkidfrecuencia', '$fkidarticulo', '$fkidliteral', '$fkidnumeral', '$fkidparagrafo')";


            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);

            echo($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar() {
            $comandoSql = "SELECT i.id, i.codigo, i.nombre, i.objetivo, i.alcance, i.formula, t.id AS tipoindicador, 
                u.id AS unidadmedicion, i.meta, s.id AS sentido, i.fkidfrecuencia, a.id AS articulo, l.id AS literal, 
                n.id AS numeral, p.id AS paragrafo 
                FROM indicador i
                LEFT JOIN tipoindicador t ON i.fkidtipoindicador = t.id 
                INNER JOIN unidadmedicion u ON i.fkidunidadmedicion = u.id 
                INNER JOIN sentido s ON i.fkidsentido = s.id 
                INNER JOIN articulo a ON i.fkidarticulo = a.id 
                INNER JOIN literal l ON i.fkidliteral = l.id 
                INNER JOIN numeral n ON i.fkidnumeral = n.id 
                INNER JOIN paragrafo p ON i.fkidparagrafo = p.id;";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        
            if (mysqli_num_rows($recordSet) > 0) {

                $arregloIndicador = array();
                $i = 0;

                while($row = $recordSet->fetch_array(MYSQLI_BOTH)) {

                    $objIndicador = new Indicador("","","","","","","","","","","","","","","","");

                    $objIndicador->setId($row['id']);
                    $objIndicador->setCodigo($row['codigo']);
                    $objIndicador->setNombre($row['nombre']);
                    $objIndicador->setObjetivo($row['objetivo']);
                    $objIndicador->setAlcance($row['alcance']);
                    $objIndicador->setFormula($row['formula']);
                    $objIndicador->setFkTipoIndicador($row['tipoindicador']);
                    $objIndicador->setFkUnidadMedicion($row['unidadmedicion']);
                    $objIndicador->setMeta($row['meta']);
                    $objIndicador->setFkIdSentido($row['sentido']);
                    $objIndicador->setFkIdFrecuencia($row['fkidfrecuencia']);
                    $objIndicador->setFkIdArticulo($row['articulo']);
                    $objIndicador->setFkIdLiteral($row['literal']);
                    $objIndicador->setFkIdNumeral($row['numeral']);
                    $objIndicador->setFkIdParagrafo($row['paragrafo']);
                    $arregloIndicador[$i] = $objIndicador;
                    $i++;
                }
            }
        
        
            $objControlConexion->cerrarBd();
        
            return $arregloIndicador;
        }
    }