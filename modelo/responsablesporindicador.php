<?php
    class responsablesporindicador{
        var $fkidresponsable;
        var $fkindicador;
        var $fechaasignacion;

        function __construct($fkidresponsable, $fkindicador, $fechaasignacion){
            $this->fkidresponsable = $fkidresponsable;
            $this->fkindicador = $fkindicador;
            $this->fechaasignacion = $fechaasignacion;
        }

        function setFkIdResponsble($fkidresponsable){
            $this->fkidresponsable = $fkidresponsable;
        }

        function getFkIdResponsble(){
            return $this->fkidresponsable;
        }

        function setFkIndicador($fkindicador){
            $this->fkindicador = $fkindicador;
        }

        function getFkIndicador(){
            return $this->fkindicador;
        }

        function setFechaAsignacion($fechaasignacion){
            $this->fechaasignacion = $fechaasignacion;
        }

        function getFechaAsignacion(){
            return $this->fechaasignacion;
        }
    }
?>