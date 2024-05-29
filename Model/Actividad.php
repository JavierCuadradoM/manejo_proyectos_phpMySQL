<?php
class Actividad{
    public function __construct(
        private $idActividad,
        private $descripcion,
        private $fechaInicio,
        private $fechaFin,
        private $idProyecto,
        private $responsable,
        private $estado,
        private $presupuesto
    )
    {}

    public function get_id_actividad(){
        return $this->idActividad;
    }

//    public function set_id_actividad($idActividad){
//        $this->idActividad = $idActividad;
//    }

    public function get_descripcion(){
        return $this->descripcion;
    }

    public function set_descripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function get_fecha_inicio(){
        return $this->fechaInicio;
    }

    public function set_fecha_inicio($fechaInicio){
        $this->fechaInicio = $fechaInicio;
    }

    public function get_fecha_fin(){
        return $this->fechaFin;
    }

    public function set_fecha_fin($fechaFin){
        $this->fechaFin = $fechaFin;
    }

    public function get_id_proyecto(){
        return $this->idProyecto;
    }

    public function set_id_proyecto($idProyecto){
        $this->idProyecto = $idProyecto;
    }


    public function get_responsable(){
        return $this->responsable;
    }

    public function set_responsable($responsable){
        $this->responsable = $responsable;
    }


    public function get_estado(){
        return $this->estado;
    }

    public function set_estado($estado){
        $this->estado = $estado;
    }

    
    public function get_presupuesto(){
        return $this->presupuesto;
    }

    public function set_presupuesto($presupuesto){
        $this->presupuesto = $presupuesto;
    }




}
?>