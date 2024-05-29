<?php
declare(strict_types=1);
require_once '../db/conexion.php';
require_once '../Model/Tarea.php';

function findAll_tareas(){
    $db = conectar();
    $consulta = $db->prepare("SELECT * FROM tareas");
    $consulta->execute();
    $resultado =$consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function insertar_tarea(Tarea $tarea){
    $db = conectar();
    $consulta = $db->prepare("INSERT INTO tareas (descripcion, fechainicio, fechafin, fk_idactividad, estado, presupuesto) 
    VALUES (:descripcion, :fechainicio, :fechafin, :fk_idactividad, :estado, :presupuesto)");
    try {
        $consulta->bindParam(':descripcion', $tarea->get_descripcion());
        $consulta->bindParam(':fechainicio', $tarea->get_fecha_inicio());
        $consulta->bindParam(':fechafin', $tarea->get_fecha_fin());
        $consulta->bindParam(':fk_idactividad', $tarea->get_id_actividad());
        $consulta->bindParam(':estado', $tarea->get_estado());
        $consulta->bindParam(':presupuesto', $tarea->get_presupuesto());
    
        $consulta->execute();
        return true;
    } catch (Exception $e) {
        echo $e;
        return false;
    }
        
}

function actualizar_tarea(Tarea $tarea){
    $db = conectar();
    $consulta = $db->prepare("UPDATE tareas SET descripcion = :descripcion, fechainicio = :fechainicio, fechafin = :fechafin,
    fk_idactividad = :fk_idactividad, estado = :estado, presupuesto = :presupuesto
    WHERE idtarea = :idtarea;");
    try {
        $consulta->bindParam(':descripcion', $tarea->get_descripcion());
        $consulta->bindParam(':fechainicio', $tarea->get_fecha_inicio());
        $consulta->bindParam(':fechafin', $tarea->get_fecha_fin());
        $consulta->bindParam(':fk_idactividad', $tarea->get_id_actividad());
        $consulta->bindParam(':estado', $tarea->get_estado());
        $consulta->bindParam(':presupuesto', $tarea->get_presupuesto());
        $consulta->bindParam(':idtarea', $tarea->get_id_tarea());
        $consulta->execute();
        return true;
    } catch (Exception $e) {
        echo $e;
        return false;
    }

}

function eliminar_tarea(Tarea $tarea){
    $db = conectar();
    $sentencia = $db->prepare("DELETE FROM tareas WHERE idtarea = :idtarea");
    try {
        $sentencia->bindParam(':idtarea', $tarea->get_id_tarea());
        $sentencia->execute();
        return true;
    } catch (Exception $e) {
        echo $e;
        return false;
    }
    
}

//$tarea1 = new Tarea(6, 'Tarea 6', '2024-12-12', '2025-12-12', 1, 'En progreso', 5000000);

//insertar_tarea($tarea1);
//actualizar_tarea($tarea1);
//eliminar_tarea($proyecto1);
//var_dump(findAll_tareas());
?>