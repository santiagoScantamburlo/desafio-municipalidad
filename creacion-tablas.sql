CREATE TABLE personas (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    dni INTEGER NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    edad INTEGER NOT NULL,
    genero varchar(50) NOT NULL
);

CREATE TABLE empleos (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    codigo varchar(50) NOT NULL,
    categoria varchar(50) NOT NULL,
    descripcion varchar(200) NOT NULL,
    salario_basico INTEGER NOT NULL,
    horas_trabajo INTEGER NOT NULL,
    limite_postulantes INTEGER NOT NULL
);

INSERT INTO empleos (
    `codigo`,
    categoria,
    descripcion,
    salario_basico,
    horas_trabajo,
    limite_postulantes
) VALUES (
    'CONT1',
    'Contable',
    'Puesto de contabilidad',
    1000000,
    8,
    1
),
(
    'LEG1',
    'Legal',
    'Puesto de trabajo legal',
    75000,
    8,
    1
);

CREATE TABLE persona_empleada (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_persona INTEGER NOT NULL,
    id_empleo INTEGER NOT NULL,
    FOREIGN KEY (id_persona) REFERENCES personas(id),
    FOREIGN KEY (id_empleo) REFERENCES empleos(id)
)
