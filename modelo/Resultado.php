<?php

class Resultado {

        var $id;
        var $resultado;

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

        public function setId($id) {
            $this->id = $id;
        }

        public function setResultado($resultado) {
            $this->resultado = $resultado;
        }
}