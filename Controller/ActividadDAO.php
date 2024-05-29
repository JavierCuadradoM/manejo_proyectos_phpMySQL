<?php
declare(strict_types=1);
require_once '../db/conexion.php';
require_once '../Model/Actividad.php';

function findAll_actividades(){
    $db = conectar();
    $consulta = $db->prepare("SELECT * FROM actividades");
    $consulta->execute();
    $resultado =$consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function insertar_actividad(Actividad $actividad){
    $db = conectar();
    $consulta = $db->prepare("INSERT INTO actividades (descripcion, fechainicio, fechafin, fk_idproyecto, responsable, estado, presupuesto) 
    VALUES (:descripcion, :fechainicio, :fechafin, :fk_idproyecto, :responsable, :estado, :presupuesto)");
    
    $consulta->bindParam(':descripcion', $actividad->get_descripcion());
    $consulta->bindParam(':fechainicio', $actividad->get_fecha_inicio());
    $consulta->bindParam(':fechafin', $actividad->get_fecha_fin());
    $consulta->bindParam(':fk_idproyecto', $actividad->get_id_proyecto());
    $consulta->bindParam(':responsable', $actividad->get_responsable());
    $consulta->bindParam(':presupuesto', $actividad->get_presupuesto());
    $consulta->bindParam(':estado', $actividad->get_estado());
    
    $consulta->execute();    
}

function actualizar_actividad(Actividad $actividad){
    $db = conectar();
    $consulta = $db->prepare("UPDATE actividades SET descripcion = :descripcion, fechainicio = :fechainicio, fechafin = :fechafin,
    fk_idproyecto = :fk_idproyecto, responsable = :responsable, estado = :estado, presupuesto = :presupuesto
    WHERE idactividad = :idActividad;");

$consulta->bindParam(':descripcion', $actividad->get_descripcion());
$consulta->bindParam(':fechainicio', $actividad->get_fecha_inicio());
$consulta->bindParam(':fechafin', $actividad->get_fecha_fin());
$consulta->bindParam(':fk_idproyecto', $actividad->get_id_proyecto());
$consulta->bindParam(':responsable', $actividad->get_responsable());
$consulta->bindParam(':estado', $actividad->get_estado());
$consulta->bindParam(':presupuesto', $actividad->get_presupuesto());
$consulta->bindParam(':idActividad', $actividad->get_id_actividad());
$consulta->execute();
}

function eliminar_actividad(Actividad $actividad){
    $db = conectar();
    $sentencia = $db->prepare("DELETE FROM actividades WHERE idactividad = :idActividad");
    $sentencia->bindParam(':idActividad', $actividad->get_id_actividad());
    $sentencia->execute();
}

//$proyecto1 = new Proyecto(1,"proyecto seminario", "0", "0", 500000, "monteria", "departamento de ingenieria", "inconcluso");

//insertar_proyecto($proyecto1);
//actualizar_proyecto($proyecto1);
//eliminar_proyecto($proyecto1);
//var_dump(findAll_actividades());
?>