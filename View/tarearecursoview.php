<?php
require_once '../Controller/TareaRecursoDAO.php';
require_once '../Controller/RecursoDAO.php';
require_once '../Controller/TareaDAO.php';

session_start();
if (!isset($_SESSION['nombreusuario'])) {
    header("Location: login.php");
    exit();
}

$tarearecursos = findAll_tarea_recursos();
$recursos = findAll_recursos();
$tareas = findAll_tareas();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/>
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
                        <th>id recurso</th>
                        <th>Descripcion recurso</th>
                        <th>valor</th>
                        <th>unidad medida</th>
                        <th>cantidad</th>

                </thead>
                <tbody>
                    <?php foreach ($tarearecursos as $datos) : ?>
                        <?php echo '<tr>' ?>
                        <?php echo '<td>' . $datos['idasignacion'] . '</td>' ?>
                        <?php echo '<td>' . $datos['idtarea'] . '</td>' ?>
                        <?php echo '<td>' . $datos['descripcion'] . '</td>' ?>
                        <?php echo '<td>' . $datos['fk_idactividad'] . '</td>' ?>
                        <?php echo '<td>' . $datos['idrecurso'] . '</td>' ?>
                        <?php echo '<td>' . $datos['rdescripcion'] . '</td>' ?>
                        <?php echo '<td>' . $datos['valor'] . '</td>' ?>
                        <?php echo '<td>' . $datos['unidadmedida'] . '</td>' ?>
                        <?php echo '<td>' . $datos['cantidad'] . '</td>' ?>
                        <?php echo '</tr>' ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>
        <section>
            <h3>Crear nueva asignacion de tarea a un usuario</h3>
            <form action="../Controller/CRUDTareaRecurso.php" method="post">
                <input type="hidden" name="accion" value="insertar">

                <label>Selecciona recurso: 
                    <select  required name="idrecurso">
                    <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($recursos as $datos): ?>
                            <?="<option value ='".$datos['idrecurso']."'>".$datos['idrecurso'].' - '.$datos['descripcion']."</option>"?>
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

                <label>Cantidad:
                    <input required type="number" name="cantidad">
                </label>
                </br>

                <button>Insertar datos</button>
            </form>
        </section>

        <section>
            <h3>Actualizar asignacion</h3>
            <form action="../Controller/CRUDTareaRecurso.php" method="post">
                <input type="hidden" name="accion" value="actualizar">

                <label>Selecciona Id asignacion: 
                    <select  required name="idasignacion">
                    <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($tarearecursos as $datos): ?>
                            <?="<option value ='".$datos['idasignacion']."'>".$datos['idasignacion'].' - '.$datos['descripcion'].' - '.$datos['rdescripcion']."</option>"?>
                        <?php endforeach?>
                    </select>
                </label></br>

                <label>Selecciona recurso: 
                    <select  required name="idrecurso">
                    <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($recursos as $datos): ?>
                            <?="<option value ='".$datos['idrecurso']."'>".$datos['idrecurso'].' - '.$datos['descripcion']."</option>"?>
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

                <label>Cantidad:
                    <input required type="number" name="cantidad">
                </label>
                </br>

                <button>Actualzar datos</button>
            </form>
        </section>

        <section>
            <h2>Eliminar asignacion de la base de datos</h2>
            <form action="../Controller/CRUDTareaRecurso.php" method="post">
                <input type="hidden" name="accion" value="eliminar">

                <label>Selecciona Id asignacion: 
                    <select  required name="idasignacion">
                    <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($tarearecursos as $datos): ?>
                            <?="<option value ='".$datos['idasignacion']."'>".$datos['idasignacion'].' - '.$datos['descripcion'].' - '.$datos['rdescripcion']."</option>"?>
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