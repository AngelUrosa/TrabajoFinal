package com.daw2.ejemplo01.servlets.alumnos;

import com.daw2.ejemplo01.model.dao.AlumnosDao;
import com.daw2.ejemplo01.model.dao.impl.AlumnosDaoImpl;
import com.daw2.ejemplo01.services.AlumnosService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.logging.Logger;


    @WebServlet(value="/alumnos/listado")
    public class ListadoAlumnosServlet extends HttpServlet {
        private final static Logger LOG = Logger.getLogger(ListadoAlumnosServlet.class.getName());
        private AlumnosService alumnosService;

        public void init() {
            LOG.info("Inicializando ListadoAlumnosServlet");
            alumnosService = AlumnosService.getInstance();  // UsuariosService es un Singleton
        }

        @Override
        protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            AlumnosDao alumnosDao = new AlumnosDaoImpl();
            request.setCharacterEncoding("UTF-8");
            request.setAttribute("alumnos", alumnosDao.listAll());
            request.getRequestDispatcher("/alumnos/listado.jsp").forward(request, response);
        }


        public void destroy() {
        }
    }

