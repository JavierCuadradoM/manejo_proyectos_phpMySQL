<?php
class TareaRecurso{
    public function __construct(
        private $idTarea,
        private $idRecurso,
        private $cantidad
    )
    {}

    public function get_id_tarea(){
        return $this->idTarea;
    }
    public function set_id_tarea($idTarea){
        $this->idTarea = $idTarea;
    }

    public function get_id_recurso(){
        return $this->idRecurso;
    }
    public function set_id_recurso($idRecurso){
        $this->idRecurso = $idRecurso;
    }

    public function get_cantidad(){
        return $this->idTarea;
    }
    public function set_catidad($idTarea){
        $this->idTarea = $idTarea;
    }
}
?>