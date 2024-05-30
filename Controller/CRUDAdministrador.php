<?php
require_once 'AdministradorDAO.php';
require_once '../Model/Administrador.php';

if (isset($_POST['accion'])) {
    switch($_POST['accion']){
        case 'login':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombreusuario = $_POST['nombreusuario'];
                $password = $_POST['passwd'];
                $administrador = new Administrador(0, $nombreusuario, $password);
                
                if (validar_sesion($administrador)) {
                    session_start();
                    $_SESSION['nombreusuario'] = $administrador->get_nombre_usuario();
                    header("Location: ../View/personaview.php");
                    exit();
                } else {
                    echo "<script>alert('Revise la información ingresada'); window.location.href='../View/login.php';</script>";
                    exit();
                }
            } else {
                echo "ERROR";
            }
            break;

        case 'register':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombreusuario = $_POST['nombreusuario'];
                $password = $_POST['passwd'];
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $administrador = new Administrador(0, $nombreusuario, $hashed_password);
                
                if (insertar_administrador($administrador)) {
                    echo "<script>alert('Registro exitoso'); window.location.href='../View/login.php';</script>";
                    exit();
                } else {
                    echo "<script>alert('Error en el registro'); window.location.href='../View/register.php';</script>";
                    exit();
                }
            } else {
                echo "ERROR";
            }
            break;

        default:
            echo "Acción no reconocida";
            break;
    }
} else {
    echo "Acción no especificada";
}
?>
