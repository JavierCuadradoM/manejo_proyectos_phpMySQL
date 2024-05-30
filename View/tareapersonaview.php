<?php
require_once '../Controller/TareaPersonaDAO.php';
require_once '../Controller/PersonaDAO.php';
require_once '../Controller/TareaDAO.php';

session_start();
if (!isset($_SESSION['nombreusuario'])) {
    header("Location: login.php");
    exit();
}

$tareapersonas = findAll_tarea_persona();
$personas = findAll_personas();
$tareas = findAll_tareas();
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
    <title>Tarea Info</title>
</head>

<body>
    <header>
        <h1 id="titulo">Tareas registradas</h1>
    </header>
    <main>
        <section>
            <h3>Datos registrados en la base de datos</h3>
            <table border="1">
            <thead>
                    <tr>
                        <th>ID Asignacion</th>
                        <th>ID Tarea</th>
                        <th>Descripcion</th>
                        <th>ID Actividad</th>
                        <th>ID Persona</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Profesion</th>
                        <th>Duracion</th>

                </thead>
                <tbody>
                    <?php foreach ($tareapersonas as $datos) : ?>
                        <?php echo '<tr>' ?>
                        <?php echo '<td>' . $datos['idasignacion'] . '</td>' ?>
                        <?php echo '<td>' . $datos['idtarea'] . '</td>' ?>
                        <?php echo '<td>' . $datos['descripcion'] . '</td>' ?>
                        <?php echo '<td>' . $datos['fk_idactividad'] . '</td>' ?>
                        <?php echo '<td>' . $datos['idpersona'] . '</td>' ?>
                        <?php echo '<td>' . $datos['nombre'] . '</td>' ?>
                        <?php echo '<td>' . $datos['apellido'] . '</td>' ?>
                        <?php echo '<td>' . $datos['profesion'] . '</td>' ?>
                        <?php echo '<td>' . $datos['duracion'] . '</td>' ?>
                        <?php echo '</tr>' ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>
        <section>
            <h3>Crear nueva asignacion de tarea a un usuario</h3>
            <form action="../Controller/CRUDTareaPersona.php" method="post">
                <input type="hidden" name="accion" value="insertar">

                <label>Selecciona Usuario: 
                    <select  required name="idpersona">
                    <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($personas as $datos): ?>
                            <?="<option value ='".$datos['idpersona']."'>".$datos['idpersona'].' - '.$datos['nombre']."</option>"?>
                        <?php endforeach?>
                    </select>
                </label></br>

                <label>Selecciona la tarea:
                    <select required name="idtarea">
                        <option selected disabled value="0">Seleccione</option>
                        <?php foreach ($tareas as $datos) : ?>
                            <?= "<option value ='" . $datos['idtarea'] . "'>" . $datos['idtarea'] . ' - ' . $datos['descripcion'] . "</option>" ?>
                        <?php endforeach ?>
                    </select>
                </label></br>

                <label>Duración:
                    <input required type="time" name="duracion">
                </label>
                </br>

                <button>Insertar datos</button>
            </form>
        </section>

        <section>
            <h3>Actualizar asignacion</h3>
            <form action="../Controller/CRUDTareaPersona.php" method="post">
                <input type="hidden" name="accion" value="actualizar">

                <label>Selecciona Id asignacion: 
                    <select  required name="idasignacion">
                    <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($tareapersonas as $datos): ?>
                            <?="<option value ='".$datos['idasignacion']."'>".$datos['idasignacion'].' - '.$datos['nombre'].' - '.$datos['descripcion']."</option>"?>
                        <?php endforeach?>
                    </select>
                </label></br>

                <label>Selecciona Usuario: 
                    <select  required name="idpersona">
                    <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($personas as $datos): ?>
                            <?="<option value ='".$datos['idpersona']."'>".$datos['idpersona'].' - '.$datos['nombre']."</option>"?>
                        <?php endforeach?>
                    </select>
                </label></br>

                <label>Selecciona la tarea:
                    <select required name="idtarea">
                        <option selected disabled value="0">Seleccione</option>
                        <?php foreach ($tareas as $datos) : ?>
                            <?= "<option value ='" . $datos['idtarea'] . "'>" . $datos['idtarea'] . ' - ' . $datos['descripcion'] . "</option>" ?>
                        <?php endforeach ?>
                    </select>
                </label></br>

                <label>Duración:
                    <input required type="time" name="duracion">
                </label>
                </br>

                <button>Actualzar datos</button>
            </form>
        </section>

        <section>
            <h2>Eliminar asignacion de la base de datos</h2>
            <form action="../Controller/CRUDTareaPersona.php" method="post">
                <input type="hidden" name="accion" value="eliminar">

                <label>Selecciona Id asignacion: 
                    <select  required name="idasignacion">
                    <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($tareapersonas as $datos): ?>
                            <?="<option value ='".$datos['idasignacion']."'>".$datos['idasignacion'].' - '.$datos['nombre'].' - '.$datos['descripcion']."</option>"?>
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