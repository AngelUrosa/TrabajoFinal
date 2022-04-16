package com.daw2.aprende.services;

import com.daw2.aprende.model.entity.Departamento;
import com.daw2.aprende.model.entity.Empleado;
import com.daw2.aprende.model.entity.Usuario;
import com.daw2.aprende.util.UtilFecha;
import jakarta.servlet.http.HttpServletRequest;


import java.util.Date;
import java.util.HashMap;
import java.util.Map;

public class EmpleadosService {
    private static EmpleadosService empleadosService;

    private EmpleadosService() {
    }

    public static EmpleadosService getInstance() {
        if (empleadosService == null) {
            empleadosService = new EmpleadosService();
        }
        return empleadosService;
    }

    public Empleado requestToClass (HttpServletRequest request) {
        String nif = request.getParameter("nif") != null ? request.getParameter("nif").trim() : "";
        String nombre = (request.getParameter("nombre") != null) ? request.getParameter("nombre").trim() : "";
        String apellido1 = request.getParameter("apellido1") != null ? request.getParameter("apellido1").trim() : "";
        String apellido2 = request.getParameter("apellido2") != null ? request.getParameter("apellido2").trim() : "";
        String telefono = request.getParameter("telefono") != null ? request.getParameter("telefono").trim() : "";
        double sueldo = 0;
        try {
             sueldo = Double.parseDouble(request.getParameter("sueldo").trim());
        } catch(Exception ex) {
            sueldo = 0;
        }
        Date fechaAlta = null;
        try {
            fechaAlta = request.getParameter("telefono") != null ? UtilFecha.yyyy_mm_dd_toDate(request.getParameter("fechaAlta")) : null;
        } catch(Exception ex) {
            sueldo = 0;
        }
        Departamento dpto=null;
        try {
            Integer idDpto = Integer.parseInt(request.getParameter("idDpto").trim());
            dpto = new Departamento();
            dpto.setId(idDpto);
        } catch(Exception ex) {
        }

        Empleado empleado = new Empleado(nif, nombre, apellido1, apellido2,telefono,sueldo, fechaAlta,dpto);
        return empleado;
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

        if (request.getParameter("sueldo") != null) {
            try {
                double sueldo = Double.parseDouble(request.getParameter("sueldo").trim());
            } catch (Exception ex) {
                errors.put("errorSueldo", "El sueldo debe ser numérico");
            }
        }
        return errors;
    }
}
