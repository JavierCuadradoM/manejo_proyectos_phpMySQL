<?php
require_once 'PersonaDAO.php';
require_once '../Model/Persona.php';

switch($_POST['accion']){
    case 'insertar':
        $id = 0;
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $direccion= $_POST['direccion'];
        $telefono= $_POST['telefono'];
        $sexo= $_POST['sexo'];
        $fechanacimiento= $_POST['fechanacimiento'];
        $profesion= $_POST['profesion'];
        $persona = new Persona($id, $nombre, $apellido, $direccion, $telefono, $sexo, $fechanacimiento, $profesion);
        insertar_persona($persona);
        echo "<script>alert('Exito al insertar'); window.location.href='../View/personaview.php';</script>";
        //header("Location: ../View/personaview.php");
        
        break;

    case 'actualizar':
        $id = $_POST['idpersona'];
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $direccion= $_POST['direccion'];
        $telefono= $_POST['telefono'];
        $sexo= $_POST['sexo'];
        $fechanacimiento= $_POST['fechanacimiento'];
        $profesion= $_POST['profesion'];
        $persona = new Persona($id, $nombre, $apellido, $direccion, $telefono, $sexo, $fechanacimiento, $profesion);
        actualizar_persona($persona);
        echo "<script>alert('Exito al actualizar'); window.location.href='../View/personaview.php';</script>";
        //header("Location: ../View/personaview.php");
        
        break;

    case 'eliminar':
        $id = $_POST['idpersona'];
        $persona = new Persona($id, '', '', '', '', '', '', '', '');
        eliminar_persona($persona);
        echo "<script>alert('Exito al eliminar'); window.location.href='../View/personaview.php';</script>";
        //header("Location: ../View/personaview.php");

        break;
}
?>