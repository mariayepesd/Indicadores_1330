<?php
    class ControlResultadoIndicador{

        var $objResultadoIndicador;

        function __construct($objResultadoIndicador){
            $this->objResultadoIndicador = $objResultadoIndicador;
        }

        function guardar(){
            $fkIdresultado = $this->objResultadoIndicador->getfkIdresultado(); 
            $fkIdIndicador = $this->objResultadoIndicador->getfkIdIndicador();
            $comando = "insert into resultadoporindicador(fkIdresultado,fkIdIndicador) values('$fkIdresultado',$fkIdIndicador)"; 
            $objControlConexion = new ControlConexion(); 
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
            $objControlConexion->ejecutarComandoSql($comando); 
            $objControlConexion->cerrarBd();
        }


        function listarResultadoIndicador($id){
            $comandoSql = "SELECT resultadoindicador.id,indicador.nombre 
            FROM resultadoindicador INNER JOIN indicador ON resultadoindicador.fkidindicador = indicador.id
            WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloResultado = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objResultadoIndicador = new Rol(0,"");
                    $objResultadoIndicador->setId($row['id']);
                    $objResultadoIndicador->setNombre($row['resultado']);
                    $objResultadoIndicador[$i] = $objResultadoIndicador;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloResultado;
        }

        function borrar(){
            $fkIdresultado= $this->objResultadoIndicador->getfkIdresultado(); 
            $fkIdIndicador = $this->objResultadoIndicador->getfkIdIndicador();
            $comandoSql = "DELETE FROM resultadoindicador WHERE fkIdresultado = '$fkIdresultado' AND fkIdIndicador = '$fkIdIndicador'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }






    }
?>