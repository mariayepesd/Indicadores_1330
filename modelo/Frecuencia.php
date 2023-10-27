<?php

class Frecuencia {

    var $id;
    var $valor;

    public function __construct($id, $valor) {

        $this->id = $id;
        $this->valor = $valor;
    }

    public function getId() {
        return $this->id;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

}
?>