<?php
    class Controlrepresenvisualporindicador{
        
	   var $objRepresenVisualPorIndicadorPorIndicador;

        function __construct($objRepresenVisualPorIndicador){
            $this->objRepresenVisualPorIndicador = $objRepresenVisualPorIndicador;
        }

        
        function guardar(){
            $fkindicador = $this->objRepresenVisualPorIndicador->getFkIndicador(); 
            $fkidrepresenvisual = $this->objRepresenVisualPorIndicador->getFkIdRepresenvisual();                
            $comandoSql = "INSERT INTO represenvisualporindicador(fkindicador,fkidrepresenvisual) VALUES ('$fkindicador', '$fkidrepresenvisual')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        


        function borrar(){
            $fkindicador= $this->objRepresenVisualPorIndicador->getFkIndicador(); 
            $comandoSql = "DELETE FROM represenvisualporindicador WHERE fkindicador = '$fkindicador'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

    }
?>