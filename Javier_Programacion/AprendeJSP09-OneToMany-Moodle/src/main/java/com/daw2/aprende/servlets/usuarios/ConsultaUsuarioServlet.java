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
import java.util.Map;
import java.util.logging.Logger;


//urlPatterns={"/usuarios/alta"}
@WebServlet(value = "/usuarios/consulta")
public class ConsultaUsuarioServlet extends HttpServlet {
    private final static Logger LOG = Logger.getLogger(ConsultaUsuarioServlet.class.getName());
    private UsuariosService usuariosService;

    public void init() {
        LOG.info("Inicializando ConsultaUsuarioServlet");
        usuariosService = UsuariosService.getInstance();  // UsuariosService es un Singleton
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        UsuariosDao usuariosDao = new UsuariosDaoImpl();
        request.setCharacterEncoding("UTF-8");
        Usuario usuario;
        if (request.getParameter("nifBusca") != null) {  // Si se ha seleccionado un nif de busqueda
            String nifBusca = request.getParameter("nifBusca") != null ? request.getParameter("nifBusca").trim() : "";
            usuario = usuariosDao.getByNif(nifBusca);
            if (usuario == null) {
                usuario = new Usuario("", "", "", "");
                request.setAttribute("alertWarning", "No se ha encontrado ningún usuario con el Nif " + request.getParameter("nifBusca"));
            } else {
                request.setAttribute("alertInfo", "Usuario encontrado.");
            }
        } else {
            usuario = new Usuario("", "", "", "");
        }
        request.setAttribute("usuario", usuario);
        request.setAttribute("usuarios", usuariosDao.listAll());
        request.setAttribute("readonly", "readonly");
        request.setAttribute("showButtonSubmit", false);
        request.getRequestDispatcher("/usuarios/consulta.jsp").forward(request, response);
    }


    public void destroy() {
    }
}