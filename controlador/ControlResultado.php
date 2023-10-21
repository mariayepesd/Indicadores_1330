<?php
class ControlResultado{

    var $objResultado;

    function __construct($objResultado){

        $this->objResultado = $objResultado;
    }

    function guardar(){

        $nom = $this->objResultado->getNombre(); //Asigna a la variable nom el nombre que está dentro del objeto.
        $comando = "insert into resultadoindicador(nombre) values('$nom')"; //Cadena de caracteres donde se construye el comando Sql.
        $objControlConexion = new ControlConexion(); //Se instancia la clase controlConexion.
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
        $objControlConexion->ejecutarComandoSql($comando); //Se invoca el método ejecutarComandoSql.
        $objControlConexion->cerrarBd();
    }

    function listar(){

        $comandoSql = "SELECT * FROM resultadoindicador";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);

        if (mysqli_num_rows($recordSet) > 0) {
            $arregloResultados = array();
            $i = 0;
            while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                
                $objResultado = new Resultado(0,0);
                $objResultado->setId($row['id']);
                $objResultado->setResultado($row['resultado']);
                $arregloResultados[$i] = $objResultado;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloResultados;
    }
}
?>