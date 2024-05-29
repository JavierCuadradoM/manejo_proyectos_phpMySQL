<?php
declare(strict_types=1);
require_once '../db/conexion.php';
require_once '../Model/Recurso.php';

function findAll_recursos(){
    $db = conectar();
    $consulta = $db->prepare("SELECT * FROM recursos");
    $consulta->execute();
    $resultado =$consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function insertar_recurso(Recurso $recurso){
    $db = conectar();
    $consulta = $db->prepare("INSERT INTO recursos (descripcion, valor, unidadmedida) 
    VALUES (:descripcion, :valor, :unidadmedida)");
    
    $consulta->bindParam(':descripcion', $recurso->get_descripcion());
    $consulta->bindParam(':valor', $recurso->get_valor());
    $consulta->bindParam(':unidadmedida', $recurso->get_unidad_medida());

    
    $consulta->execute();    
}

function actualizar_recurso(Recurso $recurso){
    $db = conectar();
    $consulta = $db->prepare("UPDATE recursos SET descripcion = :descripcion, valor = :valor, unidadmedida = :unidadmedida
    WHERE idrecurso = :idrecurso;");

$consulta->bindParam(':descripcion', $recurso->get_descripcion());
$consulta->bindParam(':valor', $recurso->get_valor());
$consulta->bindParam(':unidadmedida', $recurso->get_unidad_medida());
$consulta->bindParam(':idrecurso', $recurso->get_id_recurso());
$consulta->execute();
}

function eliminar_recurso(Recurso $recurso){
    $db = conectar();
    $sentencia = $db->prepare("DELETE FROM recursos WHERE idrecurso = :idrecurso");
    $sentencia->bindParam(':idrecurso', $recurso->get_id_recurso());
    $sentencia->execute();
}

$recurso1 = new Recurso(6,'Recurso 6', 500000, "Tonelada metrica");

//insertar_recurso($recurso1);
//actualizar_recurso($recurso1);
//eliminar_recurso($proyecto1);
var_dump(findAll_recursos());
?>