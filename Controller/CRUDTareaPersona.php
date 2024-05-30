<?php
require_once 'TareaPersonaDAO.php';
require_once '../Model/TareaPersona.php';

switch($_POST['accion']){
    case 'insertar':
        $id = 0;
        $fk_idtarea= $_POST['idtarea'];
        $fk_idpersona= $_POST['idpersona'];
        $duracion= $_POST['duracion'];

        $tareapersona = new TareaPersona($id,$fk_idpersona,$fk_idpersona,$duracion);
        insertar_tarea_persona($tareapersona);
        header("Location: ../View/tareapersonaview.php");
        break;

    case 'actualizar':
        $id = $_POST['idasignacion'];
        $fk_idtarea= $_POST['idtarea'];
        $fk_idpersona= $_POST['idpersona'];
        $duracion= $_POST['duracion'];

        $tareapersona = new TareaPersona($id,$fk_idpersona,$fk_idpersona,$duracion);
        actualizar_tarea_persona($tareapersona);
        header("Location: ../View/tareapersonaview.php");
        break;

    case 'eliminar':
        $id = $_POST['idasignacion'];
        $tareapersona = new TareaPersona($id, '', '', '',);
        eliminar_tarea_persona($tareapersona);
        header("Location: ../View/tareapersonaview.php");
        break;
}
?>