<?php
class Administrador{
    public function __construct(
        private $idadministrador,
        private $nombreUsuario,
        private $passwd
    )
    {}

    public function get_id_administrador(){
        return $this->idadministrador;
    }
    public function set_id_administrador($idadministrador){
        $this->idadministrador = $idadministrador;
    }

    public function get_nombre_usuario(){
        return $this->nombreUsuario;
    }
    public function set_nombre_usuario($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
    }

    public function get_password(){
        return $this->passwd;
    }
    public function set_password($password){
        $this->passwd = $password;
    }
}
?>