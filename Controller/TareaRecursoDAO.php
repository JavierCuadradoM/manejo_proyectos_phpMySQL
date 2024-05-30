<?php
declare(strict_types=1);
require_once '../db/conexion.php';
require_once '../Model/TareaRecurso.php';

function findAll_tarea_recursos(){
    $db = conectar();
    $consulta = $db->prepare("SELECT idasignacion, tareas.idtarea, tareas.descripcion, tareas.fk_idactividad,
    recursos.idrecurso, recursos.descripcion AS rdescripcion, recursos.valor, recursos.unidadmedida, cantidad
       FROM tarearecurso
       JOIN tareas ON tarearecurso.fk_idtarea = tareas.idtarea
       JOIN recursos ON tarearecurso.fk_idrecurso = recursos.idrecurso;");
    $consulta->execute();
    $resultado =$consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function insertar_tarea_recurso(TareaRecurso $tarearecurso){
    $db = conectar();
    $consulta = $db->prepare("INSERT INTO tarearecurso (fk_idtarea, fk_idrecurso, cantidad) 
    VALUES (:fk_idtarea, :fk_idrecurso, :cantidad)");
    try {
        $consulta->bindParam(':fk_idtarea', $tarearecurso->get_id_tarea());
        $consulta->bindParam(':fk_idrecurso', $tarearecurso->get_id_recurso());
        $consulta->bindParam(':cantidad', $tarearecurso->get_cantidad());
        $consulta->execute();
        return true;
    } catch (Exception $e) {
        echo $e;
        return false;
    }
        
}

function actualizar_tarea_recurso(TareaRecurso $tarearecurso){
    $db = conectar();
    $consulta = $db->prepare("UPDATE tarearecurso SET fk_idtarea = :fk_idtarea, fk_idrecurso = :fk_idrecurso, cantidad = :cantidad
    WHERE idasignacion = :idasignacion;");
    try {
        $consulta->bindParam(':fk_idtarea', $tarearecurso->get_id_tarea());
        $consulta->bindParam(':fk_idrecurso', $tarearecurso->get_id_recurso());
        $consulta->bindParam(':cantidad', $tarearecurso->get_cantidad());
        $consulta->bindParam(':idasignacion', $tarearecurso->get_id_asignacion());
        $consulta->execute();
        return true;
    } catch (Exception $e) {
        echo $e;
        return false;
    }

}

function eliminar_tarea_recurso(TareaRecurso $tarearecurso){
    $db = conectar();
    $sentencia = $db->prepare("DELETE FROM tarearecurso WHERE idasignacion = :idasignacion");
    try {
        $sentencia->bindParam(':idasignacion', $tarearecurso->get_id_asignacion());
        $sentencia->execute();
        return true;
    } catch (Exception $e) {
        echo $e;
        return false;
    }
    
}
//$tarearecurso = new TareaRecurso(1, 1,'Duracion');

//insertar_tarea_recurso($tareapersona);
//actualizar_tarea_recurso($tareapersona);
//eliminar_tarea_recurso($tareapersona);
//var_dump(findAll_tarea_recursos());
?>