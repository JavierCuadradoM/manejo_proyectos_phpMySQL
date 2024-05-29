<?php
class Proyecto{
    public function __construct(
        private $idProyecto,
        private $descripcion,
        private $fechaInicio,
        private $fechaEntrega,
        private $valor,
        private $lugar,
        private $responsable,
        private $estado
    )
    {}
// bloque SETTERS
//    public function set_id_proyecto($idProyecto){
//        $this->idProyecto = $idProyecto;
//    }

    public function set_descripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function set_fecha_inicio($fechaInicio){
        $this->fechaInicio = $fechaInicio;
    }

    public function set_fecha_entrega($fechaEntrega){
        $this->fechaEntrega = $fechaEntrega;
    }
    public function set_valor($valor){
        $this->valor = $valor;
    }
    public function set_lugar($lugar){
        $this->lugar = $lugar;
    }
    public function set_responsable($responsable){
        $this->responsable = $responsable;
    }
    public function set_estado($estado){
        $this->estado = $estado;
    }

// Bloque GETTERS

    public function get_id_proyecto(){
        return $this->idProyecto;
    }

    public function get_descripcion(){
        return $this->descripcion;
    }

    public function get_fecha_inicio(){
        return $this->fechaInicio;
    }

    public function get_fecha_entrega(){
        return $this->fechaEntrega;
    }
    public function get_valor(){
        return $this->valor;
    }
    public function get_lugar(){
        return $this->lugar;
    }
    public function get_responsable(){
        return $this->responsable;
    }
    public function get_estado(){
        return $this->estado;
    }
}
?>