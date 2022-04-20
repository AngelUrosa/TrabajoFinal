package com.daw2final.trabajofinaljsp.services;

import com.daw2final.trabajofinaljsp.model.entity.Articulo;
import com.daw2final.trabajofinaljsp.model.entity.Proveedor;
import jakarta.servlet.http.HttpServletRequest;

import java.util.HashMap;
import java.util.Map;




    public class ProveedoresService {
        private static com.daw2final.trabajofinaljsp.services.ProveedoresService proveedoresService;

        private ProveedoresService() {
        }

        public static com.daw2final.trabajofinaljsp.services.ProveedoresService getInstance() {
            if (proveedoresService == null) {
                proveedoresService = new com.daw2final.trabajofinaljsp.services.ProveedoresService();
            }
            return proveedoresService;
        }

        public Proveedor requestToClass(HttpServletRequest request) {
            Integer id = null;
            try {
                id = request.getParameter("id") != null ? Integer.parseInt(request.getParameter("id")) : null;
            } catch (Exception ex) {
            }
            String nif = request.getParameter("nif") != null ? request.getParameter("nif").trim() : "";
            String nombre = (request.getParameter("nombre") != null) ? request.getParameter("nombre").trim() : "";
            String apellido1 = (request.getParameter("apellido1") != null) ? request.getParameter("apellido1").trim() : "";
            String apellido2 = (request.getParameter("apellido2") != null) ? request.getParameter("apellido2").trim() : "";
            String telefono = (request.getParameter("telefono") != null) ? request.getParameter("telefono").trim() : "";
            String email = (request.getParameter("email") != null) ? request.getParameter("email").trim() : "";
            String razon_social = (request.getParameter("razon_social") != null) ? request.getParameter("razon_social").trim() : "";


            Proveedor proveedor = new Proveedor(nif, nombre, apellido1, apellido2, telefono,email,razon_social);
            return proveedor;
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




