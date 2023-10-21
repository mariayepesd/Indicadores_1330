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

        public function getId() {
            return $this->id;
        }
    
        public function getResultado() {
            return $this->resultado;
        }
    
        public function getFechacalculo() {
            return $this->fechacalculo;
        }
    
        public function getFkIndicador() {
            return $this->fkIndicador;
        }
    
        public function setId($id) {
            $this->id = $id;
        }
    
        public function setResultado($resultado) {
            $this->resultado = $resultado;
        }
    
        public function setFechacalculo($fechacalculo) {
            $this->fechacalculo = $fechacalculo;
        }
    
        public function setFkIndicador($fkIndicador) {
            $this->fkIndicador = $fkIndicador;
        }
    }
?>