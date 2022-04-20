package com.daw2final.trabajofinaljsp.servlets.proveedores;

import com.daw2final.trabajofinaljsp.model.dao.ArticulosDao;
import com.daw2final.trabajofinaljsp.model.dao.ProveedoresDao;
import com.daw2final.trabajofinaljsp.model.dao.impl.ArticulosDaoImpl;
import com.daw2final.trabajofinaljsp.model.dao.impl.ProveedoresDaoImpl;
import com.daw2final.trabajofinaljsp.model.entity.Articulo;
import com.daw2final.trabajofinaljsp.model.entity.Proveedor;
import com.daw2final.trabajofinaljsp.services.ArticulosService;
import com.daw2final.trabajofinaljsp.services.ProveedoresService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.Map;
import java.util.logging.Logger;

    //urlPatterns={"/proveedores/alta"}
    @WebServlet(value = "/proveedores/alta")
    public class AltaProveedorServlet extends HttpServlet {
        private final static Logger LOG = Logger.getLogger(com.daw2final.trabajofinaljsp.servlets.proveedores.AltaProveedorServlet.class.getName());
        private ProveedoresService proveedoresService;

        public void init() {
            LOG.info("Inicializando AltaServlet");
            proveedoresService = ProveedoresService.getInstance();
        }

        @Override
        protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ProveedoresDao proveedoresDao = new ProveedoresDaoImpl();
            request.setCharacterEncoding("UTF-8");
            request.setAttribute("proveedor", new Proveedor("","","","","","",""));
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.setAttribute("showButtonSubmit", true);
            request.getRequestDispatcher("/proveedores/alta.jsp").forward(request, response);
        }

        @Override
        protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ProveedoresDao proveedoresDao = new ProveedoresDaoImpl();
            request.setCharacterEncoding("UTF-8");
            Proveedor proveedor = proveedoresService.requestToClass(request);

            Map<String, String> errorsItems = proveedoresService.errors(request);

            if (errorsItems.isEmpty()) {
                if (proveedoresDao.add(proveedor) != null) {
                    String mensaje = "El proveedor " + proveedor.getNif() + " ha sido dado de alta.";
                    request.setAttribute("alertSuccess", mensaje);
                    proveedor = new Proveedor("","","","","","","");
                } else {
                    String mensaje = "El usuario " + proveedor.getNif() + " no ha sido dado de alta. Ya existe un usuario con el nif ";
                    request.setAttribute("alertDanger", mensaje);
                }
            } else {
                request.setAttribute("alertDanger", "Los datos no son correctos, no se pudo guardar los datos");
            }
            request.setAttribute("errorsItems", errorsItems);
            request.setAttribute("proveedor", proveedor);
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.setAttribute("showButtonSubmit", true);
            request.getRequestDispatcher("/proveedores/alta.jsp").forward(request, response);
        }

        public void destroy() {
        }
    }



