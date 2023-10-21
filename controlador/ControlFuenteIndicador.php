<?php
    class ControlFuenteIndicador {

        var $objFuenteIndicador;


        function __construct($objFuenteIndicador) {

            $this->objFuenteIndicador = $objFuenteIndicador;

        }

        function guardar () {

            $fkIdFuente = $this->objFuenteIndicador->getfkIdFuente(); 
            $fkIdIndicador = $this->objFuenteIndicador->getfkIdIndicador();
            $comando = "insert into fuentesporindicador(fkidfuente,fkidindicador) values($fkIdFuente,$fkIdIndicador)"; 

            $objControlConexion = new ControlConexion(); 
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
            $objControlConexion->ejecutarComandoSql($comando); 
            $objControlConexion->cerrarBd();

        }

        function listarFuentesPorIndicador($fkIdIndicador) {

            $comandoSql = "SELECT fuentesporindicador.fkidindicador, indicador.nombre 
            FROM fuentesporindicador INNER JOIN indicador ON fuentesporindicador.fkidindicador = indicador.id
            WHERE fkidindicador = '$fkIdIndicador'";

            $objControlConexion = new ControlConexion();

            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

            if (mysqli_num_rows($recordSet) > 0) {
                
                $arregloFuentes = array();
                $i = 0;

                while($row = $recordSet->fetch_array(MYSQLI_BOTH)) {

                    $objFuente = new Fuente (0 ,"");
                    $objFuente->setId($row['id']);
                    $objFuente->setNombre($row['nombre']);
                    $arregloFuentes[$i] = $objFuente;
                    $i++;

                }
            }
            $objControlConexion->cerrarBd();
            return $arregloFuentes;
        }
    }
?>