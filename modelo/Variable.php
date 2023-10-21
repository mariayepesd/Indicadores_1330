<?php

class Variable {

        var $id;
        var $nombre;
        var $fechaCreacion;
        var $fkEmailUsuario;

        public function __construct($id, $nombre,$fechaCreacion,$fkEmailUsuario) {
            
            $this->id = $id;
            $this->nombre = $nombre;
            $this->fechaCreacion = $fechaCreacion;
            $this->fkEmailUsuario = $fkEmailUsuario;
        }


        public function getId() {
            return $this->id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getFechaCreacion() {
            return $this->fechaCreacion;
        }

        public function getFkEmailUsuario() {
            return $this->fkEmailUsuario;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setFechaCreacion($fechaCreacion) {
            $this->fechaCreacion = $fechaCreacion;
        }

        public function setFkEmailUsuario($fkEmailUsuario) {
            $this->fkEmailUsuario = $fkEmailUsuario;
        }
}