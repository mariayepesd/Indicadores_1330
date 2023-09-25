<?php
class ControlRol{
    var $objRol;

    function __construct($objRol){
        $this->objRol = $objRol;
    }

    function guardar(){
        $nom = $this->objRol->getNombre(); //Asigna a la variable nom el nombre que está dentro del objeto.
        $comando = "insert into rol(nombre) values('$nom')"; //Cadena de caracteres donde se construye el comando Sql.
        $objControlConexion = new ControlConexion(); //Se instancia la clase controlConexion.
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
        $objControlConexion->ejecutarComandoSql($comando); //Se invoca el método ejecutarComandoSql.
        $objControlConexion->cerrarBd();
    }
}
?>