<?php
class ControlResultado{

    var $objResultado;

    function __construct($objResultado){

        $this->objResultado = $objResultado;
    }

    function guardar(){
        $id = $this->objFuente->getId(); 
        $nom = $this->objFuente->getResultado();
            
        $comandoSql = "INSERT INTO resultado(id,resultado) VALUES ('$id', '$resultado')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar(){
        $comandoSql = "SELECT * FROM resultado";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if (mysqli_num_rows($recordSet) > 0) {
            $arregloResultado = array();
            $i = 0;
            while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $objResultado = new Resultado(0,0);
                $objResultado->setId($row['id']);
                $objResultado->setResultado($row['resultado']);
                $arregloResultado[$i] = $objResultado;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloResultado;
    }

    function consultar() {

        $id= $this->objResultado->getId(); 
    
        $comandoSql = "SELECT * FROM resultado WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {

            $this->objResultado->setResultado($row['resultado']);

        }

        $objControlConexion->cerrarBd();
        return $this->objResultado;
    }

    function modificar() {

        $id = $this->objResultado->getId(); 
        $res = $this->objResultado->getResultado();
        
        $comandoSql = "UPDATE resultado SET resultado = $resultado WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar() {

        $res= $this->objResultado->getResultado(); 

        $comandoSql = "DELETE FROM resultado WHERE resultado = $resultado";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }


}
?>