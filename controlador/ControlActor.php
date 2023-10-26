<?php
    class ControlActor{
        
	   var $objActor;

        function __construct($objActor){
            $this->objActor = $objActor;
        }

        
        function listar(){
            $comandoSql = "SELECT * FROM actor";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloActor = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objActor = new fuente("","");
                    $objActor->setId($row['id']);
                    $objActor->setNombre($row['nombre']);
                    $arregloActor[$i] = $objActor;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloActor;
        }

        function guardar(){
            $id = $this->objActor->getId(); 
            $nombre = $this->objActor->getNombre();
            $fkidtipoactor = $this->objActor->getFkidtipoactor();
                
            $comandoSql = "INSERT INTO actor(id,nombre,fkidtipoactor) VALUES ('$id', '$nombre,', '$fkidtipoactor')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objActor->getId(); 
        
            $comandoSql = "SELECT * FROM actor WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objActor->setNombre($row['nombre']);
            }
            $objControlConexion->cerrarBd();
            return $this->objActor;
        }

        function modificar(){
            $id = $this->objActor->getId(); 
            $nom = $this->objActor->getNombre();
            $fkidtipoactor = $this->objActor->getFkidtipoactor();
            
            $comandoSql = "UPDATE actor SET nombre='$nom' WHERE id = '$id', fkidtipoactor= '$fkidtipoactor' ";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $nom= $this->objActor->getNombre(); 
            $comandoSql = "DELETE FROM fuente WHERE nombre = '$nom'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

    }
?>