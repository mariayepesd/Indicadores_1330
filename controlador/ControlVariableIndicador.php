<?php
    class ControlVariableIndicador{

        var $objVariableIndicador;

        function __construct($objVariableIndicador){

            $this->objVariableIndicador = $objVariableIndicador;
        }

        function guardar() {

            $fkIdVariable = $this->objVariableIndicador->getFkIdVariable(); 
            $fkIdIndicador = $this->objVariableIndicador->getFkIdIndicador();
            $comando = "insert into variablesporindicador(fkEmail,fkIdRol) values('$fkIdVariable',$fkIdIndicador)"; 
            $objControlConexion = new ControlConexion(); 
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
            $objControlConexion->ejecutarComandoSql($comando); 
            $objControlConexion->cerrarBd();

        }



        function listarVariableIndicador($id){
            $comandoSql = "SELECT variablesporindicador.id,indicador.nombre 
            FROM variablesporindicador INNER JOIN indicador ON variablesporindicador.fkidindicador = indicador.id
            WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloResultado = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objResultadoIndicador = new Variable(0,"",);
                    $objResultadoIndicador->setId($row['id']);
                    $objResultadoIndicador->setNombre($row['nombre']);
                    $objResultadoIndicador->setFechaCreacion($row['fechaCreacion']);
                    $objResultadoIndicador->setFkEmailUsuario($row['fkEmailUsuario']);
                    $objResultadoIndicador[$i] = $objResultadoIndicador;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloResultado;
        }

        function borrar(){
            $fkIdVariable = $this->objVariableIndicador->getFkIdVariable(); 
            $fkIdIndicador = $this->objVariableIndicador->getFkIdIndicador();
            $comandoSql = "DELETE FROM variablesporindicador WHERE fkIdVariable = '$fkIdVariable' AND fkIdIndicador = '$fkIdIndicador'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

    }
?>