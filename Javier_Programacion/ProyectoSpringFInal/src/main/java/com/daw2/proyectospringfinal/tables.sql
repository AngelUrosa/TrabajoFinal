CREATE TABLE proveedores
(
    id            INT          NOT NULL,
    nif           VARCHAR(12)  NOT NULL,
    nombre        VARCHAR(20)  NOT NULL,
    apellido1     VARCHAR(20)  NOT NULL,
    apellido2     VARCHAR(20)  NULL,
    telefono      VARCHAR(15)  NULL,
    racion_social VARCHAR(255) NULL,
    email         VARCHAR(75)  NULL,
    create_at     datetime     NOT NULL,
    CONSTRAINT pk_proveedores PRIMARY KEY (id)
);

ALTER TABLE proveedores
    ADD CONSTRAINT uc_proveedores_nif UNIQUE (nif);

CREATE TABLE articulos
(
    id           INT          NOT NULL,
    ref          VARCHAR(15)  NOT NULL,
    descripcion  VARCHAR(75)  NOT NULL,
    precio       DOUBLE       NULL,
    stock        DOUBLE       NULL,
    imagen       VARCHAR(255) NULL,
    id_proveedor INT          NULL,
    CONSTRAINT pk_articulos PRIMARY KEY (id)
);

ALTER TABLE articulos
    ADD CONSTRAINT uc_articulos_ref UNIQUE (ref);

ALTER TABLE articulos
    ADD CONSTRAINT FK_ARTICULOS_ON_ID_PROVEEDOR FOREIGN KEY (id_proveedor) REFERENCES proveedores (id);

CREATE TABLE usuarios
(
    id        INT         NOT NULL,
    nif       VARCHAR(12) NOT NULL,
    username       VARCHAR(25) NOT NULL,
    nombre    VARCHAR(20) NOT NULL,
    apellido1 VARCHAR(20) NOT NULL,
    apellido2 VARCHAR(20) NULL,
    telefono  VARCHAR(15) NULL,
    email     VARCHAR(75) NULL,
    create_at datetime    NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

ALTER TABLE usuarios
    ADD CONSTRAINT uc_usuarios_nif UNIQUE (nif);

CREATE TABLE facturas
(
    id          INT         NOT NULL,
    num_factura VARCHAR(15) NOT NULL,
    fecha       date        NOT NULL,
    create_at   datetime    NOT NULL,
    modified_at datetime    NOT NULL,
    id_usuario  INT         NULL,
    CONSTRAINT pk_facturas PRIMARY KEY (id)
);

ALTER TABLE facturas
    ADD CONSTRAINT uc_facturas_numfactura UNIQUE (num_factura);

ALTER TABLE facturas
    ADD CONSTRAINT FK_FACTURAS_ON_ID_USUARIO FOREIGN KEY (id_usuario) REFERENCES usuarios (id);

CREATE TABLE detalle_facturas
(
    id          INT    NOT NULL,
    precio      DOUBLE NULL,
    unidades    DOUBLE NULL,
    dto         DOUBLE NULL,
    id_factura  INT    NULL,
    id_articulo INT    NULL,
    CONSTRAINT pk_detalle_facturas PRIMARY KEY (id)
);

ALTER TABLE detalle_facturas
    ADD CONSTRAINT FK_DETALLE_FACTURAS_ON_ID_ARTICULO FOREIGN KEY (id_articulo) REFERENCES articulos (id);

ALTER TABLE detalle_facturas
    ADD CONSTRAINT FK_DETALLE_FACTURAS_ON_ID_FACTURA FOREIGN KEY (id_factura) REFERENCES facturas (id);