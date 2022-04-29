
INSERT INTO roles (rol, descripcion) VALUES ('ROLE_ADMIN', 'Administrador');
INSERT INTO roles (rol, descripcion) VALUES ('ROLE_EMPLE', 'Empleado');
INSERT INTO roles (rol, descripcion) VALUES ('ROLE_USER', 'Usuario');

INSERT INTO usuarios (nombre, apellido1, apellido2, username, password, activo)
VALUES ('Pepito1', 'Pérez', 'López','usuario1',
        '$2a$10$9EgwW5wd3kDNqKqXefY3EemEl/l3bShYQ.ufA7qIABPxU0FiAcxVS', true);

INSERT INTO usuarios_roles (id_usuario,id_rol) VALUES (1,1);
INSERT INTO usuarios_roles (id_usuario,id_rol) VALUES (1,3);