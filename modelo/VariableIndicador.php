<?php
    class VariableIndicador {

        var $id;
        var $fkIdVariable;
        var $fkIdIndicador;
        var $dato;
        var $fkEmailUsuario;
        var $fechaDato;

        function __construct ($id, $fkIdVariable, $fkIdIndicador, $dato,
        $fkEmailUsuario, $fechaDato ) {

            $this->id = $id;
            $this->fkIdVariable = $fkIdVariable;
            $this->fkIdIndicador = $fkIdIndicador;
            $this->dato = $dato;
            $this->fkEmailUsuario = $fkEmailUsuario;
            $this->fechaDato = $fechaDato;

        }

        function setFkIdVariable($fkIdVariable) {
            
            $this->fkIdVariable = $fkIdVariable;

        }

        function getFkIdVariable() {

            return $this->fkIdVariable;
        }

        function setFkIdIndicador($fkIdIndicador) {

            $this->fkIdIndicador = $fkIdIndicador;
        }

        function getFkIdIndicador(){
            
            return $this->fkIdIndicador;
        }
    }
?>