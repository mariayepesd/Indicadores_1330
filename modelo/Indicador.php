<?php
    class Indicador{

        var $id_indicador;
        var $codigo;
        var $nombre;
        var $objetivo;
        var $alcance;
        var $formula;
        var $fktipoindicador;
        var $fkunidadmedicion;
        var $meta;
        var $fkidsentido;
        var $fkidfrecuencia;
        var $fkidarticulo;
        var $fkidliteral;
        var $fkidnumeral;
        var $fkidparagrafo;

        function __construct($id, $codigo, $nombre, $objetivo, $alcance, $formula, $meta, $fktipoindicador, $fkunidadmedicion,
                             $fkidsentido, /*$fkidfrecuencia*/ $fkidarticulo, $fkidliteral, $fkidnumeral, $fkidparagrafo) {
            $this->id_indicador = $id;
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->objetivo = $objetivo;
            $this->alcance = $alcance;
            $this->formula = $formula;
            $this->fktipoindicador = $fktipoindicador;
            $this->fkunidadmedicion = $fkunidadmedicion;
            $this->meta = $meta;
            $this->fkidsentido = $fkidsentido;
            //$this->fkidfrecuencia = $fkidfrecuencia;
            $this->fkidarticulo = $fkidarticulo; 
            $this->fkidliteral = $fkidliteral;
            $this->fkidnumeral = $fkidnumeral;
            $this->fkidparagrafo = $fkidparagrafo;
        }

     
    // Métodos "get" para obtener el valor de las propiedades
    
    public function getIdIndicador() {
        return $this->id_indicador;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getObjetivo() {
        return $this->objetivo;
    }

    public function getAlcance() {
        return $this->alcance;
    }

    public function getFormula() {
        return $this->formula;
    }

    public function getFkTipoIndicador() {
        return $this->fktipoindicador;
    }

    public function getFkUnidadMedicion() {
        return $this->fkunidadmedicion;
    }

    public function getMeta() {
        return $this->meta;
    }

    public function getFkIdSentido() {
        return $this->fkidsentido;
    }

    public function getFkIdFrecuencia() {
        return $this->fkidfrecuencia;
    }

    public function getFkIdArticulo() {
        return $this->fkidarticulo;
    }

    public function getFkIdLiteral() {
        return $this->fkidliteral;
    }

    public function getFkIdNumeral() {
        return $this->fkidnumeral;
    }

    public function getFkIdParagrafo() {
        return $this->fkidparagrafo;
    }

    // Métodos "set" para establecer el valor de las propiedades

    public function setIdIndicador($id) {
        $this->id_indicador = $id;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
    }

    public function setAlcance($alcance) {
        $this->alcance = $alcance;
    }

    public function setFormula($formula) {
        $this->formula = $formula;
    }

    public function setFkTipoIndicador($fktipoindicador) {
        $this->fktipoindicador = $fktipoindicador;
    }

    public function setFkUnidadMedicion($fkunidadmedicion) {
        $this->fkunidadmedicion = $fkunidadmedicion;
    }

    public function setMeta($meta) {
        $this->meta = $meta;
    }

    public function setFkIdSentido($fkidsentido) {
        $this->fkidsentido = $fkidsentido;
    }

    public function setFkIdFrecuencia($fkidfrecuencia) {
        $this->fkidfrecuencia = $fkidfrecuencia;
    }

    public function setFkIdArticulo($fkidarticulo) {
        $this->fkidarticulo = $fkidarticulo;
    }

    public function setFkIdLiteral($fkidliteral) {
        $this->fkidliteral = $fkidliteral;
    }

    public function setFkIdNumeral($fkidnumeral) {
        $this->fkidnumeral = $fkidnumeral;
    }

    public function setFkIdParagrafo($fkidparagrafo) {
        $this->fkidparagrafo = $fkidparagrafo;
    }
    
}
?>