package com.daw2.aprende.services;

import com.daw2.aprende.model.entity.Usuario;
import jakarta.servlet.http.HttpServletRequest;


import java.util.HashMap;
import java.util.Map;

public class UsuariosService {
    private static UsuariosService usuariosService;

    private UsuariosService() {
    }

    public static UsuariosService getInstance() {
        if (usuariosService == null) {
            usuariosService = new UsuariosService();
        }
        return usuariosService;
    }

    public Usuario requestToClass (HttpServletRequest request) {
        Integer id = null;
        try {
            id = request.getParameter("id") != null ? Integer.parseInt(request.getParameter("id")) : null;
        } catch (Exception ex) {}
        String nif = request.getParameter("nif") != null ? request.getParameter("nif").trim() : "";
        String nombre = (request.getParameter("nombre") != null) ? request.getParameter("nombre").trim() : "";
        String apellido1 = request.getParameter("apellido1") != null ? request.getParameter("apellido1").trim() : "";
        String apellido2 = request.getParameter("apellido2") != null ? request.getParameter("apellido2").trim() : "";
        Usuario usuario = new Usuario(id, nif, nombre, apellido1, apellido2);
        return usuario;
    }

    public Map errors(HttpServletRequest request) {
        Map errors = new HashMap();
        if (request.getParameter("nif") == null || request.getParameter("nif").trim().isEmpty()) {
            errors.put("errorNif", "Debe indicar el NIF");
        }
        if (request.getParameter("nombre") == null || request.getParameter("nombre").trim().isEmpty()) {
            errors.put("errorNombre", "Debe indicar el nombre");
        }
        if (request.getParameter("apellido1") == null || request.getParameter("apellido1").trim().isEmpty()) {
            errors.put("errorApellido1", "Debe indicar el primer apellido");
        }
        return errors;
    }
}
