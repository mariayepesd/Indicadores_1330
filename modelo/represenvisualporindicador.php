<?php
    class represenvisualporindicador{
        var $fkindicador;
        var $fkidrepresenvisual;

        function __construct($fkindicador, $fkidrepresenvisual){
            $this->fkindicador = $fkindicador;
            $this->fkidrepresenvisual = $fkidrepresenvisual;
        }

        function setFkIndicador($fkindicador){
            $this->fkindicador = $fkindicador;
        }

        function getFkIndicador(){
            return $this->fkindicador;
        }

        function setfkIdRepresenvisual($fkidrepresenvisual){
            $this->fkidrepresenvisual = $fkidrepresenvisual;
        }

        function getFkIdRepresenvisual(){
            return $this->fkidrepresenvisual;
        }
    }
?>