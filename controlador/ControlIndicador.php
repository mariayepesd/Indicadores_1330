<?php
    class ControlIndicador{
        
	   var $objIndicador;

        function __construct($objIndicador){

            $this->objIndicador = $objIndicador;
        }

        function guardar() {

            $id = $this->objIndicador->getId(); 
            $nom = $this->objIndicador->getNombre();
                
            $comandoSql = "INSERT INTO indicador(id,nombre) VALUES ('$id', '$nom')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar() {
            $comandoSql = "SELECT i.id, i.codigo, i.nombre, i.objetivo, i.alcance, i.formula, t.nombre AS tipoindicador, 
                u.descripcion AS unidadmedicion, i.meta, s.nombre AS sentido, i.fkidfrecuencia, a.nombre AS articulo, l.descripcion AS literal, 
                n.descripcion AS numeral, p.descripcion AS paragrafo 
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

                    $objIndicador->setIdIndicador($row['id']);
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