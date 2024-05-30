<?php
require_once '../Controller/ProyectoDAO.php';
require_once '../Controller/PersonaDAO.php';
require_once '../Controller/ActividadDAO.php';

session_start();
if (!isset($_SESSION['nombreusuario'])) {
    header("Location: login.php");
    exit();
}

$personas = findAll_personas();
$proyectos = findAll_proyectos();
$actividades = findAll_actividades();
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
    <title>Actividad Info</title>
</head>
<body>
    <header>
        <h1 id="titulo">Actividades registradas</h1>
    </header>
    <main>
        <section>
            <h3>Datos registrados en la base de datos</h3>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Fecha inicio</th>
                        <th>Fecha finalizacion</th>
                        <th>id proyecto</th>
                        <th>Responsable</th>
                        <th>Estado</th>
                        <th>Presupuesto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($actividades as $datos):?>
                        <?php echo '<tr>'?>
                        <?php echo '<td>'.$datos['idactividad'].'</td>'?>
                        <?php echo '<td>'.$datos['descripcion'].'</td>'?>
                        <?php echo '<td>'.$datos['fechainicio'].'</td>'?>
                        <?php echo '<td>'.$datos['fechafin'].'</td>'?>
                        <?php echo '<td>'.$datos['fk_idproyecto'].'</td>'?>
                        <?php echo '<td>'.$datos['responsable'].'</td>'?>
                        <?php echo '<td>'.$datos['estado'].'</td>'?>
                        <?php echo '<td>'.$datos['presupuesto'].'</td>'?>
                        <?php echo '</tr>'?>
                    <?php endforeach?>
                </tbody>
            </table>
        </section>
        <section>
            <h3>Crear nueva actividad</h3>
            <form action="../Controller/CRUDActividad.php" method="post">
                <input type="hidden" name="accion" value="insertar">
            
                <label>Descripcion: 
                    <input required type="text" name="descripcion">
                </label>
                </br>
                <label>Fecha Inicio: 
                <input  required type="date" name="fechainicio">
                </label>
                </br>

                <label>Fecha finalizacion: 
                <input  required type="date" name="fechafin">
                </label>
                </br>


                <label>Seleccion proyecto: 
                    <select  required name="idproyecto">
                        <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($proyectos as $datos): ?>
                            <?="<option value ='".$datos['idproyecto']."'>".$datos['idproyecto'].' - '.$datos['descripcion']."</option>"?>
                        <?php endforeach?>
                    </select>
                </label>
                </br>

                <label>Selecciona Usuario reponsable: 
                    <select  required name="responsable">
                        <option selected disabled>Seleccione</option>
                        <?php foreach($personas as $datos): ?>
                            <?="<option value ='".$datos['idpersona']."'>".$datos['idpersona'].' - '.$datos['nombre']."</option>"?>
                        <?php endforeach?>
                    </select>
                </label>
                </br>

                <label>Estado: 
                    <select required name="estado">
                        <option selected disabled >Seleccione</option>
                        <option value="Terminado">Terminado</option>
                        <option value="Terminado">En progreso</option>
                        <option value="Terminado">No iniciado</option>
                        <option value="Terminado">No terminado</option>
                        <option value="Terminado">Calcelado</option>
                    </select>
                </label>
                </br>
                <label>Presupuesto: 
                    <input required  type="number" name="presupuesto">
                </label>
                </br>

                <button>Insertar datos</button>
            </form>
        </section>

        <section>
            <h3>Actualizar Actividad</h3>
            <form action="../Controller/CRUDActividad.php" method="post">
                <input type="hidden" name="accion" value="actualizar">

                <label>Selecciona la actividad: 
                    <select  required name="idactividad">
                        <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($actividades as $datos): ?>
                            <?="<option value ='".$datos['idactividad']."'>".$datos['idactividad'].' - '.$datos['descripcion']."</option>"?>
                        <?php endforeach?>
                    </select>
                </label></br>

                <label>Descripcion: 
                    <input required type="text" name="descripcion">
                </label>
                </br>
                <label>Fecha Inicio: 
                <input  required type="date" name="fechainicio">
                </label>
                </br>

                <label>Fecha finalizacion: 
                <input  required type="date" name="fechafin">
                </label>
                </br>

                <label>Seleccion proyecto: 
                    <select  required name="idproyecto">
                        <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($proyectos as $datos): ?>
                            <?="<option value ='".$datos['idproyecto']."'>".$datos['idproyecto'].' - '.$datos['descripcion']."</option>"?>
                        <?php endforeach?>
                    </select>
                </label>
                </br>

                <label>Selecciona Usuario reponsable: 
                    <select  required name="responsable">
                    <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($personas as $datos): ?>
                            <?="<option value ='".$datos['idpersona']."'>".$datos['idpersona'].' - '.$datos['nombre']."</option>"?>
                        <?php endforeach?>
                    </select>
                </label>
                </br>

                <label>Estado: 
                    <select required name="estado">
                        <option selected disabled >Seleccione</option>
                        <option value="Terminado">Terminado</option>
                        <option value="Terminado">En progreso</option>
                        <option value="Terminado">No iniciado</option>
                        <option value="Terminado">No terminado</option>
                        <option value="Terminado">Calcelado</option>
                    </select>
                </label>
                </br>
                <label>Presupuesto: 
                    <input required  type="number" name="presupuesto">
                </label>
                </br>

                <button>Actualzar datos</button>
            </form>
        </section>

        <section>
                <h2>Eliminar Actividad de la base de datos</h2>
                <form action="../Controller/CRUDActividad.php" method="post">
                <input type="hidden" name="accion" value="eliminar">

                <label>Selecciona actividad: 
                    <select  required name="idactividad">
                    <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($actividades as $datos): ?>
                            <?="<option value ='".$datos['idactividad']."'>".$datos['idactividad'].' - '.$datos['descripcion']."</option>"?>
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