<?php
class Persona{
    public function __construct(
        private $idPersona,
        private $nombre,
        private $apellido,
        private $direccion,
        private $telefono,
        private $sexo,
        private $fechaNacimiento,
        private $profesion,
    )
    {}

// Bloque GETTERS

    public function get_id_persona(){
        return $this->idPersona;
    }

    public function get_nombre(){
        return $this->nombre;
    }

    public function get_apellido(){
        return $this->apellido;
    }

    public function get_direccion(){
        return $this->direccion;
    }
    public function get_telefono(){
        return $this->telefono;
    }
    public function get_sexo(){
        return $this->sexo;
    }
    public function get_fecha_nacomiento(){
        return $this->fechaNacimiento;
    }
    public function get_profesion(){
        return $this->profesion;
    }


// bloque SETTERS
//    public function set_id_persona($idPersona){
//        $this->idPersona = $idPersona;
//    }

    public function set_nombre($nombre){
        $this->nombre = $nombre;
    }

    public function set_apellido($apellido){
        $this->apellido = $apellido;
    }

    public function set_direccion($direccion){
        $this->direccion = $direccion;
    }
    public function set_telefono($telefono){
        $this->telefono = $telefono;
    }
    public function set_sexo($sexo){
        $this->sexo = $sexo;
    }
    public function set_fecha_nacomiento($fechaNacimiento){
        $this->fechaNacimiento = $fechaNacimiento;
    }
    public function set_profesion($profesion){
        $this->profesion = $profesion;
    }

}
?>