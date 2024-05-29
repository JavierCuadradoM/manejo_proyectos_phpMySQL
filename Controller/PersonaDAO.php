<?php
require_once '../db/conexion.php';
include_once '../Model/Persona.php';

function findAll_personas(){
    $db = conectar();
    $consulta = $db->prepare("SELECT * FROM personas");
    $consulta->execute();
    $resultado =$consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function insertar_persona(Persona $persona){
    $db = conectar();

    $consulta = $db->prepare("INSERT INTO personas (nombre, apellido, direccion, telefono, sexo, fechanacimiento, profesion) 
    VALUES (:nombre, :apellido, :direccion, :telefono, :sexo, :fechanacimiento, :profesion)");
    
    $consulta->bindParam(':nombre', $persona->get_nombre());
    $consulta->bindParam(':apellido', $persona->get_apellido());
    $consulta->bindParam(':direccion', $persona->get_direccion());
    $consulta->bindParam(':telefono', $persona->get_telefono());
    $consulta->bindParam(':sexo', $persona->get_sexo());
    $consulta->bindParam(':fechanacimiento', $persona->get_fecha_nacomiento());
    $consulta->bindParam(':profesion', $persona->get_profesion());
    
    $consulta->execute();    
}

function actualizar_persona(Persona $persona){
    $db = conectar();
    $sentencia = $db->prepare("UPDATE personas SET nombre = :nombre, apellido = :apellido, 
    direccion = :direccion, telefono = :telefono, sexo = :sexo, fechanacimiento = :fechaNacimiento, profesion = :profesion
    WHERE idpersona = :idPersona;");

    $sentencia->bindParam(':nombre', $persona->get_nombre());
    $sentencia->bindParam(':apellido', $persona->get_apellido());
    $sentencia->bindParam(':direccion', $persona->get_direccion());
    $sentencia->bindParam(':telefono', $persona->get_telefono());
    $sentencia->bindParam(':sexo', $persona->get_sexo());
    $sentencia->bindParam(':fechaNacimiento', $persona->get_fecha_nacomiento());
    $sentencia->bindParam(':profesion', $persona->get_profesion());
    $sentencia->bindParam(':idPersona', $persona->get_id_persona());
    $sentencia->execute();
}

function eliminar_persona(Persona $persona){
    $db = conectar();
    $sentencia = $db->prepare("DELETE FROM personas WHERE idpersona = :idPersona");
    $sentencia->bindParam(':idPersona', $persona->get_id_persona());
    $sentencia->execute();
}

//$persona1 = new Persona(8,"javier", "cuadrado", "san antero", 3017447611, "m", "2001-11-04", "ingeniero");
//insertar_persona($persona1);
//actualizar_persona($persona1);
//eliminar_persona($persona1);
//var_dump(findAllPersonas());
?>