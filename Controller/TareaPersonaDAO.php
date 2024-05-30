<?php
declare(strict_types=1);
require_once '../db/conexion.php';
require_once '../Model/TareaPersona.php';

function findAll_tarea_persona(){
    $db = conectar();
    $consulta = $db->prepare("SELECT idasignacion, tareas.idtarea, tareas.descripcion, tareas.fk_idactividad,
    personas.idpersona, personas.nombre, personas.apellido, personas.profesion, duracion
       FROM tareapersona
       JOIN tareas ON tareapersona.fk_idtarea = tareas.idtarea
       JOIN personas ON tareapersona.fk_idpersona = personas.idpersona");
    $consulta->execute();
    $resultado =$consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function insertar_tarea_persona(TareaPersona $tareapersona){
    $db = conectar();
    $consulta = $db->prepare("INSERT INTO tareapersona (fk_idtarea, fk_idpersona, duracion) 
    VALUES (:fk_idtarea, :fk_idpersona, :duracion)");
    try {
        $consulta->bindParam(':fk_idtarea', $tareapersona->get_id_tarea());
        $consulta->bindParam(':fk_idpersona', $tareapersona->get_id_persona());
        $consulta->bindParam(':duracion', $tareapersona->get_duracion());
        $consulta->execute();
        return true;
    } catch (Exception $e) {
        echo $e;
        return false;
    }
        
}

function actualizar_tarea_persona(TareaPersona $tareapersona){
    $db = conectar();
    $consulta = $db->prepare("UPDATE tareapersona SET fk_idtarea = :fk_idtarea, fk_idpersona = :fk_idpersona, duracion = :duracion
    WHERE idasignacion = :idasignacion;");
    try {
        $consulta->bindParam(':fk_idtarea', $tareapersona->get_id_tarea());
        $consulta->bindParam(':fk_idpersona', $tareapersona->get_id_persona());
        $consulta->bindParam(':duracion', $tareapersona->get_duracion());
        $consulta->bindParam(':idasignacion', $tareapersona->get_id_asignacion());
        $consulta->execute();
        return true;
    } catch (Exception $e) {
        echo $e;
        return false;
    }

}

function eliminar_tarea_persona(TareaPersona $tareaPersona){
    $db = conectar();
    $sentencia = $db->prepare("DELETE FROM tareapersona WHERE idasignacion = :idasignacion");
    try {
        $sentencia->bindParam(':idasignacion', $tareaPersona->get_id_asignacion());
        $sentencia->execute();
        return true;
    } catch (Exception $e) {
        echo $e;
        return false;
    }
    
}
//$tareapersona = new TareaPersona(1, 1,'Duracion');

//insertar_tarea_persona($tareapersona);
//actualizar_tarea_persona($tareapersona);
//eliminar_tarea_persona($tareapersona);
//var_dump(findAll_tarea_persona());
?>