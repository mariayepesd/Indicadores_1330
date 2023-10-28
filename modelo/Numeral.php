<?php

class Numeral {

    var $id;
    var $descripcion;
    var $fkidliteral;

    public function __construct($id, $descripcion, $fkidliteral) {

        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->fkidliteral = $fkidliteral;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFkidLiteral() {
        return $this->fkidliteral;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFkidLiteral($fkidliteral) {
        $this->fkidliteral = $fkidliteral;
    }
}
?>