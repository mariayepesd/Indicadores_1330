<?php
class ControlVariable{

    var $objVar;

    function __construct($objVar){
        $this->objVar = $objVar;
    }

    function guardar(){

        $nom = $this->objVar->getNombre(); //Asigna a la variable nom el nombre que está dentro del objeto.
        $comando = "insert into variable(nombre) values('$nom')"; //Cadena de caracteres donde se construye el comando Sql.
        $objControlConexion = new ControlConexion(); //Se instancia la clase controlConexion.
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
        $objControlConexion->ejecutarComandoSql($comando); //Se invoca el método ejecutarComandoSql.
        $objControlConexion->cerrarBd();
    }

    function listar(){

        $comandoSql = "SELECT * FROM variable";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        if (mysqli_num_rows($recordSet) > 0) {
            $arregloVariables = array();
            $i = 0;
            while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                
                $objVar = new Variable(0,"");
                $objVar->setId($row['id']);
                $objVar->setNombre($row['nombre']);
                $arregloVariables[$i] = $objVar;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloVariables;
    }
}
?>