<?php
require_once '../Controller/RecursoDAO.php';

session_start();
if (!isset($_SESSION['nombreusuario'])) {
    header("Location: login.php");
    exit();
}

$recursos = findAll_recursos();
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
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Valor</th>
                        <th>Unidad de medida</th>
                </thead>
                <tbody>
                    <?php foreach ($recursos as $datos) : ?>
                        <?php echo '<tr>' ?>
                        <?php echo '<td>' . $datos['idrecurso'] . '</td>' ?>
                        <?php echo '<td>' . $datos['descripcion'] . '</td>' ?>
                        <?php echo '<td>' . $datos['valor'] . '</td>' ?>
                        <?php echo '<td>' . $datos['unidadmedida'] . '</td>' ?>
                        <?php echo '</tr>' ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>
        <section>
            <h3>Crear nuevo Recurso</h3>
            <form action="../Controller/CRUDRecurso.php" method="post">
                <input type="hidden" name="accion" value="insertar">

                <label>Descripcion:
                    <input required type="text" name="descripcion">
                </label>
                </br>

                <label>Valor:
                    <input required type="number" name="valor">
                </label>
                </br>
                <label>Unidad Medida:
                    <input required type="text" name="unidadmedida">
                </label>
                </br>

                <button>Insertar datos</button>
            </form>
        </section>

        <section>
            <h3>Actualizar Recurso</h3>
            <form action="../Controller/CRUDRecurso.php" method="post">
                <input type="hidden" name="accion" value="actualizar">

                <label>Selecciona el recurso:
                    <select required name="idrecurso">
                        <option selected disabled value="0">Seleccione</option>
                        <?php foreach ($recursos as $datos) : ?>
                            <?= "<option value ='" . $datos['idrecurso'] . "'>" . $datos['idrecurso'] . ' - ' . $datos['descripcion'] . "</option>" ?>
                        <?php endforeach ?>
                    </select>
                </label></br>

                <label>Descripcion:
                    <input required type="text" name="descripcion">
                </label>
                </br>

                <label>Valor:
                    <input required type="number" name="valor">
                </label>
                </br>
                <label>Unidad Medida:
                    <input required type="text" name="unidadmedida">
                </label>
                </br>

                <button>Actualzar datos</button>
            </form>
        </section>

        <section>
            <h2>Eliminar Actividad de la base de datos</h2>
            <form action="../Controller/CRUDRecurso.php" method="post">
                <input type="hidden" name="accion" value="eliminar">

                <label>Selecciona el recurso:
                    <select required name="idrecurso">
                        <option selected disabled value="0">Seleccione</option>
                        <?php foreach ($recursos as $datos) : ?>
                            <?= "<option value ='" . $datos['idrecurso'] . "'>" . $datos['idrecurso'] . ' - ' . $datos['descripcion'] . "</option>" ?>
                        <?php endforeach ?>
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