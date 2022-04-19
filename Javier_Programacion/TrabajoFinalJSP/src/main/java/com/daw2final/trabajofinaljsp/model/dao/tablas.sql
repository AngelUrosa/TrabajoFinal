CREATE TABLE proveedores
(
    id        INTEGER AUTO_INCREMENT,
    nif       VARCHAR(12) NOT NULL,
    nombre    VARCHAR(20) NOT NULL,
    apellido1 VARCHAR(15) NOT NULL,
    apellido2 VARCHAR(15),
    telefono VARCHAR (15),
    razon_social VARCHAR (255),
    email VARCHAR (75),
    PRIMARY KEY (id),
    CONSTRAINT UQ_NIF UNIQUE (nif)
);
CREATE TABLE articulos
(
    id        INTEGER AUTO_INCREMENT,
    ref       VARCHAR(15) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    precio double,
    stock double,
    id_proveedor INTEGER,
    FOREIGN KEY (id_proveedor) REFERENCES proveedores(id),
    PRIMARY KEY (id),
    CONSTRAINT UQ_NIF UNIQUE (ref)
);