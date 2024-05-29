<?php
declare(strict_types=1);
require_once '../db/conexion.php';
require_once '../Model/TareaPersona.php';

function findAll_tarea_persona(){
    $db = conectar();
    $consulta = $db->prepare("SELECT * FROM tareapersona");
    $consulta->execute();
    $resultado =$consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function insertar_tarea_persona(TareaPersona $tareapersona){
    $db = conectar();
    $consulta = $db->prepare("INSERT INTO tareapersona (fk_idtarea, fk_idpersona, duracion) 
    VALUES (:fk_idtarea, :fk_idpersona, :duracion)");
    
    $consulta->bindParam(':fk_idtarea', $tareapersona->get_id_tarea());
    $consulta->bindParam(':fk_idpersona', $tareapersona->get_id_persona());
    $consulta->bindParam(':duracion', $tareapersona->get_duracion());

    
    $consulta->execute();    
}

function actualizar_tarea_persona(Recurso $recurso){
    $db = conectar();
    $consulta = $db->prepare("UPDATE tareapersona SET fk_idtarea = :fk_idtarea, fk_idpersona = :fk_idpersona, duracion = :duracion
    WHERE fk_idtarea = :idtarea AND fk_idpersona = :idpersona;");

$consulta->bindParam(':descripcion', $recurso->get_descripcion());
$consulta->bindParam(':valor', $recurso->get_valor());
$consulta->bindParam(':unidadmedida', $recurso->get_unidad_medida());
$consulta->bindParam(':idrecurso', $recurso->get_id_recurso());
$consulta->execute();
}

function eliminar_tarea_persona(Recurso $recurso){
    $db = conectar();
    $sentencia = $db->prepare("DELETE FROM recursos WHERE idrecurso = :idrecurso");
    $sentencia->bindParam(':idrecurso', $recurso->get_id_recurso());
    $sentencia->execute();
}

//$recurso1 = new Recurso(6,'Recurso 6', 500000, "Tonelada metrica");

//insertar_recurso($recurso1);
//actualizar_recurso($recurso1);
//eliminar_recurso($proyecto1);
var_dump(findAll_tarea_persona());
?>