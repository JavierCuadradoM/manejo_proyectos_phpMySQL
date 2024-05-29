<?php
require_once 'ProyectoDAO.php';
require_once '../Model/Proyecto.php';

switch($_POST['accion']){
    case 'insertar':
        $id = 0;
        $descripcion= $_POST['descripcion'];
        $fechainicio= $_POST['fechainicio'];
        $fechaentrega= $_POST['fechaentrega'];
        $valor= $_POST['valor'];
        $lugar= $_POST['lugar'];
        $responsable= $_POST['responsable'];
        $estado= $_POST['estado'];
        $proyecto = new Proyecto($id, $descripcion, $fechainicio, $fechaentrega, $valor, $lugar, $responsable, $estado);
        insertar_proyecto($proyecto);
        header("Location: ../View/proyectoview.php");
        
        break;

    case 'actualizar':
        $id = $_POST['idproyecto'];
        $descripcion= $_POST['descripcion'];
        $fechainicio= $_POST['fechainicio'];
        $fechaentrega= $_POST['fechaentrega'];
        $valor= $_POST['valor'];
        $lugar= $_POST['lugar'];
        $responsable= $_POST['responsable'];
        $estado= $_POST['estado'];
        $proyecto = new Proyecto(7, $descripcion, $fechainicio, $fechaentrega, $valor, $lugar, $responsable, $estado);
        actualizar_proyecto($proyecto);
        header("Location: ../View/proyectoview.php");
        
        break;

    case 'eliminar':
        $id = $_POST['idproyecto'];
        $proyecto = new Proyecto($id, '', '', '', '', '', '', '', '');
        eliminar_proyecto($proyecto);
        header("Location: ../View/proyectoview.php");
        break;
}
?>