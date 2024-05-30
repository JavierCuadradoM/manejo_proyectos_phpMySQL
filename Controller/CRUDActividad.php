<?php
require_once 'ActividadDAO.php';
require_once '../Model/Actividad.php';

switch($_POST['accion']){
    case 'insertar':
        $id = 0;
        $descripcion= $_POST['descripcion'];
        $fechainicio= $_POST['fechainicio'];
        $fechafin= $_POST['fechafin'];
        $fk_idproyecto= $_POST['idproyecto'];
        $responsable= $_POST['responsable'];
        $estado= $_POST['estado'];
        $presupuesto= $_POST['presupuesto'];
        $actividad = new Actividad($id, $descripcion, $fechainicio, $fechafin,$fk_idproyecto, $responsable, $estado, $presupuesto);
        insertar_actividad($actividad);
        echo "<script>alert('Exito al insertar'); window.location.href='../View/actividadview.php';</script>";
        //header("Location: ../View/actividadview.php");
        
        break;

    case 'actualizar':
        $id = $_POST['idactividad'];
        $descripcion= $_POST['descripcion'];
        $fechainicio= $_POST['fechainicio'];
        $fechafin= $_POST['fechafin'];
        $fk_idproyecto= $_POST['idproyecto'];
        $responsable= $_POST['responsable'];
        $estado= $_POST['estado'];
        $presupuesto= $_POST['presupuesto'];
        $actividad = new Actividad($id, $descripcion, $fechainicio, $fechafin,$fk_idproyecto, $responsable, $estado, $presupuesto);
        actualizar_actividad($actividad);
        echo "<script>alert('Exito al actualizar'); window.location.href='../View/actividadview.php';</script>";
        //header("Location: ../View/actividadview.php");
        
        break;

    case 'eliminar':
        $id = $_POST['idactividad'];
        $actividad = new Actividad($id, '', '', '', '', '', '', '', '');
        eliminar_actividad($actividad);
        echo "<script>alert('Exito al eliminar'); window.location.href='../View/actividadview.php';</script>";
        //header("Location: ../View/actividadview.php");
        break;
}
?>