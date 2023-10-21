<?php
    class ControlResultadoIndicador{

        var $objResultadoIndicador;

        function __construct($objResultadoIndicador){
            $this->objResultadoIndicador = $objResultadoIndicador;
        }

        function guardar(){
            $fkIdresultado = $this->objResultadoIndicador->getfkIdresultado(); 
            $fkIdIndicador = $this->objResultadoIndicador->getfkIdIndicador();
            $comando = "insert into resultadoporindicador(fkIdresultado,fkIdIndicador) values('$fkIdresultado',$fkIdIndicador)"; 
            $objControlConexion = new ControlConexion(); 
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
            $objControlConexion->ejecutarComandoSql($comando); 
            $objControlConexion->cerrarBd();
        }

    }
?>