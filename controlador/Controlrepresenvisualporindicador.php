<?php
    class Controlrepresenvisualporindicador{
        
	   var $objRepresenVisualPorIndicador;

        function __construct($objRepresenVisualPorIndicador){
            $this->objRepresenVisualPorIndicador = $objRepresenVisualPorIndicador;
        }

        
        function guardar(){
            $fkindicador = $this->objRepresenVisualPorIndicador->getFkIndicador(); 
            $fkidrepresenvisual = $this->objRepresenVisualPorIndicador->getFkIdRepresenvisual();                
            $comandoSql = "INSERT INTO represenvisualporindicador(fkidindicador,fkidrepresenvisual) VALUES ('$fkindicador', '$fkidrepresenvisual')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function listarRepresenVisualPorIndicador($fkidindicador){
            $arregloRepresen = array();
            $comandoSql = "SELECT represenvisualporindicador.fkidindicador,indicador.nombre 
            FROM represenvisualporindicador INNER JOIN indicador ON represenvisualporindicador.fkidindicador = indicador.id
            WHERE fkidindicador = '$fkidindicador'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloRepresen = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objRepresenVisualPorIndicador = new actor(0,"","");
                    $objRepresenVisualPorIndicador->setId($row['id']);
                    $objRepresenVisualPorIndicador->setNombre($row['nombre']);                    
                    $arregloRepresen[$i] = $objRepresenVisualPorIndicador;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloRepresen;
        }

        function borrar(){
            $fkindicador= $this->objRepresenVisualPorIndicador->getFkIndicador(); 
            $fkidrepresenvisual = $this->objRepresenVisualPorIndicador->getFkIdRepresenvisual();
            $comandoSql = "DELETE FROM represenvisualporindicador WHERE fkidindicador = '$fkindicador' AND fkidrepresenvisual = '$fkidrepresenvisual'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

    }
?>