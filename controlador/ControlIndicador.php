<?php
    class ControlIndicador{
        
	   var $objIndicador;

        function __construct($objIndicador){

            $this->objIndicador = $objIndicador;
        }

        function listarIndicador() {

            $comandoSql = "SELECT * FROM indicador";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        
            $arregloIndicador = array();
        
            if (mysqli_num_rows($recordSet) > 0) {

                while ($row = $recordSet->fetch_assoc()) {

                    $objIndicador = new Indicador(

                        $row['id'],
                        $row['nombre'],

                    );

                    $arregloIndicador[] = $objIndicador;
                }
            }
        
            $objControlConexion->cerrarBd();
            
            return $arregloIndicador;
        }
    }