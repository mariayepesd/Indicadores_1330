<?php
    class ControlResponsablesPorIndicador{
        
	   var $objResponsablesPorIndicador;

        function __construct($objResponsablesPorIndicador){
            $this->objResponsablesPorIndicador = $objResponsablesPorIndicador;
        }

        
        function guardar(){
            $fkidresponsable = $this->objResponsablesPorIndicador->getFkIdResponsble();
            $fkindicador = $this->objResponsablesPorIndicador->getFkIndicador(); 
            $fechaasignacion = $this->objResponsablesPorIndicador->getFechaAsignacion(); 
            $comandoSql = "INSERT INTO represenvisualporindicador(fkidresponsable,fkindicador,fechaasignacion) VALUES ('$fkidresponsable', '$fkindicador',$fechaasignacion)";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        


        function borrar(){
            $fkindicador= $this->objResponsablesPorIndicador->getFkIdResponsble(); 
            $comandoSql = "DELETE FROM represenvisualporindicador WHERE fkidresponsable = '$fkidresponsable'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

    }
?>