<?php
    class ControlVariableIndicador{

        var $objVariableIndicador;

        function __construct($objVariableIndicador){

            $this->objVariableIndicador = $objVariableIndicador;
        }

        function guardar() {

            $fkIdVariable = $this->objVariableIndicador->getFkIdVariable(); 
            $fkIdIndicador = $this->objVariableIndicador->getFkIdIndicador();
            $comando = "insert into variablesporindicador(fkEmail,fkIdRol) values('$fkIdVariable',$fkIdIndicador)"; 
            $objControlConexion = new ControlConexion(); 
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
            $objControlConexion->ejecutarComandoSql($comando); 
            $objControlConexion->cerrarBd();

        }

    }
?>