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
@WebServlet(value = "/usuarios/alta")
public class AltaUsuarioServlet extends HttpServlet {
    private final static Logger LOG = Logger.getLogger(AltaUsuarioServlet.class.getName());
    private UsuariosService usuariosService;

    public void init() {
        LOG.info("Inicializando AltaServlet");
        usuariosService = UsuariosService.getInstance();  // UsuariosService es un Singleton
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        UsuariosDao usuariosDao = new UsuariosDaoImpl();
        request.setCharacterEncoding("UTF-8");
        request.setAttribute("usuario", new Usuario("", "", "", ""));
        request.setAttribute("usuarios", usuariosDao.listAll());
        request.setAttribute("showButtonSubmit", true);
        request.getRequestDispatcher("/usuarios/alta.jsp").forward(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        UsuariosDao usuariosDao = new UsuariosDaoImpl();
        request.setCharacterEncoding("UTF-8");
        Usuario usuario = usuariosService.requestToClass(request);

        Map<String, String> errorsItems = usuariosService.errors(request);

        if (errorsItems.isEmpty()) {
            if (usuariosDao.add(usuario) != null) {
                String mensaje = "El usuario " + usuario.getNombre() + " " + usuario.getApellido1() + " " + usuario.getApellido2() + " ha sido dado de alta.";
                request.setAttribute("alertSuccess", mensaje);
                usuario = new Usuario("", "", "", "");
            } else {
                String mensaje = "El usuario " + usuario.getNombre() + " " + usuario.getApellido1() + " " + usuario.getApellido2() + " no ha sido dado de alta. Ya existe un usuario con el nif " + usuario.getNif();
                request.setAttribute("alertDanger", mensaje);
            }
        } else {
            request.setAttribute("alertDanger", "Los datos no son correctos, no se pudo guardar los datos");
        }
        request.setAttribute("errorsItems", errorsItems);
        request.setAttribute("usuario", usuario);
        request.setAttribute("usuarios", usuariosDao.listAll());
        request.setAttribute("showButtonSubmit", true);
        request.getRequestDispatcher("/usuarios/alta.jsp").forward(request, response);
    }

    public void destroy() {
    }
}