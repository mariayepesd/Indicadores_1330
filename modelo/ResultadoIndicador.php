<?php
    class ResultadoIndicador {

            var $fkIdresultado;
            var $fkIdIndicador;
    
            function __construct($fkIdresultado, $fkIdIndicador) {
    
                $this->fkIdresultado = $fkIdresultado;
                $this->fkIdIndicador = $fkIdIndicador;
            }
    
            function setfkIdresultado($fkIdresultado) {
                
                $this->fkIdresultado = $fkIdresultado;
    
            }
    
            function getfkIdresultado() {
    
                return $this->fkIdresultado;
            }
    
            function setfkIdIndicador($fkIdIndicador) {
    
                $this->fkIdIndicador = $fkIdIndicador;
            }
    
            function getfkIdIndicador() {
                
                return $this->fkIdIndicador;
            }
        
    }
?>