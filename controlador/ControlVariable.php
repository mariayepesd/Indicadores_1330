<?php
class ControlVariable{

    var $objVar;

    function __construct($objVar){
        $this->objVar = $objVar;
    }

    function guardar(){
        $id = $this->objVar->getId(); 
        $nombre = $this->objVar->getNombre();
        $fechaCreacion = $this->objVar->getFechaCreacion();
        $fkemailusuario = $this->objVar->getFkEmailUsuario();
            
        $comandoSql = "INSERT INTO variable(id,nombre,fechacreacion,fkemailusuario) VALUES ('$id', '$nombre', '$fechaCreacion', '$fkemailusuario')";
        $objControlConexion = new ControlConexion(); //Se instancia la clase controlConexion.
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
        $objControlConexion->ejecutarComandoSql($comandoSql); //Se invoca el método ejecutarComandoSql.
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
                
                $objVar = new Variable(0,"", "", "");
                $objVar->setId($row['id']);
                $objVar->setNombre($row['nombre']);
                $objVar->setFechaCreacion($row['fechacreacion']);
                $objVar->setFkEmailUsuario($row['fkemailusuario']);
                $arregloVariables[$i] = $objVar;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloVariables;
    }

    function consultar(){
        $id= $this->objVar->getId(); 
    
        $comandoSql = "SELECT * FROM variable WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $this->objVar->setNombre($row['nombre']);
            $this->objVar->setFechaCreacion($row['fechacreacion']);
            $this->objVar->setFkEmailUsuario($row['fkemailusuario']);
        }
        $objControlConexion->cerrarBd();
        return $this->objVar;
    }
    //TODO NO SE PUEDE EDITAR EL CORREO
    function modificar(){
        $id = $this->objVar->getId(); 
        $nombre = $this->objVar->getNombre();
        $fechacreacion = $this->objVar->getFechaCreacion();
        $fkemailusuario = $this->objVar->getFkEmailUsuario();
        $comandoSql = "UPDATE variable SET nombre='$nombre', fechacreacion='$fechacreacion', fkemailusuario='$fkemailusuario' WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar(){
        $id= $this->objVar->getId(); 
        $comandoSql = "DELETE FROM variable WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }
}
?>