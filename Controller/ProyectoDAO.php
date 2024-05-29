<?php
declare(strict_types=1);
require_once '../db/conexion.php';
require_once '../Model/Proyecto.php';

function findAll_proyectos(){
    $db = conectar();
    $consulta = $db->prepare("SELECT * FROM proyectos");
    $consulta->execute();
    $resultado =$consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function insertar_proyecto(Proyecto $proyectos){
    $db = conectar();
    $consulta = $db->prepare("INSERT INTO proyectos (descripcion, fechainicio, fechaentrega, valor, lugar, responsable, estado) 
    VALUES (:descripcion, :fechainicio, :fechaentrega, :valor, :lugar, :responsable, :estado)");
    
    $consulta->bindParam(':descripcion', $proyectos->get_descripcion());
    $consulta->bindParam(':fechainicio', $proyectos->get_fecha_inicio());
    $consulta->bindParam(':fechaentrega', $proyectos->get_fecha_entrega());
    $consulta->bindParam(':valor', $proyectos->get_valor());
    $consulta->bindParam(':lugar', $proyectos->get_lugar());
    $consulta->bindParam(':responsable', $proyectos->get_responsable());
    $consulta->bindParam(':estado', $proyectos->get_estado());
    
    $consulta->execute();    
}

function actualizar_proyecto(Proyecto $proyectos){
    $db = conectar();
    $consulta = $db->prepare("UPDATE proyectos SET descripcion = :descripcion, fechainicio = :fechainicio, 
    fechaentrega = :fechaentrega, valor = :valor, lugar = :lugar, responsable = :responsable, estado = :estado
    WHERE idproyecto = :idProyecto;");

$consulta->bindParam(':descripcion', $proyectos->get_descripcion());
$consulta->bindParam(':fechainicio', $proyectos->get_fecha_inicio());
$consulta->bindParam(':fechaentrega', $proyectos->get_fecha_entrega());
$consulta->bindParam(':valor', $proyectos->get_valor());
$consulta->bindParam(':lugar', $proyectos->get_lugar());
$consulta->bindParam(':responsable', $proyectos->get_responsable());
$consulta->bindParam(':estado', $proyectos->get_estado());
$consulta->bindParam(':idProyecto', $proyectos->get_id_proyecto());
$consulta->execute();
}

function eliminar_proyecto(Proyecto $proyectos){
    $db = conectar();
    $sentencia = $db->prepare("DELETE FROM proyectos WHERE idproyecto = :idProyecto");
    $sentencia->bindParam(':idProyecto', $proyectos->get_id_proyecto());
    $sentencia->execute();
}

$proyecto1 = new Proyecto(1,"proyecto seminario", "0", "0", 500000, "monteria", "departamento de ingenieria", "inconcluso");

//insertar_proyecto($proyecto1);
//actualizar_proyecto($proyecto1);
eliminar_proyecto($proyecto1);
//var_dump(findAll_proyectos());
?>