<?php
declare(strict_types=1);

use function PHPSTORM_META\elementType;

require_once '../db/conexion.php';
require_once '../Model/Administrador.php';

function findAll_admin_by_username($username){
    $db = conectar();
    $consulta = $db->prepare("SELECT * FROM administradores WHERE nombreusuario = :nombreusuario");
    $consulta->bindParam(':nombreusuario', $username);
    $consulta->execute();
    $resultado =$consulta->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}

function insertar_administrador(Administrador $administrador){
    $db = conectar();
    $consulta = $db->prepare("INSERT INTO administradores (nombreusuario, passwd) 
    VALUES (:nombreusuario, :passwd)");
    $resultado = findAll_admin_by_username($administrador->get_nombre_usuario());
    try {

        if($resultado){
            echo 'Ya se encuentra un usuario registrado';
        }else{
            $consulta->bindParam(':nombreusuario', $administrador->get_nombre_usuario());
            $consulta->bindParam(':passwd', $administrador->get_password());
            $consulta->execute();
        }
         
        return true;
    } catch (Exception $e) {
        echo $e;
        return false;
    }
       
}

function validar_sesion(Administrador $administrador){
    $db = conectar();
    $consulta = $db->prepare("SELECT passwd  FROM administradores WHERE nombreusuario = :nombreusuasrio");

    try {
        $consulta->bindParam(':nombreusuasrio', $administrador->get_nombre_usuario());
        $consulta->execute();
        $resultado =$consulta->fetch(PDO::FETCH_ASSOC);
        if($resultado['passwd'] == $administrador->get_password()){
            echo 'Exito al iniciar sesion';
            return true;
        }
        else {
            echo 'Eror al iniciar sesion';
            return false;
        }
        
    } catch (Exception $e) {
        echo $e;
        return false;
    }
}


//$administrador1 = new Administrador(0,'expecto', 'patronum789');

//insertar_proyecto($proyecto1);
//actualizar_proyecto($proyecto1);
//validar_sesion($administrador1);
//var_dump(findAll_admin_by_username('alohomora'));
?>