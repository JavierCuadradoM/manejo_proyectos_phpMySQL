<?php
require_once 'RecursoDAO.php';
require_once '../Model/Recurso.php';

switch($_POST['accion']){
    case 'insertar':
        $id = 0;
        $descripcion= $_POST['descripcion'];
        $valor= $_POST['valor'];
        $unidadmedida= $_POST['unidadmedida'];

        $recurso = new Recurso($id, $descripcion, $valor, $unidadmedida);
        insertar_recurso($recurso);
        header("Location: ../View/recursoview.php");
        
        break;

    case 'actualizar':
        $id = $_POST['idrecurso'];
        $descripcion= $_POST['descripcion'];
        $valor= $_POST['valor'];
        $unidadmedida= $_POST['unidadmedida'];

        $recurso = new Recurso($id, $descripcion, $valor, $unidadmedida);
        actualizar_recurso($recurso);
        header("Location: ../View/recursoview.php");
        
        break;

    case 'eliminar':
        $id = $_POST['idrecurso'];
        $recurso = new Recurso($id, '', '', '',);
        eliminar_recurso($recurso);
        header("Location: ../View/recursoview.php");
        break;
}
?>