<?php
require_once 'TareaDAO.php';
require_once '../Model/Tarea.php';

switch($_POST['accion']){
    case 'insertar':
        $id = 0;
        $descripcion= $_POST['descripcion'];
        $fechainicio= $_POST['fechainicio'];
        $fechafin= $_POST['fechafin'];
        $fk_idactividad= $_POST['idactividad'];
        $estado= $_POST['estado'];
        $presupuesto= $_POST['presupuesto'];
        $tarea = new Tarea($id, $descripcion, $fechainicio, $fechafin,$fk_idactividad, $estado, $presupuesto);
        insertar_tarea($tarea);
        header("Location: ../View/tareaview.php");
        
        break;

    case 'actualizar':
        $id = $_POST['idtarea'];
        $descripcion= $_POST['descripcion'];
        $fechainicio= $_POST['fechainicio'];
        $fechafin= $_POST['fechafin'];
        $fk_idactividad= $_POST['idactividad'];
        $estado= $_POST['estado'];
        $presupuesto= $_POST['presupuesto'];
        $tarea = new Tarea($id, $descripcion, $fechainicio, $fechafin,$fk_idactividad, $estado, $presupuesto);
        actualizar_tarea($tarea);
        header("Location: ../View/tareaview.php");
        
        break;

    case 'eliminar':
        $id = $_POST['idtarea'];
        $tarea = new Tarea($id, '', '', '', '', '', '', '');
        eliminar_tarea($tarea);
        header("Location: ../View/tareaview.php");
        break;
}
?>