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
        echo "<script>alert('Exito al insertar'); window.location.href='../View/proyectoview.php';</script>";
        //header("Location: ../View/proyectoview.php");
        
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
        $proyecto = new Proyecto($id, $descripcion, $fechainicio, $fechaentrega, $valor, $lugar, $responsable, $estado);
        actualizar_proyecto($proyecto);
        echo "<script>alert('Exito al actualizar'); window.location.href='../View/proyectoview.php';</script>";
        //header("Location: ../View/proyectoview.php");
        
        break;

    case 'eliminar':
        $id = $_POST['idproyecto'];
        $proyecto = new Proyecto($id, '', '', '', '', '', '', '', '');
        eliminar_proyecto($proyecto);
        echo "<script>alert('Exito al eliminar'); window.location.href='../View/proyectoview.php';</script>";
        //header("Location: ../View/proyectoview.php");
        break;
}
?>