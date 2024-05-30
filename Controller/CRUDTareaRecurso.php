<?php
require_once 'TareaRecursoDAO.php';
require_once '../Model/TareaRecurso.php';

switch($_POST['accion']){
    case 'insertar':
        $id = 0;
        $fk_idtarea= $_POST['idtarea'];
        $fk_idrecurso= $_POST['idrecurso'];
        $cantidad= $_POST['cantidad'];

        $tarearecurso = new TareaRecurso($id,$fk_idtarea, $fk_idrecurso, $cantidad);
        insertar_tarea_recurso($tarearecurso);
        echo "<script>alert('Exito al insertar'); window.location.href='../View/tarearecursoview.php';</script>";
        //header("Location: ../View/tarearecursoview.php");
        break;

    case 'actualizar':
        $id = $_POST['idasignacion'];
        $fk_idtarea= $_POST['idtarea'];
        $fk_idrecurso= $_POST['idrecurso'];
        $cantidad= $_POST['cantidad'];

        $tarearecurso = new TareaRecurso($id,$fk_idtarea, $fk_idrecurso, $cantidad);
        actualizar_tarea_recurso($tarearecurso);
        echo "<script>alert('Exito al actualizar'); window.location.href='../View/tarearecursoview.php';</script>";
        //header("Location: ../View/tarearecursoview.php");
        break;

    case 'eliminar':
        $id = $_POST['idasignacion'];
        $tarearecurso = new TareaRecurso($id, '', '', '',);
        eliminar_tarea_recurso($tarearecurso);
        echo "<script>alert('Exito al eliminar'); window.location.href='../View/tarearecursoview.php';</script>";
        //header("Location: ../View/tarearecursoview.php");
        break;
}
?>