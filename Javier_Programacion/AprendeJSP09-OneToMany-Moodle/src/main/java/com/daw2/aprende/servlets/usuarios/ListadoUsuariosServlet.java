package com.daw2.aprende.servlets.usuarios;

import com.daw2.aprende.model.dao.UsuariosDao;
import com.daw2.aprende.model.dao.impl.UsuariosDaoImpl;
import com.daw2.aprende.model.entity.Usuario;
import com.daw2.aprende.services.UsuariosService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;


import java.io.IOException;
import java.util.logging.Logger;


@WebServlet(value = "/usuarios/listado")
public class ListadoUsuariosServlet extends HttpServlet {
    private final static Logger LOG = Logger.getLogger(ListadoUsuariosServlet.class.getName());
    private UsuariosService usuariosService;

    public void init() {
        LOG.info("Inicializando ListadoUsuariosServlet");
        usuariosService = UsuariosService.getInstance();  // UsuariosService es un Singleton
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        UsuariosDao usuariosDao = new UsuariosDaoImpl();
        request.setCharacterEncoding("UTF-8");
        request.setAttribute("usuarios", usuariosDao.listAll());
        request.getRequestDispatcher("/usuarios/listado.jsp").forward(request, response);
    }


    public void destroy() {
    }
}