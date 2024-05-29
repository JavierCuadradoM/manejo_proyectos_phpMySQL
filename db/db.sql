CREATE DATABASE manejoproyectos;
USE manejoproyectos;

CREATE TABLE personas(
idpersona INT AUTO_INCREMENT NOT NULL, 
nombre VARCHAR(50), 
apellido VARCHAR(50),
direccion VARCHAR(50),
telefono VARCHAR(10),
sexo CHAR,
fechanacimiento DATE,
profesion VARCHAR(50),
PRIMARY KEY(idpersona)
);

CREATE TABLE proyectos(
idproyecto INT AUTO_INCREMENT NOT NULL,
descripcion TEXT,
fechainicio DATE,
fechaentrega DATE,
valor FLOAT,
lugar TEXT,
responsable INT NOT NULL,
estado VARCHAR(20),
PRIMARY KEY (idproyecto),
FOREIGN KEY (responsable) REFERENCES personas (idpersona)
);

CREATE TABLE actividades(
idactividad INT AUTO_INCREMENT NOT NULL,
descripcion TEXT,
fechainicio DATE,
fechafin DATE,
fk_idproyecto INT NOT NULL,
responsable INT NOT NUll,
estado VARCHAR(20),
presupuesto FLOAT,
PRIMARY KEY (idactividad),
FOREIGN KEY (fk_idproyecto) REFERENCES proyectos(idproyecto),
FOREIGN KEY (responsable) REFERENCES personas (idpersona)
);

CREATE TABLE tareas(
idtarea INT AUTO_INCREMENT NOT NULL,
descripcion TEXT,
fechainicio DATE,
fechafin DATE,
fk_idactividad INT NOT NULL,
estado varchar(20),
presupuesto FLOAT,
PRIMARY KEY(idtarea),
FOREIGN KEY (fk_idactividad) REFERENCES actividades(idactividad)
);

CREATE TABLE recursos(
idrecurso INT AUTO_INCREMENT NOT NULL,
descripcion TEXT,
valor FLOAT,
unidadmedida VARCHAR(30),
PRIMARY KEY(idrecurso)
);
CREATE TABLE tarearecurso(
fk_idtarea INT NOT NULL,
fk_idrecurso INT NOT NULL,
cantidad INT,
FOREIGN KEY(fk_idtarea) REFERENCES tareas(idtarea),
FOREIGN KEY(fk_idrecurso) REFERENCES recursos(idrecurso)
);
CREATE TABLE tareapersona(
fk_idtarea INT NOT NULL,
fk_idpersona INT NOT NULL,
duracion VARCHAR(15),
FOREIGN KEY(fk_idtarea) REFERENCES tareas(idtarea),
FOREIGN KEY(fk_idpersona) REFERENCES personas(idpersona)
);
-- datos mockeados para probar.
-- Insertar datos en la tabla personas
INSERT INTO personas (nombre, apellido, direccion, telefono, sexo, fechanacimiento, profesion) VALUES
('Juan', 'Perez', 'Calle Falsa 123', '1234567890', 'M', '1985-01-15', 'Ingeniero'),
('Maria', 'Lopez', 'Av. Siempre Viva 456', '2345678901', 'F', '1990-02-20', 'Arquitecta'),
('Carlos', 'Garcia', 'Paseo del Prado 789', '3456789012', 'M', '1983-03-25', 'Doctor'),
('Ana', 'Martinez', 'Calle de la Rosa 101', '4567890123', 'F', '1987-04-30', 'Abogada'),
('Luis', 'Gomez', 'Plaza Mayor 202', '5678901234', 'M', '1992-05-05', 'Contador');

-- Insertar datos en la tabla proyectos
INSERT INTO proyectos (descripcion, fechainicio, fechaentrega, valor, lugar, responsable, estado) VALUES
('Proyecto Alpha', '2023-01-10', '2023-06-10', 15000.00, 'Ciudad A', 1, 'En progreso'),
('Proyecto Beta', '2023-02-15', '2023-07-15', 20000.00, 'Ciudad B', 2, 'En progreso'),
('Proyecto Gamma', '2023-03-20', '2023-08-20', 18000.00, 'Ciudad C', 3, 'En progreso'),
('Proyecto Delta', '2023-04-25', '2023-09-25', 22000.00, 'Ciudad D', 4, 'En progreso'),
('Proyecto Epsilon', '2023-05-30', '2023-10-30', 25000.00, 'Ciudad E', 5, 'En progreso');

-- Insertar datos en la tabla actividades
INSERT INTO actividades (descripcion, fechainicio, fechafin, fk_idproyecto, responsable, estado) VALUES
('Actividad 1', '2023-01-15', '2023-02-15', 1, 1, 'En progreso' 754654),
('Actividad 2', '2023-02-20', '2023-03-20', 2, 2, 'En progreso'54000),
('Actividad 3', '2023-03-25', '2023-04-25', 3, 3, 'En progreso'89664),
('Actividad 4', '2023-04-30', '2023-05-30', 4, 4, 'En progreso'1414122),
('Actividad 5', '2023-05-05', '2023-06-05', 5, 5, 'En progreso'5557798);

-- Insertar datos en la tabla tareas
INSERT INTO tareas (descripcion, fechainicio, fechafin, fk_idactividad, estado, presupuesto) VALUES
('Tarea 1', '2023-01-20', '2023-02-20', 1, 'En progreso', 5000.00),
('Tarea 2', '2023-02-25', '2023-03-25', 2, 'En progreso', 6000.00),
('Tarea 3', '2023-03-30', '2023-04-30', 3, 'En progreso', 7000.00),
('Tarea 4', '2023-04-05', '2023-05-05', 4, 'En progreso', 8000.00),
('Tarea 5', '2023-05-10', '2023-06-10', 5, 'En progreso', 9000.00);

-- Insertar datos en la tabla recursos
INSERT INTO recursos (descripcion, valor, unidadmedida) VALUES
('Recurso 1', 1000.00, 'unidad metro'),
('Recurso 2', 2000.00, 'unidad segundo'),
('Recurso 3', 3000.00, 'unidad litro'),
('Recurso 4', 4000.00, 'unidad kilogramo'),
('Recurso 5', 5000.00, 'unidad kilometro');

-- Insertar datos en la tabla tarearecurso
INSERT INTO tarearecurso (fk_idtarea, fk_idrecurso, cantidad) VALUES
(1, 1, 5),
(2, 2, 10),
(3, 3, 15),
(4, 4, 20),
(5, 5, 25);

-- Insertar datos en la tabla tareapersona
INSERT INTO tareapersona (fk_idtarea, fk_idpersona, duracion) VALUES
(1, 1, '5 días'),
(2, 2, '10 días'),
(3, 3, '15 días'),
(4, 4, '20 días'),
(5, 5, '25 días');
