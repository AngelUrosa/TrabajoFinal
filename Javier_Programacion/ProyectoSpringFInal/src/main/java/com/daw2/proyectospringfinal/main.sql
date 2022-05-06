INSERT INTO roles (rol, descripcion) VALUES ('ROLE_ADMIN', 'Administrador');
INSERT INTO roles (rol, descripcion) VALUES ('ROLE_EMPLE', 'Empleado');
INSERT INTO roles (rol, descripcion) VALUES ('ROLE_USER', 'Usuario');

INSERT INTO usuarios (nombre, apellido1, apellido2, username, password, activo)
VALUES ('Pepito1', 'Pérez', 'López','usuario1',
        '$2a$10$9EgwW5wd3kDNqKqXefY3EemEl/l3bShYQ.ufA7qIABPxU0FiAcxVS', true);

INSERT INTO usuarios_roles (id_usuario,id_rol) VALUES (1,1);
INSERT INTO usuarios_roles (id_usuario,id_rol) VALUES (1,3);

CREATE TABLE roles
(
    id          INT AUTO_INCREMENT NOT NULL,
    rol         VARCHAR(15)        NOT NULL,
    descripcion VARCHAR(25)        NOT NULL,
    CONSTRAINT pk_roles PRIMARY KEY (id)
);

ALTER TABLE roles
    ADD CONSTRAINT uc_roles_rol UNIQUE (rol);

CREATE TABLE usuarios
(
    id        INT AUTO_INCREMENT NOT NULL,
    activo    BIT(1)             NULL,
    username  VARCHAR(15)        NOT NULL,
    password  VARCHAR(60)        NOT NULL,
    email     VARCHAR(75)        NULL,
    nombre    VARCHAR(20)        NOT NULL,
    apellido1 VARCHAR(20)        NOT NULL,
    apellido2 VARCHAR(20)        NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

ALTER TABLE usuarios
    ADD CONSTRAINT uc_usuarios_email UNIQUE (email);

ALTER TABLE usuarios
    ADD CONSTRAINT uc_usuarios_username UNIQUE (username);