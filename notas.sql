CREATE DATABASE notas;
use notas;

create table usuario(
dni varchar(9) PRIMARY KEY,
nombre_alu varchar(50),
apellido varchar(50),
tipo_usuario tinyint
);

create table asignatura(
id int auto_increment PRIMARY KEY,
nombre_asig varchar(30)
);

create table nota(
alumno varchar(9),
asignatura int,
PRIMARY KEY (alumno, asignatura),
nota int,
FOREIGN KEY (alumno) REFERENCES usuario (dni) ON DELETE CASCADE,
FOREIGN KEY (asignatura) REFERENCES asignatura (id) ON DELETE CASCADE
);

INSERT INTO usuario VALUES ('17492075G', 'Diego', 'Valle', 1);
INSERT INTO usuario VALUES ('29450284Y', 'Iyán', 'Tudela', 0);
INSERT INTO usuario VALUES ('28401858J', 'Mario', 'Sufuentes', 1);

INSERT INTO asignatura (nombre_asig) VALUES ('Conocimiento del medio');
INSERT INTO asignatura (nombre_asig) VALUES ('Matemáticas');
INSERT INTO asignatura (nombre_asig) VALUES ('Lengua');

INSERT INTO nota VALUES ('17492075G', '1', 8);
INSERT INTO nota VALUES ('17492075G', '2', 4);
INSERT INTO nota VALUES ('29450284Y', '2', 2);
INSERT INTO nota VALUES ('28401858J', '3', 10);
