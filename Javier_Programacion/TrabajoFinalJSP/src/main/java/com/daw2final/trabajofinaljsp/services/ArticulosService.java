package com.daw2final.trabajofinaljsp.services;

import com.daw2final.trabajofinaljsp.model.entity.Articulo;
import com.daw2final.trabajofinaljsp.model.entity.Proveedor;
import jakarta.servlet.http.HttpServletRequest;

import java.util.HashMap;
import java.util.Map;



    public class ArticulosService {
        private static ArticulosService articulosService;

        private ArticulosService() {
        }

        public static ArticulosService getInstance() {
            if (articulosService == null) {
                articulosService = new ArticulosService();
            }
            return articulosService;
        }

        public Articulo requestToClass(HttpServletRequest request) {
            Integer id = null;
            try {
                id = request.getParameter("id") != null ? Integer.parseInt(request.getParameter("id")) : null;
            } catch (Exception ex) {
            }
            String ref = request.getParameter("ref") != null ? request.getParameter("ref").trim() : "";
            String descripcion = (request.getParameter("descripcion") != null) ? request.getParameter("descripcion").trim() : "";
            double precio;
            try {
                precio = Double.parseDouble(request.getParameter("precio").trim());
            } catch (Exception ex) {
                precio = 0;
            }
            double stock;
            try {
                stock = Double.parseDouble(request.getParameter("stock").trim());
            } catch (Exception ex) {
                stock = 0;
            }

            Proveedor prov = null;
            try {
                Integer idProv = Integer.parseInt(request.getParameter("idProveedor").trim());
                prov = new Proveedor();
                prov.setId(idProv);
            } catch (Exception ex) {
            }

            Articulo articulo = new Articulo(id,ref, descripcion, precio, stock, prov);
            return articulo;
        }

        public Map errors(HttpServletRequest request) {
            Map errors = new HashMap();

            return errors;
        }
    }


