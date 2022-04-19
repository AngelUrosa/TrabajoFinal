package com.daw2final.trabajofinaljsp.servlets.articulos;

import com.daw2final.trabajofinaljsp.model.dao.ArticulosDao;
import com.daw2final.trabajofinaljsp.model.dao.ProveedoresDao;
import com.daw2final.trabajofinaljsp.model.dao.impl.ArticulosDaoImpl;
import com.daw2final.trabajofinaljsp.model.dao.impl.ProveedoresDaoImpl;
import com.daw2final.trabajofinaljsp.model.entity.Articulo;
import com.daw2final.trabajofinaljsp.services.ArticulosService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.Map;
import java.util.logging.Logger;


    //urlPatterns={"/usuarios/alta"}
    @WebServlet(value = "/articulos/alta")
    public class AltaArticuloServlet extends HttpServlet {
        private final static Logger LOG = Logger.getLogger(AltaArticuloServlet.class.getName());
        private ArticulosService articulosService;
        private ProveedoresDao proveedoresDao;

        public void init() {
            LOG.info("Inicializando AltaServlet");
            articulosService = ArticulosService.getInstance();  // UsuariosService es un Singleton
        }

        @Override
        protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ArticulosDao articulosDao = new ArticulosDaoImpl();
            request.setCharacterEncoding("UTF-8");
            request.setAttribute("articulo", new Articulo("", "",0,0));
            request.setAttribute("articulos", articulosDao.listAllFillProv());
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.setAttribute("showButtonSubmit", true);
            request.getRequestDispatcher("/articulos/alta.jsp").forward(request, response);
        }

        @Override
        protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ArticulosDao articulosDao = new ArticulosDaoImpl();
            request.setCharacterEncoding("UTF-8");
            Articulo articulo = articulosService.requestToClass(request);

            Map<String, String> errorsItems = articulosService.errors(request);

            if (errorsItems.isEmpty()) {
                if (articulosDao.add(articulo) != null) {
                    String mensaje = "El articulo " + articulo.getRef() + " ha sido dado de alta.";
                    request.setAttribute("alertSuccess", mensaje);
                    articulo = new Articulo("", "", 0, 0);
                } else {
                    String mensaje = "El usuario " + articulo.getRef() + " no ha sido dado de alta. Ya existe un usuario con el nif ";
                    request.setAttribute("alertDanger", mensaje);
                }
            } else {
                request.setAttribute("alertDanger", "Los datos no son correctos, no se pudo guardar los datos");
            }
            request.setAttribute("errorsItems", errorsItems);
            request.setAttribute("articulo", articulo);
            request.setAttribute("articulos", articulosDao.listAll());
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.setAttribute("showButtonSubmit", true);
            request.getRequestDispatcher("/articulos/alta.jsp").forward(request, response);
        }

        public void destroy() {
        }
    }

