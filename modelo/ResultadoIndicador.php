<?php
    class ResultadoIndicador {

        var $id;
        var $resultado;
        var $fechacalculo;
        var $fkIndicador;

        function __construct($id, $resultado, $fechacalculo, $fkIndicador) {

            $this->id = $id;
            $this->resultado = $resultado;
            $this->fechacalculo = $fechacalculo;
            $this->fkIndicador = $fkIndicador;

        }
    }
?>