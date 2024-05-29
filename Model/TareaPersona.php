<?php
class TareaPersona{
    public function __construct(
        private $idTarea,
        private $idPersona,
        private $duracion
    )
    {}

    public function get_id_tarea(){
        return $this->idTarea;
    }
    public function set_id_tarea($idTarea){
        $this->idTarea = $idTarea;
    }

    public function get_id_persona(){
        return $this->idPersona;
    }
    public function set_id_persona($idPersona){
        $this->idPersona = $idPersona;
    }

    public function get_duracion(){
        return $this->duracion;
    }
    public function set_duracion($duracion){
        $this->duracion = $duracion;
    }
}
?>