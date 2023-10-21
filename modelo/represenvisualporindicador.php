<?php
    class represenvisualporindicador{
        var $fkidindicador;
        var $fkidrepresenvisual;

        function __construct($fkidindicador, $fkidrepresenvisual){
            $this->fkidindicador = $fkidindicador;
            $this->fkidrepresenvisual = $fkidrepresenvisual;
        }

        function setFkIndicador($fkidindicador){
            $this->fkidindicador = $fkidindicador;
        }

        function getFkIndicador(){
            return $this->fkidindicador;
        }

        function setfkIdRepresenvisual($fkidrepresenvisual){
            $this->fkidrepresenvisual = $fkidrepresenvisual;
        }

        function getFkIdRepresenvisual(){
            return $this->fkidrepresenvisual;
        }
    }
?>