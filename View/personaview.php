<?php
require_once '../Controller/PersonaDAO.php';
require_once '../db/conexion.php';

$db = conectar();
session_start();
if (!isset($_SESSION['nombreusuario'])) {
    header("Location: login.php");
    exit();
}

$personas = findAll_personas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Centered viewport --> 
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona Info</title>
</head>
<body>
    <header>
        <h1 id="titulo">Personas registradas</h1>
    </header>
    <main>
        <section>
            <h3>Datos registrados en la base de datos</h3>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Sexo</th>
                        <th>Fecha Nacimiento</th>
                        <th>Profesion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($personas as $datos):?>
                        <?php echo '<tr>'?>
                        <?php echo '<td>'.$datos['idpersona'].'</td>'?>
                        <?php echo '<td>'.$datos['nombre'].'</td>'?>
                        <?php echo '<td>'.$datos['apellido'].'</td>'?>
                        <?php echo '<td>'.$datos['direccion'].'</td>'?>
                        <?php echo '<td>'.$datos['telefono'].'</td>'?>
                        <?php echo '<td>'.$datos['sexo'].'</td>'?>
                        <?php echo '<td>'.$datos['fechanacimiento'].'</td>'?>
                        <?php echo '<td>'.$datos['profesion'].'</td>'?>
                        <?php echo '</tr>'?>
                    <?php endforeach?>
                </tbody>
            </table>
        </section>
        <section>
            <h3>Crear nuevo Usuario</h3>
            <form action="../Controller/CRUDPersona.php" method="post">
                <input type="hidden" name="accion" value="insertar">
            
                <label>Nombre: 
                    <input required type="text" name="nombre">
                </label>
                </br>
                <label>Apellido: 
                <input  required type="text" name="apellido">
                </label>
                </br>

                <label>Direccion: 
                <input  required type="text" name="direccion">
                </label>
                </br>

                <label>Telefono: 
                <input  required type="number" name="telefono">
                </label>
                </br>

                <label>Sexo: 
                    <select  required name="sexo">
                        <option selected disabled value="0" >Seleccione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </label>
                </br>

                <label>Fecha Nacimiento: 
                    <input  required type="date" name="fechanacimiento">
                </label>
                </br>

                <label>Profesion: 
                    <input required  type="text" name="profesion">
                </label>
                </br>

                <button>Insertar datos</button>
            </form>
        </section>

        <section>
            <h3>Actualizar Usuario</h3>
            <form action="../Controller/CRUDPersona.php" method="post">
                <input type="hidden" name="accion" value="actualizar">

                <label>Selecciona Usuario: 
                    <select  required name="idpersona">
                    <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($personas as $datos): ?>
                            <?="<option value ='".$datos['idpersona']."'>".$datos['idpersona'].' - '.$datos['nombre']."</option>"?>
                        <?php endforeach?>
                    </select>
                </label></br>

                <label>Nombre: 
                    <input required  type="text" name="nombre">
                </label>
                </br>

                <label>Apellido: 
                <input required  type="text" name="apellido">
                </label>
                </br>

                <label>Direccion: 
                <input required  type="text" name="direccion">
                </label>
                </br>

                <label>Telefono: 
                <input  required type="number" name="telefono">
                </label>
                </br>

                <label>Sexo: 
                    <select required  name="sexo">
                        <option selected disabled value="0" >Seleccione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </label>
                </br>

                <label>Fecha Nacimiento: 
                    <input  required type="date" name="fechanacimiento">
                </label>
                </br>

                <label>Profesion: 
                    <input  required type="text" name="profesion">
                </label>
                </br>

                <button>Actualzar datos</button>
            </form>
        </section>

        <section>
                <h2>Eliminar Persona de la base de datos</h2>
                <form action="../Controller/CRUDPersona.php" method="post">
                <input type="hidden" name="accion" value="eliminar">

                <label>Selecciona Usuario: 
                    <select  required name="idpersona">
                        <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($personas as $datos): ?>
                            <?="<option value ='".$datos['idpersona']."'>".$datos['idpersona'].' - '.$datos['nombre']."</option>"?>
                        <?php endforeach?>
                    </select>
                </label></br>

                <button>Eliminar</button>
                </form>

        </section>
    </main>
    <footer>
        <a target="titulo">Subir</a>
    </footer>
    
</body>
</html>