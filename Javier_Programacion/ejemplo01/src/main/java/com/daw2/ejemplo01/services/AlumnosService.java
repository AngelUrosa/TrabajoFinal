package com.daw2.ejemplo01.services;

import com.daw2.ejemplo01.model.entity.Alumno;
import jakarta.servlet.http.HttpServletRequest;


import java.util.HashMap;
import java.util.Map;


    public class AlumnosService {
        private static AlumnosService alumnosService;

        private AlumnosService() {
        }

        public static AlumnosService getInstance() {
            if (alumnosService == null) {
                alumnosService = new AlumnosService();
            }
            return alumnosService;
        }

        public Alumno requestToClass (HttpServletRequest request) {
            String nif = request.getParameter("nif") != null ? request.getParameter("nif").trim() : "";
            String nombre = (request.getParameter("nombre") != null) ? request.getParameter("nombre").trim() : "";
            String apellido1 = request.getParameter("apellido1") != null ? request.getParameter("apellido1").trim() : "";
            String apellido2 = request.getParameter("apellido2") != null ? request.getParameter("apellido2").trim() : "";
            String auxPago = request.getParameter("pago") != null ? request.getParameter("pago").trim() : "";
            double pago = Double.parseDouble(auxPago);
            Alumno alumno = new Alumno(nif, nombre, apellido1, apellido2,pago);
            return alumno;
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
            if (request.getParameter("pago") == null || request.getParameter("pago").trim().isEmpty()) {
                errors.put("errorPago", "Debe indicar el pago");
            }
            if (request.getParameter("nif").length() > 12) {
                errors.put("errorNif", "El tamaño del nif debe ser 12"); //Comprobacion de que el Nif tiene que tener menos de 12 caracteres
                                                                         //Para comporbar que va el error he dejado el limite en 15 en le campo de nif
            }
            return errors;
        }
    }


