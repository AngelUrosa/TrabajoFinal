CREATE TABLE usuarios
(
    id        INTEGER AUTO_INCREMENT,
    nif       VARCHAR(12) NOT NULL,
    nombre    VARCHAR(15),
    apellido1 VARCHAR(15),
    apellido2 VARCHAR(15),
    PRIMARY KEY (id),
    CONSTRAINT UQ_NIF UNIQUE (nif)
);

CREATE TABLE empleados
(
    id         INTEGER AUTO_INCREMENT,
    nif        VARCHAR(12) NOT NULL,
    nombre     VARCHAR(15) NOT NULL,
    apellido1  VARCHAR(15) NOT NULL,
    apellido2  VARCHAR(15),
    telefono   VARCHAR(15),
    sueldo     DOUBLE      NOT NULL,
    fecha_alta DATE        NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT UQ_NIF UNIQUE (nif)
);

CREATE TABLE departamentos
(
    id          INTEGER AUTO_INCREMENT,
    cod_dpto    VARCHAR(12) NOT NULL,
    descripcion VARCHAR(30) NOT NULL,
    jefe        INTEGER,
    PRIMARY KEY (id),
    CONSTRAINT UQ_COD_DPTO UNIQUE (cod_dpto)
);

ALTER TABLE empleados
    ADD COLUMN id_dpto INTEGER;
ALTER TABLE empleados
    ADD CONSTRAINT FK_id_dpto FOREIGN KEY (id_dpto) REFERENCES departamentos (id);
ALTER TABLE departamentos
    ADD CONSTRAINT FK_jefe FOREIGN KEY (jefe) REFERENCES empleados (id);

INSERT INTO departamentos (cod_dpto, descripcion)
VALUES ("COMPRAS", "Departamento de Compras");
INSERT INTO departamentos (cod_dpto, descripcion)
VALUES ("MARKETING", "Departamento de Marketing");
INSERT INTO departamentos (cod_dpto, descripcion)
VALUES ("VENTAS", "Departamento de Ventas");