<?php
class Recurso{
    public function __construct(
        private $idRecurso,
        private $descripcion,
        private $valor,
        private $unidadMedida
    )
    {}

    public function get_id_recurso(){
        return $this->idRecurso;
    }
    public function set_id_recurso($idRecurso){
        $this->idRecurso = $idRecurso;
    }

    public function get_descripcion(){
        return $this->descripcion;
    }
    public function set_descripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function get_valor(){
        return $this->valor;
    }
    public function set_valor($valor){
        $this->valor = $valor;
    }

    public function get_unidad_medida(){
        return $this->unidadMedida;
    }
    public function set_unidad_medida($unidadMedida){
        $this->unidadMedida = $unidadMedida;
    }
}
?>