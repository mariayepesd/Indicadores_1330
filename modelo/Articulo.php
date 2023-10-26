<?php
class Articulo {

    var $id;
    var $nombre;
    var $descripcion;
    var $fkidseccion;
    var $fkidsubseccion;

    public function __construct($id, $nombre, $descripcion, $fkidseccion, $fkidsubseccion) {
        
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fkidseccion = $fkidseccion;
        $this->fkidsubseccion = $fkidsubseccion;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFkidSeccion() {
        return $this->fkidseccion;
    }

    public function getFkidSubseccion() {
        return $this->fkidsubseccion;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFkidSeccion($fkidseccion) {
        $this->fkidseccion = $fkidseccion;
    }

    public function setFkidSubseccion($fkidsubseccion) {
        $this->fkidsubseccion = $fkidsubseccion;
    }
}
?>