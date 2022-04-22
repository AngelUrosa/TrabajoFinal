package com.daw2final.trabajofinaljsp.servlets.articulos;

import com.daw2final.trabajofinaljsp.model.dao.ArticulosDao;
import com.daw2final.trabajofinaljsp.model.dao.ProveedoresDao;
import com.daw2final.trabajofinaljsp.model.dao.impl.ArticulosDaoImpl;
import com.daw2final.trabajofinaljsp.model.dao.impl.ProveedoresDaoImpl;
import com.daw2final.trabajofinaljsp.services.ArticulosService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.logging.Logger;






    @WebServlet(value = "/articulos/listar")
    public class ListadoArticuloServlet extends HttpServlet {
        private final static Logger LOG = Logger.getLogger(com.daw2final.trabajofinaljsp.servlets.articulos.ListadoArticuloServlet.class.getName());
        private ArticulosService articulosService;
        private ProveedoresDao proveedoresDao;

        public void init() {
            LOG.info("Inicializando ListadoUsuariosServlet");
            articulosService = articulosService.getInstance();  // UsuariosService es un Singleton
            proveedoresDao = new ProveedoresDaoImpl();
        }

        @Override
        protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ArticulosDao articulosDao = new ArticulosDaoImpl();
            request.setCharacterEncoding("UTF-8");
            request.setAttribute("articulos", articulosDao.listAllFillProv());
            request.getRequestDispatcher("/articulos/listar.jsp").forward(request, response);
        }


        public void destroy() {
        }
    }



