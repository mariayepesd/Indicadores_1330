<?php

class Resultado {

        private $id;
        private $resultado;
        private $fechacalculo;
        private $fkindicador;

        public function __construct($id, $resultado) {
            $this->id = $id;
            $this->resultado = $resultado;
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
            return $this->fkindicador;
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

        public function setFkIndicador($fkindicador) {
            $this->fkindicador = $fkindicador;
        }
}