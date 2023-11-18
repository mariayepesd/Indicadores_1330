<?php
    class ControlResponsablesPorIndicador{
        
	   var $objResponsablesPorIndicador;

        function __construct($objResponsablesPorIndicador){
            $this->objResponsablesPorIndicador = $objResponsablesPorIndicador;
        }

        
        function guardar(){
            $fkidresponsable = $this->objResponsablesPorIndicador->getFkIdResponsble();
            $fkindicador = $this->objResponsablesPorIndicador->getFkIndicador(); 
            $fechaasignacion = $this->objResponsablesPorIndicador->getFechaAsignacion(); 
            $comandoSql = "INSERT INTO represenvisualporindicador(fkidresponsable,fkindicador,fechaasignacion) VALUES ('$fkidresponsable', '$fkindicador',$fechaasignacion)";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }


        function listarResponsablesPorIndicador($fkidresponsable){
            $comandoSql = "SELECT responsablesporindicador.fkidresponsable,actor.nombre 
            FROM responsablesporindicador INNER JOIN actor ON responsablesporindicador.fkidresponsable = actor.id
            WHERE fkidresponsable = '$fkidresponsable'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloActores = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objResponsablesPorIndicador = new actor(0,"","");
                    $objResponsablesPorIndicador->setId($row['id']);
                    $objResponsablesPorIndicador->setNombre($row['nombre']);                    
                    $arregloActores[$i] = $objResponsablesPorIndicador;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloActores;
        }
        


        function borrar(){
            $fkidresponsable= $this->objResponsablesPorIndicador->getFkIdResponsble(); 
            $fkindicador= $this->objResponsablesPorIndicador->getFkIndicador(); 
            $comandoSql = "DELETE FROM represenvisualporindicador WHERE fkidresponsable = '$fkidresponsable' AND fkindicador = '$fkindicador'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

    }
?>