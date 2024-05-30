<?php
require_once '../Controller/ProyectoDAO.php';
require_once '../Controller/PersonaDAO.php';

session_start();
if (!isset($_SESSION['nombreusuario'])) {
    header("Location: login.php");
    exit();
}

$personas = findAll_personas();
$proyectos = findAll_proyectos();
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
    <title>Proyectos Info</title>
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
                        <th>Fecha entrega</th>
                        <th>Valor</th>
                        <th>Lugar</th>
                        <th>Responsable</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($proyectos as $datos):?>
                        <?php echo '<tr>'?>
                        <?php echo '<td>'.$datos['idproyecto'].'</td>'?>
                        <?php echo '<td>'.$datos['descripcion'].'</td>'?>
                        <?php echo '<td>'.$datos['fechainicio'].'</td>'?>
                        <?php echo '<td>'.$datos['fechaentrega'].'</td>'?>
                        <?php echo '<td>'.$datos['valor'].'</td>'?>
                        <?php echo '<td>'.$datos['lugar'].'</td>'?>
                        <?php echo '<td>'.$datos['responsable'].'</td>'?>
                        <?php echo '<td>'.$datos['estado'].'</td>'?>
                        <?php echo '</tr>'?>
                    <?php endforeach?>
                </tbody>
            </table>
        </section>
        <section>
            <h3>Crear nuevo Proyecto</h3>
            <form action="../Controller/CRUDProyecto.php" method="post">
                <input type="hidden" name="accion" value="insertar">
            
                <label>Descripcion: 
                    <input required type="text" name="descripcion">
                </label>
                </br>
                <label>Fecha Inicio: 
                <input  required type="date" name="fechainicio">
                </label>
                </br>

                <label>Fecha entrega: 
                <input  required type="date" name="fechaentrega">
                </label>
                </br>

                <label>Valor: 
                <input  required type="number" name="valor">
                </label>
                </br>

                <label>lugar: 
                    <input type="text" name="lugar">
                </label>
                </br>

                <label>Selecciona Usuario reponsable: 
                    <select  required name="responsable">
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

                <button>Insertar datos</button>
            </form>
        </section>

        <section>
            <h3>Actualizar Proyecto</h3>
            <form action="../Controller/CRUDProyecto.php" method="post">
                <input type="hidden" name="accion" value="actualizar">

                <label>Seleccion: 
                    <select  required name="idproyecto">
                        <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($proyectos as $datos): ?>
                            <?="<option value ='".$datos['idproyecto']."'>".$datos['idproyecto'].' - '.$datos['descripcion']."</option>"?>
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

                <label>Fecha entrega: 
                <input  required type="date" name="fechaentrega">
                </label>
                </br>

                <label>Valor: 
                <input  required type="number" name="valor">
                </label>
                </br>

                <label>lugar: 
                    <input type="text" name="lugar">
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

                <button>Actualzar datos</button>
            </form>
        </section>

        <section>
                <h2>Eliminar Proyecto de la base de datos</h2>
                <form action="../Controller/CRUDProyecto.php" method="post">
                <input type="hidden" name="accion" value="eliminar">

                <label>Selecciona Proyecto: 
                    <select  required name="idproyecto">
                    <option selected disabled value="0" >Seleccione</option>
                        <?php foreach($proyectos as $datos): ?>
                            <?="<option value ='".$datos['idproyecto']."'>".$datos['idproyecto'].' - '.$datos['descripcion']."</option>"?>
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