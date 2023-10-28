<?php
class ControlNumeral{

    var $objNumeral;

    function __construct($objNumeral){
        
        $this->objNumeral = $objNumeral;
    }

    function guardar(){

        $desc = $this->objNumeral->getDescripcion(); 
        $comandoSql = "INSERT TO numeral(descripcion) values('$desc')"; 
        $objControlConexion = new ControlConexion(); 
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); 
        $objControlConexion->ejecutarComandoSql($comandoSql); 
        $objControlConexion->cerrarBd();
    }

    function listar(){

        $comandoSql = "SELECT * FROM numeral";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        if (mysqli_num_rows($recordSet) > 0) {

            $arregloNumeral = array();
            $i = 0;

            while($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                
                $objNumeral = new Numeral(0,"","");
                $objNumeral->setId($row['id']);
                $objNumeral->setDescripcion($row['descripcion']);
                $objNumeral->setFkidLiteral($row['fkidliteral']);

                $arregloNumeral[$i] = $objNumeral;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloNumeral;
    }
}
?>