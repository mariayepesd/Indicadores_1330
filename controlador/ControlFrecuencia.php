<?php
    class ControlFrecuencia{
        
	   var $objFrecuencia;

        function __construct($objFrecuencia) {

            $this->objFrecuencia = $objFrecuencia;
        }

        
        function listar() {

            $comandoSql = "SELECT * FROM frecuencia";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloFrecuencia = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){

                    $objFrecuencia = new Frecuencia("","");
                    $objFrecuencia->setId($row['id']);
                    $objFrecuencia->setValor($row['valor']);
                    $arregloFrecuencia[$i] = $objFrecuencia;
                    $i++;
                }
            }

            $objControlConexion->cerrarBd();
            return $arregloFrecuencia;
        }

        function guardar() {

            $id = $this->objFrecuencia->getId(); 
            $val = $this->objFrecuencia->getValor();
                
            $comandoSql = "INSERT INTO frecuencia(id,valor) VALUES ('$id', '$val')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar() {

            $id= $this->objFrecuencia->getId(); 
        
            $comandoSql = "SELECT * FROM frecuencia WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){

                $this->objFrecuencia->setValor($row['valor']);

            }

            $objControlConexion->cerrarBd();
            return $this->objFrecuencia;
        }

        function modificar() {

            $id = $this->objFrecuencia->getId(); 
            $val = $this->objFrecuencia->getValor();
            
            $comandoSql = "UPDATE frecuencia SET valor = '$val' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar() {

            $val= $this->objFrecuencia->getValor(); 

            $comandoSql = "DELETE FROM frecuencia WHERE valor = '$val'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

    }
?>