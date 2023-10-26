<?php

class Paragrafo {

    var $id;
    var $descripcion;
    var $fkidarticulo;

    public function __construct($id, $descripcion, $fkidarticulo) {

        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->fkidarticulo = $fkidarticulo;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFkidArticulo() {
        return $this->fkidarticulo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFkidArticulo($fkidarticulo) {
        $this->fkidarticulo = $fkidarticulo;
    }
}
?>