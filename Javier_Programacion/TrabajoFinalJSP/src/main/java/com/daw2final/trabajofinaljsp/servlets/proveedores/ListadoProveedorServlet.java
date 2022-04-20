package com.daw2final.trabajofinaljsp.servlets.proveedores;

import com.daw2final.trabajofinaljsp.model.dao.ProveedoresDao;
import com.daw2final.trabajofinaljsp.model.dao.impl.ProveedoresDaoImpl;
import com.daw2final.trabajofinaljsp.services.ProveedoresService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.logging.Logger;



    @WebServlet(value = "/proveedores/listar")
    public class ListadoProveedorServlet extends HttpServlet {
        private final static Logger LOG = Logger.getLogger(ListadoProveedorServlet.class.getName());
        private ProveedoresService proveedoresService;

        public void init() {
            LOG.info("Inicializando ListadoUsuariosServlet");
            proveedoresService = proveedoresService.getInstance();  // UsuariosService es un Singleton
        }

        @Override
        protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ProveedoresDao proveedoresDao = new ProveedoresDaoImpl();
            request.setCharacterEncoding("UTF-8");
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.getRequestDispatcher("/proveedores/listar.jsp").forward(request, response);
        }


        public void destroy() {
        }
    }

