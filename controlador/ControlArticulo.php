<?php
class ControlArticulo {

    var $objArticulo;

    function __construct($objArticulo){
        
        $this->objArticulo = $objArticulo;
    }

    function guardar(){

        $nom = $this->objArticulo->getNombre(); 
        $comando = "insert into articulo(nombre) values('$nom')"; 
        $objControlConexion = new ControlConexion(); 
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); 
        $objControlConexion->ejecutarComandoSql($comando); 
        $objControlConexion->cerrarBd();
    }

    function listar(){
        $comandoSql = "SELECT * FROM articulo";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        if (mysqli_num_rows($recordSet) > 0) {

            $arregloArticulo = array();
            $i = 0;

            while($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                
                $objArticulo = new Articulo(0,"","",0,0);
                $objArticulo->setId($row['id']);
                $objArticulo->setNombre($row['nombre']);
                $objArticulo->setDescripcion($row['descripcion']);
                $objArticulo->setFkidSeccion($row['fkidseccion']);
                $objArticulo->setFkidSubseccion($row['fkidsubseccion']);

                $arregloArticulo[$i] = $objArticulo;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloArticulo;
    }
}
?>