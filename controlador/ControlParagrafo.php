<?php
class ControlParagrafo {

    var $objParagrafo;

    function __construct($objParagrafo){
        
        $this->objParagrafo = $objParagrafo;
    }

    function guardar(){

        $desc = $this->objParagrafo->getDescripcion(); 
        $comando = "insert into paragrafo(descripcion) values('$desc')"; 
        $objControlConexion = new ControlConexion(); 
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); 
        $objControlConexion->ejecutarComandoSql($comando); 
        $objControlConexion->cerrarBd();
    }

    function listar(){

        $comandoSql = "SELECT * FROM paragrafo";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        if (mysqli_num_rows($recordSet) > 0) {

            $arregloParagrafo = array();
            $i = 0;

            while($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                
                $objParagrafo = new Paragrafo(0,"","");
                $objParagrafo->setId($row['id']);
                $objParagrafo->setDescripcion($row['descripcion']);
                $objParagrafo->setFkidArticulo($row['fkidarticulo']);

                $arregloParagrafo[$i] = $objParagrafo;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloParagrafo;
    }
}
?>