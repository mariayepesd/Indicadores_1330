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
            $comandoSql = "SELECT *, t.nombre, u.descripcion, s.nombre, a.nombre, l.descripcion, n.descripcion, p.descripcion FROM indicador i 
            INNER JOIN tipoindicador t ON i.fkidtipoindicador = t.id 
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

                    $objIndicador = new Indicador("","","","","","","",0,0,0,0,0,0,0);

                    $objIndicador->setIdIndicador($row['id']);
                    $objIndicador->setCodigo($row['codigo']);
                    $objIndicador->setNombre($row['nombre']);
                    $objIndicador->setObjetivo($row['objetivo']);
                    $objIndicador->setAlcance($row['alcance']);
                    $objIndicador->setFormula($row['formula']);
                    $objIndicador->setFkTipoIndicador($row['fkidtipoindicador']);
                    $objIndicador->setFkUnidadMedicion($row['fkidunidadmedicion']);
                    $objIndicador->setFkIdSentido($row['fkidsentido']);
                    $objIndicador->setFkIdArticulo($row['fkidarticulo']);
                    $objIndicador->setFkIdLiteral($row['fkidliteral']);
                    $objIndicador->setFkIdNumeral($row['fkidnumeral']);
                    $objIndicador->setFkIdParagrafo($row['fkidparagrafo']);
                    $arregloIndicador[$i] = $objIndicador;
                    $i++;
                }
            }
        
        
            $objControlConexion->cerrarBd();
        
            return $arregloIndicador;
        }
    }